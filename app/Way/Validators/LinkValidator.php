<?php namespace Way\Validators;

class LinkValidator extends Validator {

    /**
     * Rules for a link
     *
     * @var array
     */
    protected static $rules = [
        'url' => 'required|url|unique:links,url',
        'hash' => 'required|unique:links,hash'
    ];

}
