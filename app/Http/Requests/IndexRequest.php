<?php

namespace App\Http\Requests;

use App\Rules\Domain;
use App\Rules\ThrowClosure;
use App\Rules\DomainFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;
use Package\Value\BarthDay;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     *
     * いろいろなバリデートの方法を試す
     *
     * http://laradock.test/test2?year=2&day=3&month=34
     * でバリデートが動作するよリダイレクトループに気をつけてね
     */
    public function rules()
    {
        return [
            "year" => [
                'required',
                'digits:4',
                function ($attribute, $value, $fail) {
                    try {
                        new BarthDay($value, $this->get('month'), $this->get('day'));
                    } catch (\DomainException $e) {
                        $fail('クロージャが一番よい');
                    }
                }
            ],
            "month" => [
                'digits:2',
                new class (BarthDay::class, [$this->get('year'), $this->get('month'), $this->get('day')]) extends Domain {
                    public function message()
                    {
                        return 'そんな誕生日無いですよ';
                    }
                },
                new Domain(BarthDay::class, [$this->get('year'), $this->get('month'), $this->get('day')]),
            ],
            "day" => [
                'digits:2',
                function ($attribute, $value, $fail) {
                    if (is_null($this->get('month'))) {
                        $fail($attribute. 'も月いります');
                    }
                },
                new class (['year' => $this->get('year'), 'month' => $this->get('month'), 'day' => $this->get('day')]) extends DomainFactory {
                    protected function create($args)
                    {
                        new BarthDay($args['year'], $args['month'], $args['day']);
                    }
                    public function message()
                    {
                        return 'リフレクションを使わない場合';
                    }
                },
                new ThrowClosure(function ($value) {
                    new BarthDay($this->get('year'), $this->get('month'), $value);
                }, '引数のほうがすっきりするやないかい'),

                // エラーメッセージ設定デフォルト
                new ThrowClosure(function ($value) {
                    new BarthDay($this->get('year'), $this->get('month'), $value);
                }),
// laravelのヘルパー関数とかでもcallableのタイプヒンティング通っちゃう
//           new DomainClosure('public_path')

            ],
        ];
    }

    /**
     * リクエストの項目単位では無く、新たにバリデートできるのでこれは良い！
     * 誕生日のバリデートはリクエストの項目単位（year, month, day）だと、どれも適切ではないからね
     *
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            try {
                new BarthDay($this->get('year'), $this->get('month'), $this->get('day'));
            } catch (\DomainException $e) {
                $validator->errors()->add('barth_day', 'withValidatorからも');
            }
        });
    }

    public function messages()
    {
        return [
            'day.digits' => 'dayの範囲ちゃう',
            'day.2' => 'ちがうやないかい'
        ];
    }
}
