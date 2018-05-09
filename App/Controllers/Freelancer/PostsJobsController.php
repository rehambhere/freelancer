<?php
namespace App\Controllers\Freelancer;

use System\Controller;

class PostsJobsController extends Controller
{
    public function index()
    {
        $this->html->setTitle('Post_Jobs');
        $data['categories']= $this->load->model('Categories')->all();
        $view = $this->view->render('freelancer/posts_jobs', $data);
        return $this->freelancerLayout->render($view);
    }
    /*
        * @return mixed
        * submit form
        */
    public function submit()
    {
        if($this->isValid()){
            //its mean no have errors
            $this->load->model('Jobs')->create();
            return $this->url->redirectTo('/jobs');
        } else {
            return $this->url->redirectTo('/posts_jobs');
        }
    }

    /**
     * Validate the form
     */
    private function isValid()
    {
        $title = $this->request->post('title');
        $category_id = $this->request->post('category_id');
        $budget = $this->request->post('budget');
        if(! $title)
        {
            $this->errors[]='Title  its requered';
        }

        if(! $category_id){
            $this->errors[]='Categories its requered';

        }
        if(! $budget) {
            $this->errors[]=' its requered';

        }
        $this->load->model('Categories')->all();
        return empty($this->errors);
    }


}