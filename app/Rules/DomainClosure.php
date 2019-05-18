<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DomainClosure implements Rule
{

    private $factoryClosure;
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(callable $factoryClosure)
    {
        $this->factoryClosure = $factoryClosure;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            ($this->factoryClosure)();
        } catch (\DomainException $e) {
            if (!$this->message) {
                $this->message = $e->getMessage();
            }
            return false;
        }
        return true;
    }


    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
