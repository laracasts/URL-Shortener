<?php

class LinkValidatorTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function test_validates_successfully_against_valid_data()
    {
        $validator = App::make('Way\Validators\LinkValidator');

        $result = $validator->fire($this->getLinkData());

        $this->assertTrue($result);
    }

    /**
     * @expectedException Way\Validators\ValidationException
     */
    public function test_throws_exception_upon_invalid_data()
    {
        $validator = App::make('Way\Validators\LinkValidator');

        $result = $validator->fire([]);
    }

    private function getLinkData()
    {
        return ['url' => 'http://laravel.com', 'hash' => 'asdfg'];
    }
}

