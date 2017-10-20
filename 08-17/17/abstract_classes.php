<?php

interface Itemplator
{
    public function getHTML(string $str): string;
}

abstract class MyTemplator
{
    protected $vars = [];

    public function setVar(string $name, $val): void
    {
        $this->vars[$name] = $val;
    }

    abstract public function setVars(array $vars): void;
}

class Templator extends MyTemplator implements Itemplator
{
    public function getHTML(string $str): string
    {

        foreach ($this->vars as $k => $v) {
            $str = str_replace($k, $v, $str);
        }
        return $str;
    }

    public function setVars(array $vars): void
    {
        $this->vars = array_merge($this->vars, $vars);
    }
}

$str = 'Hi, my name is {name} ';
$str .= 'And my friends name is {fname}';

$tpl = new Templator();
$tpl->setVar('{name}', 'Alexander');
$tpl->setVars(['{fname}' => 'Vladimir']);

echo $tpl->getHTML($str);
