<?php
namespace App\Controllers\Freelancer;

use System\Controller;

class RegisterController extends Controller
{
    /**
     * Display login form
     */
    public function index()
    {

        $loginModel = $this->load->model('Login');
        if($loginModel->isLogged()) {
            // return $this->url->redirectTo('/');

        }
        $data['errors'] = $this->errors;
        return $this->view->render('/freelancer/users/login',$data);
    }

    /**
     * submit login form
     */
    public function submit()
    {
        if($this->isValid()) {
            $loginModel = $this->load->model('Login');
            $loggedInUser = $loginModel->user();

            if($this->request->post('remember')){
                //save login data in cookie
                $this->cookie->set('login',$loggedInUser->code);
            } else {
                //save login data in session
                $this->session->set('login',$loggedInUser->code);

            }
            $json = [];
            $json['success'] = 'Welcome Back '.$loggedInUser->first_name;
            $json['redirect'] = $this->url->link('/');
            return $this->json($json);
        } else {
            $json = [];
            $json['errors'] = implode('<br>', $this->errors);
            return $this->json($json);
        }
    }

    /**
     * validate login
     * is valid
     */
    public function isValid()
    {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        if(! $email) {
            $this->errors[] = 'Pleas insert email';
        } elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Please insert valid email';
        }
        if(! $password) {
            $this->errors[] = 'Pleas Insert Password';
        }
        if(! $this->errors){
            $loginModel = $this->load->model('Login');
            if(! $loginModel->isValidLogin($email, $password)) {
                $this->errors[] = 'Invalid Login';
            }
        }
        return empty($this->errors);
    }
}
