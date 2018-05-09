<?php
namespace App\Controllers\Freelancer\Common;

use System\Controller;

class FooterController extends Controller
{
    public function index() 
    {
       return $this->view->render('freelancer/common/footer');

    }
}