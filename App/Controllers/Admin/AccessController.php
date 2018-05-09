<?php
namespace App\Controllers\Admin;

use System\Controller;

class AccessController extends Controller
{
    /**
     * check user permissions to access admin pages
     */
    public function index()
    {
        $loginModel = $this->load->model('Login');

        // user is not logged in and is not request login page
        // then we will redirect him to login
        $nonePage = ['/admin/login', '/admin/login/submit'];
        if(!$loginModel->isLogged() AND !in_array($this->request->url(),$nonePage)){

            return $this->url->redirectTo('/admin/login');
        }
        // on going to this line
        // it means that there are to possibillits
        // first one the user is not logged in and  requst page
        // seconde one the user is logged in successfuly and  he
        // request  an admin page



    }
}