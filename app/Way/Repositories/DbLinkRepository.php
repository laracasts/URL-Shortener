<?php namespace Way\Repositories;

use Way\Link;

class DbLinkRepository implements LinkRepositoryInterface {

    /**
     * Create new link in db
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return Link::create($data);
    }

    /**
     * Fetch link by hash
     *
     * @param $hash
     *
     * @return mixed
     */
    public function byHash($hash)
    {
        return Link::whereHash($hash)->first();
    }

    /**
     * Fetch link by url
     *
     * @param $url
     *
     * @return mixed
     */
    public function byUrl($url)
    {
        return Link::whereUrl($url)->first();
    }

}
