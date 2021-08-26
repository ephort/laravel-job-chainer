![Packagist Downloads](https://img.shields.io/packagist/dt/JustIversen/laravel-job-chainer)
![Code size](https://img.shields.io/github/languages/code-size/JustIversen/laravel-job-chainer)
![Build Status](https://img.shields.io/github/workflow/status/JustIversen/laravel-job-chainer/PHP%20Composer)

# Laravel Job Chainer

JobChainer does chain a variable amount of jobs by adding them
with the add() method.

This makes it possible to chain jobs without having to know
which job will be the first to be fired.

*Normal job chaining*

```php
ProcessPodcast::withChain([
    new OptimizePodcast,
    new ReleasePodcast($argA, $argB)
])->dispatch($arg1);
```

*With Job Chainer*

```php
$chain = new JobChainer;

$chain->add(ProcessPodcast::class, $arg1);
$chain->add(OptimizePodcast::class);
$chain->add(ReleasePodcast::class, $argA, $argB);

$chain->dispatch();
```

# Why?

This allows us to add jobs to the chain without prior knowledge about which job would be the first.
This may come in handy when jobs must be chained, but they are added dynamically to the chain.

# Issue

Please open a new issue, if you are experiencing any troubles.
