<?php

class IndexController extends ControllerBase
{
    /**
     * Index page
     * 
     * @return void
     */
    public function indexAction()
    {
	  	$emp = Employee::find(['order' => 'id DESC']);
    	$this->view->emp = $emp;
    }

}

