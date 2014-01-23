<?php

class UrlHasherTest extends PHPUnit_Framework_TestCase {

    public function test_hashes_url()
    {
        $hasher = new Way\Utilities\UrlHasher(10);

        $this->assertEquals(10, strlen($hasher->make('example.com')));
    }

}
