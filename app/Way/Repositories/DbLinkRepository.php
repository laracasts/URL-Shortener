<?php namespace Way\Repositories;

use Way\Link;

class DbLinkRepository implements LinkRepositoryInterface {

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return Link::create($data);
    }

    /**
     * @param $hash
     *
     * @return mixed
     */
    public function byHash($hash)
    {
        return Link::whereHash($hash)->first();
    }

    /**
     * @param $url
     *
     * @return mixed
     */
    public function byUrl($url)
    {
        return Link::whereUrl($url)->first();
    }

}
