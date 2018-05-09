<?php
namespace  App\Models;

use System\Model;

class JobsModel extends Model
{

    /**
     * Table name
     */
    protected  $table = 'jobs';

    /**
     * create new category record
     * @return void
     */
    public function all()
    {

             return   $this->select('j.*','c.name AS `category`','u.first_name','u.last_name')
                        ->from('jobs j')
                           ->join(' left join  categories c ON  j.category_id = c.id')
                           ->join(' left join  users u ON  j.user_id =u.id ')
                            ->fetchAll();

    }


    /**
     * get last jobs
     */
    public function latest()
    {
        // get the latest jobs

        return $this->select('j.*','c.name AS `category`','u.first_name','u.last_name')
            ->select('(SELECT COUNT(jo.id)FROM job_reviews jo WHERE jo.job_id =j.id)AS `total_reviews`')
            ->from('jobs j')
            ->join(' left join  categories c ON  j.category_id = c.id')
            ->join(' left join  users u ON  j.user_id =u.id ')
            //->where('j.status=?', 'enabled')
            ->orderBy('j.id' ,'DESC')
            ->fetchAll();
    }

    /**
     * create
     */
    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image',$image);
        }
        $loginModel = $this->load->model('Login');
       
        $loggedInUser = $loginModel->user();
        
        $this->data('title', $this->request->post('title'))
            ->data('details', $this->request->post('details'))
           ->data('tags',$this->request->post('tags'))
           ->data('user_id',$loggedInUser->id)
           ->data('category_id', $this->request->post('category_id'))
            ->data('status', $this->request->post('status'),'enabled')
            ->data('budget', $this->request->post('budget'))
            ->data('created', $now = time())
            ->insert('jobs');
    }

    /**
     * update
     * @param $id
     */

    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image',$image);
        }

        $this->data('title', $this->request->post('title'))
            ->data('category_id', $this->request->post('category_id'))
            ->data('details', $this->request->post('details'))
            ->data('tags', $this->request->post('tags'))
            ->data('status', $this->request->post('status'))
            ->where('id=?',$id)
            ->update($this->table);

    }



    /**
     * upload user image
     */
    private  function uploadImage()
    {
        $image = $this->request->file('image');
        if(! $image->exists()) {
            return '';
        }
        return $image->moveTo($this->app->file->to('public/images'));
    }

    public function approve()
    {
        return $this->select('j.*','c.name AS `category`','u.first_name','u.last_name')
            ->select('(SELECT COUNT(jo.id)FROM job_reviews jo WHERE jo.job_id =j.id)AS `total_reviews`')
            ->from('jobs j')
            ->join(' left join  categories c ON  j.category_id = c.id')
            ->join(' left join  users u ON  j.user_id =u.id ')
             ->where('approve=?' ,1)
            ->orderBy('j.id' ,'DESC')
            ->fetchAll();   
    }

    /**
     * get jobs depend id because i want see this jobs in page jobs_overies
     *
     */

    public function getJobswithOffers($id)
    {

        $jobs=  $this->select('j.*','c.name AS `category`','u.first_name','u.last_name')
              ->from('jobs j')
              ->join(' left join  categories c ON  j.category_id = c.id')
              ->join(' left join  users u ON  j.user_id =u.id ')
             ->where('j.id =? ', $id)
              ->fetch();
        if(! $jobs) return null;
        $jobs->job_reviews = $this->select('jo.*','u.first_name','u.last_name')
                        ->from('job_reviews jo')
                         ->join(' left join  users u ON  jo.user_id =u.id ')
                        ->where('jo.job_id =?', $id)
                        ->fetchAll();

        return $jobs;
    }

    /**
     * add new offers
     */
    public function addNewOffers($id , $offers, $userId)
    {
        return $this->data('job_id',$id)
                ->data('review', $offers)
                ->data('status','enabled')
                ->data('created',time())
                ->data('user_id', $userId)
                ->insert('job_reviews');
    }


    

}