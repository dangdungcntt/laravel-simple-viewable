<?php

namespace Nddcoder\LaravelSimpleViewable;

use Jaybizzle\CrawlerDetect\CrawlerDetect;

class CrawlerDetectAdapter implements CrawlerDetectorContract
{
    /**
     * CrawlerDetect instance.
     *
     * @var \Jaybizzle\CrawlerDetect\CrawlerDetect
     */
    private $detector;

    /**
     * Create a new CrawlerDetector instance.
     *
     * @param  \Jaybizzle\CrawlerDetect\CrawlerDetect  $detector
     * @return void
     */
    public function __construct(CrawlerDetect $detector)
    {
        $this->detector = $detector;
    }

    /**
     * Determine if the current user is a crawler.
     *
     * @return bool
     */
    public function isCrawler(): bool
    {
        return $this->detector->isCrawler();
    }
}
