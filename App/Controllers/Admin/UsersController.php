<?php

namespace App\Controllers\Admin;

use System\Controller;

class UsersController extends Controller
{
    /**
     * Display Categories list
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Users');
        $data['users'] =$this->load->model('Users')->all();
        $data['success']=$this->session->has('success')? $this->session->get('success'):null;;

        $view = $this->view->render('admin/users/list',$data);
        return $this->adminLayout->render($view);
    }

    /**
     * open categories form
     */
    public function add()
    {
        return $this->form();

    }

    /**
     * submit for creat new object
     */
    public function submit()
    {
        $json = [];
        if($this->isValid()){
            //its mean no have errors
            $this->load->model('Users')->create();
            $json['success']='Users add success';
            $json['redirectTo']=$this->url->link('admin/users');
        } else {
            //its mean have errors
            $json['errors']= $this->validator->flattenMessages();
        }
        return $this->json($json);

    }
    /**
     * Display Edit Form
     */
    public function edit($id)
    {

        $usersModel = $this->load->model('Users');

        if(! $usersModel->exists($id)) {

            return $this->url->redirectTo('/404');
        }

        $users =$usersModel->get($id);
        return $this->form($users);
    }
    /**
     * submit update-form
     * @param $id
     * @return mixed
     */
    public function save($id)
    {
        $json = [];
        if($this->isValid($id)){
            //its mean no have errors
            $this->load->model('Users')->update($id);
            $json['success']='Users Update success';
            $json['redirectTo']=$this->url->link('admin/users');
        } else {
            //its mean have errors
            $json['errors']= $this->validator->flattenMessages();
        }
        return $this->json($json);

    }
    /**
     * display form
     */
    private function form($users=null)
    {
        //add category form
        if($users){
            //editing form
            $data['target']= 'edit-users-'.$users->id;
            $data['action'] = $this->url->link('/admin/users/save/'.$users->id);
            $data['heading'] = 'Edit'.$users->first_name;


        } else {
            $data['target']= 'add-users-form';
            $data['action']=$this->url->link('/admin/users/submit');
            $data['heading']='Add New Users';
        }
        $users = (array)$users;
        $data['id'] = array_get($users,'id');
        $data['first_name'] =array_get($users,'first_name');
        $data['last_name'] =array_get($users,'last_name');
        $data['email'] = array_get($users, 'email');
        $data['status'] =array_get($users,'status');
        $data['gender'] = array_get($users,'gender');
        $data['role'] =array_get($users,'role');
        $data['birthday']= '';
        $data['image'] ='';
        if(! empty($users['birthday'])) {
            $data['birthday'] = date('d-m-y',$users['birthday']);
        }
        if(! empty($users['image'])){
            $data['image']= $this->url->link('public/images/'.$users['image']);
        }
        return $this->view->render('/admin/users/form',$data);

    }


    /**
     * Validate the form
     */
    private function isValid($id = null)
    {
     
        $this->validator->required('first_name','First name its requered');
        $this->validator->required('last_name','Last name its requerid');
        $this->validator->required('email','email its requered');
        $this->validator->email('email');
        $this->validator->unique('email',['users','email','id',$id]);
        if(is_null($id)) {
            $this->validator->required('password')->minLen('password',8);
            $this->validator->match('password','confirm_password');
            $this->validator->requiredFile('image');
            $this->validator->image('image');

        } else {
            $this->validator->image('image');

        }

        return $this->validator-> passes();
    }

    public function delete($id)
    {
        $json=[];
        $usersModel = $this->load->model('Users');

        if(! $usersModel->exists($id)) {

            return $this->url->redirectTo('/404');
        }
        $usersModel->delete($id);
        $json['success']='Users has been deleted success';
        return $this->json($json);
    }

}
