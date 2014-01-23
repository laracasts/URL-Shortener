<?php namespace Way\Validators;

class ValidationException extends \Exception {

    /**
     * @var string
     */
    protected $errors;

    /**
     * @param string $errors
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Fetch validation errors
     *
     * @return string
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
