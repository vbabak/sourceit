<?php

namespace Library\Log;

trait LogAwareTrait
{
    /** @var  LogInterface */
    protected $logger;

    public function setLogger(LogInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    public function getLogger(): LogInterface
    {
        return $this->logger;
    }
}
