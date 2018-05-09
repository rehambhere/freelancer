<?php
namespace App\Controllers\Freelancer;
use System\Controller;

class HomeController extends Controller
{
    /**
     * Display Home Page
     *
    public function index()
    {
        // i will use get
        return $this->view->render('freelancer/home', $data)->getOutput();
    }*/

    /**
     * Display login form
     */
    public function index()
    {
        $data['jobs'] = $this->load->model('Jobs')->all();

        $loginModel = $this->load->model('Login');
        if ($loginModel->isLogged()) {
            return $this->url->redirectTo('/jobs');

        }
        $data['errors'] = $this->errors;
        return $this->view->render('/freelancer/home', $data);
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
            $json['redirect'] = $this->url->link('/jobs');
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
    private function isValid()
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