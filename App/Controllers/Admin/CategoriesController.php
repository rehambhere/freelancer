<?php

namespace App\Controllers\Admin;

use System\Controller;

class CategoriesController extends Controller
{
    /**
     * Display Categories list
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Categories');
        $data['categories'] =$this->load->model('Categories')->all();
        $data['success']=$this->session->has('success')? $this->session->get('success'):null;;

        $view = $this->view->render('admin/categories/list',$data);
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
            $this->load->model('Categories')->create();
            $json['success']='Categories add success';
            $json['redirectTo']=$this->url->link('admin/categories');
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

        $categoriesModel = $this->load->model('Categories');

        if(! $categoriesModel->exists($id)) {

            return $this->url->redirectTo('/404');
        }

        $category =$categoriesModel->get($id);
        return $this->form($category);
    }
    /**
     * submit update-form
     * @param $id
     * @return mixed
     */
    public function save($id)
    {
        $json = [];
        if($this->isValid()){
            //its mean no have errors
            $this->load->model('Categories')->update($id);
            $json['success']='Categories Update success';
            $json['redirectTo']=$this->url->link('admin/categories');
        } else {
            //its mean have errors
            $json['errors']= $this->validator->flattenMessages();
        }
        return $this->json($json);

    }
    /**
     * display form
     */
    private function form($category=null)
    {
        //add category form
        if($category){
            //editing form
            $data['target']= 'edit-category-'.$category->id;
            $data['action'] = $this->url->link('/admin/categories/save/'.$category->id);
            $data['heading'] = 'Edit'.$category->name;


        } else {
            $data['target']= 'add-category-form';
            $data['action']=$this->url->link('/admin/categories/submit');
            $data['heading']='Add New Category';
        }
        $data['name'] =$category? $category->name:null;
        $data['status'] =$category? $category->status:null;
        return $this->view->render('/admin/categories/form',$data);

    }


    /**
     * Validate the form
     */
    private function isValid()
    {
        $this->validator->required('name','Categories name its requered');
        return $this->validator-> passes();
    }

    public function delete($id)
    {
        $json=[];
        $categoriesModel = $this->load->model('Categories');

        if(! $categoriesModel->exists($id)) {

            return $this->url->redirectTo('/404');
        }
        $categoriesModel->delete($id);
        $json['success']='Categories has been deleted success';
        return $this->json($json);
    }
   
}