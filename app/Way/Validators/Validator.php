<?php namespace Way\Validators;

use Illuminate\Validation\Factory;

abstract class Validator {

    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Trigger validation
     *
     * @param array $data
     *
     * @return bool
     * @throws ValidationException
     */
    public function fire(array $data)
    {
        $validation = $this->validator->make($data, static::$rules);

        if ( $validation->fails()) throw new ValidationException($validation->messages());

        return true;
    }
}
