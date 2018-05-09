<?php
namespace App\Controllers\Freelancer;
use System\Controller;

class JobsController extends Controller
{
    /**
     * Display Home Page
     */
    public function index()
    {
        $this->html->setTitle('Jobs');
        $data['user'] = $this->load->model('Login')->user();
        $data['jobs']=$this->load->model('Jobs')->latest();

        $view = $this->view->render('freelancer/jobs',$data);
        return $this->freelancerLayout->render($view);
        // i will use get
    }

    public function addOffers($title, $id)
    {
        $offers = $this->request->post('offers');
        $jobsModel = $this->load->model('Jobs');
        $loginModel = $this->load->model('Login');
        $jobs = $jobsModel->get($id);
        if( !$jobs or ! $offers or !$loginModel->isLogged()){
            return $this->url->redirectTo('/404');   
        }
        $user = $loginModel->user();
        $jobsModel->addNewOffers($id, $offers, $user->id);
        return $this->url->redirectTo('jobs/'.$title.'/'.$id);
    }
    
}