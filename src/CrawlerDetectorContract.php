<?php

namespace Nddcoder\LaravelSimpleViewable;

interface CrawlerDetectorContract
{
    /**
     * Determine if the current user is a crawler.
     *
     * @return bool
     */
    public function isCrawler(): bool;
}
