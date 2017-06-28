<?php

namespace Library\Log;

interface LogAwareInterface
{
    public function setLogger(LogInterface $logger);

    public function getLogger(): LogInterface;
}
