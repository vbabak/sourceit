<?php

namespace Application;

class app
{
    public static function printNS()
    {
        var_dump(__METHOD__);
    }
}

function app()
{
    var_dump(__FUNCTION__);
}
