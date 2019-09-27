<?php

namespace App\Feed;

use FeedIo\Feed\NodeInterface;

interface FeedInterface extends \Iterator, NodeInterface
{
    /**
     * This method MUST return the feed's full URL
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     * @return FeedInterface
     */
    public function setUrl($url);
}
