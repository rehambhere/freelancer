<?php
namespace App\Controllers\Admin;

use System\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->html->setTitle('Dashboard');
        $data['users'] = $this->load->model('Dashboard')->allUser();
        $data['categories']=$this->load->model('Dashboard')->getEnabledCategorieswithNumberofTotalPost();
        $view = $this->view->render('admin/main/dashboard', $data);
        return $this->adminLayout->render($view);
       
    }
   /** public function submit()
    {
      $json['email'] =$this->request->post('email');
        return $this->json($json);
        $this->validator->required('email')->email('email');
        $this->validator->required('email')->email('email')->unique('email',['users','email']);

        $this->validator->required('password')->minLen('password',8);
        $this->validator->match('password','confirm_password');
        $file= $this->request->file('image');
        if($file->isImage()) {
           echo $file->moveTo($this->file->to('public/images'));
        }
        
        //pre($this->validator->getMessages());
    }**/

}