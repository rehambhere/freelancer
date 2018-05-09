<?php
namespace App\Controllers\Freelancer;

use System\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $this->html->setTitle('Search_Freelancer');
        $data['users']=$this->load->model('Users')->info();
        $view = $this->view->render('freelancer/users',$data);
        return $this->freelancerLayout->render($view);
    }
}