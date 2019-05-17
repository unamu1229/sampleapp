<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Domain implements Rule
{

    private $className;
    private $values;
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($className, $values)
    {
        $this->className = $className;
        $this->values = $values;
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
            $class = new \ReflectionClass($this->className);
            $class->newInstanceArgs($this->values);
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
