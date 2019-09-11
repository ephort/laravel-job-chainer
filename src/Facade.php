<?php

namespace JustIversen\JobChainer;

/**
 * @method static void add($job, ...$args)
 * @method static void fire()
 *
 * @see \JustIversen\JobChainer\JobChainer
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return JobChainer::class;
    }
}