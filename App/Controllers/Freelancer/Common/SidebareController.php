<?php
namespace App\Controllers\Freelancer\Common;

use System\Controller;

class SidebareController extends Controller
{
    public function index() 
    {
       return $this->view->render('freelancer/common/sidebar');

    }
}