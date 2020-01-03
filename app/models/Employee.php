<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Employee extends \Phalcon\Mvc\Model
{
    public $id;
    public $fullname;
    public $nickname;
    public $email;
    public $address;
}
