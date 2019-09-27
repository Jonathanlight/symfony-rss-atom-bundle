<?php

namespace App\Feed;

use Debril\RssAtomBundle\Provider\FeedProviderInterface;

class FeedItem
{
    /**
     * @var FeedProviderInterface
     */
    protected $feedProviderInterface;

    public function __construct(FeedProviderInterface $feedProviderInterface)
    {
        $this->feedProviderInterface = $feedProviderInterface;
    }

    public function read()
    {
        $this->feedProviderInterface->getFeed();
    }
}