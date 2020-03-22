<?php


namespace Package\Domain\User;

use DomainException;
use Package\Domain\ValidationNotificationHandler;

class User
{
    // プロバティにアクセスできるのはアクセサだけ(自己カプセル化)
    private $id;
    private $name;
    private $age;
    /**
     * 性別
     * @var Gender|null
     */
    private $gender;
    private $email;
    private $address;


    // すべてのプロパティの値をコンストラクタで設定します。
    private function __construct($id, $name, $age, ?Gender $gender, $email, $address)
    {
        // セッターをとうしてプロパティに代入します。(自己カプセル化)
        $this->setId($id);
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setEmail($email);
        $this->setAddress($address);
    }

    // セッターでバリデートします。
    private function setId($id)
    {
        if ($this->id) {
            throw new DomainException('idの変更はできません。');
        }
        $this->id = $id;
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    private function setAge($age): void
    {
        /*
        [アンチパターン]
        セッター内で他のプロパティとの関連のバリデーションは行わない。
        if ($age < 30 && $this->gender < Gender::MAN) {
           throw new DomainException('30歳未満の男性は登録できません');
        }
        if ($age < 25 && $this->gender < Gender::WOMAN) {
           throw new DomainException('25歳未満の女性は登録できません');
        }

        あくまでそのプロパティに対してのバリデーションを行う。
        そうしないと、setAgeした後にsetGenderを行わないようにトランザクションに気をつけなければならなくなる。
        複数項目に渡るバリデーションはUserValidatorクラスにて行う。
        */

        $this->age = $age;
    }

    /**
     * @param mixed $gender
     */
    private function setGender(Gender $gender): void
    {
        if (!in_array($gender->value(), Gender::values())) {
            throw new DomainException('性別の値が不正です。');
        }

        /* [アンチパターン]
        セッターで単一の対象プロパティーに正当な値をいれる以外のことをしてはいけない。

        たとえば、性別を変更した時に、イベントを発行したり年齢の設定を削除する仕様を実装したり。
        そういうのはchangeGenderにて振る舞いとして実装する
        if ($gender !== $this->getGender()) {
            event(new ChangeGender($gender));
            $this->setAge(null);
        }
        */

        $this->gender = $gender;
    }

    /**
     * 性別変更の振る舞い
     */
    public function changeGender($gender)
    {
        event(new ChangeGender($this->getGender(), $gender));
        $this->setAge(null);
        $this->setGender($gender);
    }

    /**
     * @return Gender|null
     */
    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }


    private function setEmail($email)
    {
        $this->email = $email;
    }

    private function setAddress($address)
    {
        $this->address = $address;
    }


    // プロフィール編集の時に名前と年齢と性別を変更できるという振る舞いです。
    public function editProfile($name, $age, Gender $gender)
    {
        if ($gender->value() !== $this->getGender()->value()) {
            $this->changeGender($gender);
        }

        $this->setName($name);
        $this->setAge($age);
    }

    // 自身を作成するファクトリーメソッドを持ちます。
    // 会員登録時のユーザーを作成するという振る舞いです。
    public static function memberEntry($id, $name, $email, Gender $gender)
    {
        return new self($id, $name, null, $gender, $email, null);
    }

    public function validate(ValidationNotificationHandler $notificationHandler)
    {
        (new UserValidator($this, $notificationHandler))->validate();
    }
}
