<?php

namespace Application\Model;

class DbModelAbstract
{
    public function setData(array $data)
    {
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        }

        return $this;
    }
}