<?php

namespace Nddcoder\LaravelSimpleViewable;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nddcoder\LaravelSimpleViewable\Skeleton\SkeletonClass
 */
class LaravelSimpleViewableFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simple-viewable';
    }
}
