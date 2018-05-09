<?php
namespace App\Controllers\Freelancer;
use System\Controller;

class JobsReviewsController extends Controller
{
    /**
     * Display Home Page
     */
    public function index($title,$id)
    {
        $data['user'] = $this->load->model('Login')->user();
        $jobs= $this->load->model('Jobs')->getJobswithOffers($id);
        $data['jobs'] = $jobs;
        if(! $jobs) {
            return $this->url->redirectTo('/404');
        }
        $this->html->setTitle($jobs->title);

        $view = $this->view->render('freelancer/jobs_offers',$data);
        return $this->freelancerLayout->render($view);
        // i will use get
    }



}