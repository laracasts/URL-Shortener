<?php

use Way\Link;

class LittleServiceTest extends TestCase {
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function test_shortens_url()
    {
        $hash = Little::make('http://laracasts.com');

        $this->assertEquals(5, strlen($hash));

        $link = Link::whereHash($hash)->first();
        $this->assertEquals('http://laracasts.com', $link->url);
    }

    public function test_gets_url_by_hash()
    {
        Link::create(['url' => 'http://laracasts.com', 'hash' => 'asdfg']);

        $url = Little::getUrlByHash('asdfg');

        $this->assertEquals('http://laracasts.com', $url);
    }
}

