<?php

use Phalcon\Http\Response as Response;

class EmployeeController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    /**
     * Save acction
     *
     * @return Response
     */
    public function saveAction()
    {
        $this->view->disable();

        $res = new Response;

        $id = $this->request->getPost("id");

        if ($id == '') {

            $create = new Employee();

            $create->assign(array(
                'fullname' => $this->request->getPost('InputName'),
                'nickname' => $this->request->getPost('InputNick'),
                'email' => $this->request->getPost('InputEmail'),
                'address' => $this->request->getPost('InputAddress'),
            ));

            $action = $create->save();

        } else {

            $emp = Employee::findFirst($id);

            $emp->id = $id;
            $emp->fullname = $this->request->getPost("InputName");
            $emp->nickname = $this->request->getPost("InputNick");
            $emp->email = $this->request->getPost("InputEmail");
            $emp->address = $this->request->getPost("InputAddress");

            $action = $emp->save();
        }

        if (!$action) {
            $return = array('return' => false, 'msg' => 'Error ! Menyimpan data');
        } else {
            $return = array('return' => true);

        }

        $res->setContent(json_encode($return));

        return $res;
    }

    /**
     * Edit acction
     *
     * @return Response
     */
    public function editAction()
    {
        $this->view->disable();

        $res = new Response;

        $id = $this->request->getPost('id');
        $emp = Employee::findFirst($id);

        $res->setContent(json_encode(array(
            'id' => $emp->id,
            'fullname' => $emp->fullname,
            'nickname' => $emp->nickname,
            'email' => $emp->email,
            'address' => $emp->address,
        )));

        return $res;
    }

    /**
     * Delete action
     *
     * @return Response
     */
    public function deleteAction()
    {
        $this->view->disable();

        $res = new Response;

        $id = $this->request->getPost('id');
        $emp = Employee::findFirst($id);

        if (!$emp->delete()) {
            $return = array('return' => false, 'msg' => 'Error ! Menghapus data');
        } else {
            $return = array('return' => true);
        }

        $res->setContent(json_encode($return));

        return $res;
    }

}
