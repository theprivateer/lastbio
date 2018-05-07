<?php

namespace App\Observers;

use App\Models\Link;
use Goutte\Client;

class LinkObserver
{
    public function creating(Link $link)
    {
        do
        {
            $key = str_random();
        } while(Link::where('key', $key)->first());

        $link->key = $key;

        $link = $this->getMetaData($link);

        return $link;
    }

    private function getMetaData(Link $link)
    {
        $client = new Client();

        $crawler = $client->request('GET', $link->url);

        // title
        try {
            $link->title = $crawler->filter('title')->text();
        } catch (\Exception $e) {
            $link->title = null;
        }

        // description
        try
        {
            $link->description = $crawler->filterXpath('//meta[@name="description"]')->attr('content');
        } catch( \Exception $e)
        {
            try
            {
                $link->description = $crawler->filterXpath('//meta[@name="description"]')->attr('og:content');
            } catch(\Exception $e)
            {
                $link->description = null;
            }
        }

        return $link;
    }
}