<?php
# src/Feed/Provider.php
namespace App\Feed;

use FeedIo\Feed;
use FeedIo\FeedInterface;
use FeedIo\Feed\Item;
use Debril\RssAtomBundle\Provider\FeedContentProviderInterface;

class Provider implements FeedProviderInterface
{
    /**
     * @param array $options
     * @return \FeedIo\FeedInterface
     * @throws \Debril\RssAtomBundle\Exception\FeedNotFoundException
     */
    public function getFeed(Request $request) : FeedInterface
    {
        // build the feed the way you want
        $feed = new Feed();
        $feed->setTitle('your title');
        foreach($this->getItems() as $item ) {
            $feed->add($item);
        }

        return $feed;
    }

    protected function getItems()
    {
        foreach($this->fetchFromStorage() as $storedItem) {
            $item = new Item;
            $item->setTitle($storedItem->getTitle());
            // ...
            yield $item;
        }
    }
    protected function fetchFromStorage()
    {
        // query the database to fetch items
    }
}