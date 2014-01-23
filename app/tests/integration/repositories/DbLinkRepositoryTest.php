<?php

class DbLinkRepositoryTest extends TestCase {

    protected $repo;

    public function setUp()
    {
        parent::setup();

        Artisan::call('migrate');

        $this->repo = new Way\Repositories\DbLinkRepository;
    }

    public function test_creates_link()
    {
        $this->repo->create($data = $this->getRowData());

        $link = DB::table('links')->first();

        $this->assertEquals('http://laravel.com', $data['url']);
        $this->assertEquals('asdfg', $data['hash']);
    }

    public function test_fetches_link_by_hash()
    {
        $this->repo->create($data = $this->getRowData());

        $link = $this->repo->byHash($data['hash']);

        $this->assertEquals('http://laravel.com', $link->url);
    }

    public function test_fetches_link_by_url()
    {
        $this->repo->create($data = $this->getRowData());

        $link = $this->repo->byUrl($data['url']);

        $this->assertEquals('asdfg', $link->hash);

    }

    private function getRowData()
    {
        return [
            'url' => 'http://laravel.com',
            'hash' => 'asdfg'
        ];
    }
}

