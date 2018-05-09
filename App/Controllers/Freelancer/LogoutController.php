<?php
namespace App\Controllers\Freelancer;

use System\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        $this->session->destroy();
        $this->cookie->destroy();

        return $this->url->redirectTo('/');
    }
}