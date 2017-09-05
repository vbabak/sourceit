<?php

namespace Library\Log;

interface FileLogInterface extends LogInterface
{
    public function setLogDir($dir);
}