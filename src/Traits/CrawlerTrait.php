<?php

namespace DivineOmega\PhantomJSLaravelTesting\Traits;

trait CrawlerTrait
{
    public function visit($uri) 
    {
        if (strpos($uri, '/')===0) {
            $uri = URL::to($uri);
        }
        $this->driver()->get($uri);
    }

    public function see($string)
    {
        $source = $this->driver()->getPageSource();

        $stringPresentInSource = false;

        if (strpos($source, $string)!==false) {
            $stringPresentInSource = true;
        }

        $this->assertTrue($stringPresentInSource, 'Could not find \''.$string.'\' in page source code.');
    }
}