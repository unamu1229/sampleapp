<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

abstract class DomainFactory implements Rule
{

    private $args;
    private $message;


    abstract protected function create($args);

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($args)
    {
        $this->args = $args;
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
            static::create($this->args);
        } catch (\DomainException $e) {
            $this->message = $e->getMessage();
            return false;
        }
        return true;
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
