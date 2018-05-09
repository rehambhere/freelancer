<?php
namespace App\Controllers\Freelancer\Common;

use System\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        $data['title'] = $this->html->getTitle();
       $data['user'] = $this->load->model('Login')->user();
       return $this->view->render('freelancer/common/header',$data);
    }
}