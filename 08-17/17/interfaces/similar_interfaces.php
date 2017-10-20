<?php

interface az
{
    public function a($a, $z);
    // public function a($a);
    // public function a($a): string;
}

interface b
{
    public function a($a, $z);
}

interface azb extends az, b {

}

class zz implements azb
{
    public function a($a, $z) // a($a), a($a,$z)
    {

    }

    // public function a($z): string
    // {
    //     return '';
    // }

}
