<?php

namespace Application\Controller;

use Library\View\HTMLView;
use Application\Model\User;

class IndexController extends ControllerAbstract
{
    public function indexAction($id = 0)
    {
        // $user = User::findById($id);
        // var_dump($user);
        return new HTMLView($this->getViewsPath('index/index.phtml'));
    }
}
