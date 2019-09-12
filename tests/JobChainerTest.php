<?php

namespace JustIversen\JobChainer\Tests;

use Illuminate\Support\Facades\Queue;
use JustIversen\JobChainer\JobChainer;
use JustIversen\JobChainer\Tests\Jobs\A;
use JustIversen\JobChainer\Tests\Jobs\B;
use JustIversen\JobChainer\Tests\Jobs\C;

class JobChainerTest extends TestCase
{
    public function testJobGetsChained()
    {
        Queue::fake();

        $chain = new JobChainer;

        $chain->add(A::class);
        $chain->add(B::class);
        $chain->add(C::class);
        $chain->dispatch();

        Queue::assertPushedWithChain(A::class, [
            B::class,
            C::class
        ]);
    }
}