<?php

class InfoController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->disable();
        return phpinfo();
    }

}
