<?php

namespace Pnoexz;

use Psr\Log\LoggerInterface;

class LoggableBenchmark
{
    /**
     * @var float
     */
    private $startTime;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $task;

    /**
     * @param LoggerInterface $logger
     * @param string|null     $task
     */
    public function __construct(LoggerInterface $logger, string $task = null)
    {
        $this->startTime = microtime(true);
        $this->logger = $logger;
        $this->task = $task ?? 'Task';
    }

    /**
     * Stops the timer and logs how long it took to perform the task.
     */
    public function end(): void
    {
        $this->logger->info(sprintf(
            "%s took %s ms.",
            $this->task,
            (microtime(true) - $this->startTime) * 1000
        ));
    }
}
