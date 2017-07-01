<?php

namespace Application\Controller;

use Library\View\HTMLView;

class IndexController extends ControllerAbstract
{
    public function indexAction()
    {
        return new HTMLView($this->getViewsPath('index/index.phtml'));
    }
}
