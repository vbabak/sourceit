<?php

namespace Application\Controller;

use Library\View\HTMLView;
use Application\Model\User;

class IndexController extends ControllerAbstract
{
    public function indexAction()
    {
        // $user = User::findById(2);
        // print_r($user);
        return new HTMLView($this->getViewsPath('index/index.phtml'));
    }
}
