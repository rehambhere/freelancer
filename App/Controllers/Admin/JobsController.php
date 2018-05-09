<?php

namespace App\Controllers\Admin;

use System\Controller;

class JobsController extends Controller
{
    /**
     * Display Categories list
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Jobs');
        $data['jobs'] =$this->load->model('Jobs')->all();
        $data['success']=$this->session->has('success')? $this->session->get('success'):null;;
        $view = $this->view->render('admin/jobs/list',$data);
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
            $this->load->model('Jobs')->create();
            $json['success']='jobs add success';
            $json['redirectTo']=$this->url->link('admin/jobs');
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

        $usersModel = $this->load->model('Jobs');

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
            $this->load->model('Jobs')->update($id);
            $json['success']='Jobs Update success';
            $json['redirectTo']=$this->url->link('/admin/jobs');
        } else {
            //its mean have errors
            $json['errors']= $this->validator->flattenMessages();
        }
        return $this->json($json);

    }
    /**
     * display form
     */
    private function form($jobs=null)
    {
        //add category form
        if($jobs){
            //editing form
            $data['target']= 'edit-jobs-'.$jobs->id;
            $data['action'] = $this->url->link('/admin/jobs/save/'.$jobs->id);
            $data['heading'] = 'Edit'.$jobs->title;


        } else {
            $data['target']= 'add-jobs-form';
            $data['action']=$this->url->link('/admin/jobs/submit');
            $data['heading']='Add New jobs';
        }
        $jobs= (array)$jobs;

        $data['title'] =array_get($jobs,'title');
        $data['category_id'] =array_get($jobs,'category_id');
        $data['tags'] = array_get($jobs, 'tags');
        $data['details'] = array_get($jobs, 'details');
        $data['status'] =array_get($jobs,'status');
        $data['budget'] = array_get($jobs,'budget');

        $data['image'] ='';

        if(! empty($jobs['image'])){
            $data['image']= $this->url->link('public/images/'.$jobs['image']);
        }
        $data['categories'] = $this->load->model('Categories')->all();
        
        return $this->view->render('/admin/jobs/form',$data);

    }


    /**
     * Validate the form
     */
    private function isValid($id = null)
    {

        $this->validator->required('title','Title  its requered');
        $this->validator->required('details','details its requered');
        $this->validator->required('tags','Tags its requerid');
        if(is_null($id)) {
        
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
        $usersModel = $this->load->model('Jobs');

        if(! $usersModel->exists($id)) {

            return $this->url->redirectTo('/404');
        }
        $usersModel->delete($id);
        $json['success']='Jobs has been deleted success';
        return $this->json($json);
    }

}
