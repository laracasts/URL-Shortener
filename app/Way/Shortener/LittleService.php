<?php namespace Way\Shortener;

use Way\Repositories\LinkRepositoryInterface as LinkRepo;
use Way\Utilities\UrlHasher;
use Way\Exceptions\NonExistentHashException;

class LittleService {

    /**
     * @var \Way\Repositories\LinkRepositoryInterface
     */
    protected $linkRepo;

    /**
     * @var \Way\Utilities\UrlHasher
     */
    protected $urlHasher;

    /**
     * @param LinkRepo  $linkRepo
     * @param UrlHasher $urlHasher
     */
    public function __construct(LinkRepo $linkRepo, UrlHasher $urlHasher)
    {
        $this->linkRepo = $linkRepo;
        $this->urlHasher = $urlHasher;
    }

    /**
     * Save url to db and hash
     *
     * @param $url
     *
     * @return string
     */
    public function make($url)
    {
        $link = $this->linkRepo->byUrl($url);

        return $link ? $link->hash : $this->makeHash($url);
    }

    /**
     * Fetch a url by hash
     *
     * @param $hash
     *
     * @return mixed
     * @throws \Way\Exceptions\NonExistentHashException
     */
    public function getUrlByHash($hash)
    {
        $link = $this->linkRepo->byHash($hash);

        if ( ! $link) throw new NonExistentHashException;

        return $link->url;
    }

    /**
     * Prepare and save new url + hash
     *
     * @param $url
     * @returns string
     */
    private function makeHash($url)
    {
        $hash = $this->urlHasher->make($url);
        $data = compact('url', 'hash');

        \Event::fire('link.creating', [$data]);

        $this->linkRepo->create($data);

        return $hash;
    }
}
