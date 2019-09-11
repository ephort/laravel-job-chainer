<?php

namespace JustIversen\JobChainer;

class JobChainer
{
    protected $jobs = [];

    /**
     * Add job as [MyJob::class, [$arg1, $arg2]]
     *
     * @param  array  $job
     * @return object
     */
    public function add($job, ...$args)
    {
        $this->jobs[] = [$job, $args];

        return $this;
    }

    /**
     * Fire job chain
     *
     * @return void
     */
    protected function fire()
    {
        $inside = array_map(function ($item) {
            return new $item[0](...$item[1]);
        }, array_slice($this->jobs, 1));

        $first = $this->jobs[0];

        $first[0]::withChain($inside)->dispatch(...$first[1]);
    }
}
