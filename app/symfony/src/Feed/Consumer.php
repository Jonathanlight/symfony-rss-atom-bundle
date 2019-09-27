<?php

namespace App\Feed;

use FeedIo\FeedIo;

class Consumer
{
    /**
     * @type \FeedIo\FeedIo
     */
    private $feedIo;

    public function __construct(FeedIo $feedIo)
    {
        $this->feedIo = $feedIo;
    }

    /**
     * @param string $url
     * @return \FeedIo\Reader\Result
     * @throws \Exception
     */
    public function read(string $url)
    {
        return $this->feedIo->readSince($url, new \DateTime());
    }
}