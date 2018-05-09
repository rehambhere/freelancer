<?php
//white list routs//
use System\Application;

$app= Application::getInstance($file);
//logout
$app->route->add('/admin/logout','Admin/Logout');

if(strpos($app->request->url(),'/admin') === 0){
    //check if the curren url started
    //if so, then call our middlewares
    $app->load->action('Admin/Access','index');
    //share admin layout
    $app->share('adminLayout',function($app){
        return $app->load->controller('Admin/Common/Layout');
    });

} else {
    if (strpos($app->request->url(), '/') === 0) {
        //check if the curren url started
        //if so, then call our middlewares
        $app->load->action('freelancer/Access', 'index');
        //share admin layout
        $app->share('freelancerLayout', function ($app) {
            return $app->load->controller('Freelancer/Common/Layout');
        });

    }
}


// Admin Routs
$app->route->add('/admin/login','Admin/Login');
$app->route->add('/admin/login/submit','Admin/Login@submit','POST');

//add categories
$app->route->add('/admin/categories','Admin/Categories');
$app->route->add('/admin/categories/add','Admin/Categories@add','POST');
$app->route->add('/admin/categories/submit','Admin/Categories@submit','POST');
$app->route->add('/admin/categories/edit/:id','Admin/Categories@edit','POST');
$app->route->add('/admin/categories/save/:id','Admin/Categories@save','POST');
$app->route->add('/admin/categories/delete/:id','Admin/Categories@delete','POST');

// user-protofilio
$app->route->add('/admin/profile','Admin/Profile','POST');
$app->route->add('/admin/profile/update','Admin/Profile@add','POST');

//jobs
$app->route->add('/admin/jobs','Admin/Jobs');
$app->route->add('/admin/jobs/add','Admin/Jobs@add','POST');
$app->route->add('/admin/jobs/submit','Admin/Jobs@submit','POST');
$app->route->add('/admin/jobs/edit/:id','Admin/Jobs@edit','POST');
$app->route->add('/admin/jobs/save/:id','Admin/Jobs@save','POST');
$app->route->add('/admin/jobs/delete/:id','Admin/Jobs@delete','POST');
$app->route->add('/jobs','Freelancer/jobs');
$app->route->add('/jobs/submit','Freelancer/Jobs@submit','POST');
//users-pages
$app->route->add('/admin/users','Admin/Users');
$app->route->add('/admin/users/add','Admin/Users@add','POST');
$app->route->add('/admin/users/submit','Admin/Users@submit','POST');
$app->route->add('/admin/users/edit/:id','Admin/Users@edit','POST');
$app->route->add('/admin/users/save/:id','Admin/Users@save','POST');
$app->route->add('/admin/users/delete/:id','Admin/Users@delete','POST');
//proto
$app->route->add('/admin/portfolio','Admin/UserPortfolio');
$app->route->add('/admin/portfolio/add','Admin/UserPortfolio@add','POST');
$app->route->add('/admin/portfolio/submit','Admin/UserPortfolio@submit','POST');
$app->route->add('/admin/portfolio/edit/:id','Admin/UserPortfolio@edit','POST');
$app->route->add('/admin/portfolio/save/:id','Admin/UserPortfolio@save','POST');
$app->route->add('/admin/portfolio/delete/:id','Admin/UserPortfolio@delete','POST');
//dashboard
$app->route->add('/admin','Admin/Dashboard');
$app->route->add('/admin/dashboard','Admin/Dashboard');
$app->route->add('/admin/submit','Admin/Dashboard@submit','POST');

$app->route->add('/post/:text/:id','Posts/post');
//not found page
$app->route->add('/404','NotFound');
$app->route->notFound('/404');
//logout
// templet routs
$app->route->add('/posts_jobs','Freelancer/PostsJobs');
//$app->route->add('/posts_jobs/add','Freelancer/PostsJobs@add','POST');
$app->route->add('/posts_jobs/submit','Freelancer/PostsJobs@submit','POST');
$app->route->add('/jobs/submit','Freelancer/Jobs@submit','POST');

$app->route->add('/jobs/:text/:id','Freelancer/JobsReviews');
$app->route->add('/jobs/:text/:id/add-offers','Freelancer/Jobs@addOffers','POST');

$app->route->add('/contact-us','Freelancer/Contact');
$app->route->add('/about-us','Freelancer/About');
$app->route->add('/profile','Freelancer/Profile');
$app->route->add('/search','Freelancer/Search');
$app->route->add('/users','Freelancer/Users');
/**login//register//logout/content//**/
$app->route->add('/', 'Freelancer/Home');//Home Page
$app->route->add('/logout','Freelancer/Logout');
$app->route->add('/login/submit','Freelancer/Home@submit','POST');
$app->route->add('/register/submit','Freelancer/Home@submit','POST');
//$app->route->add('/register','Freelancer/Register');
//$app->route->add('/register','Freelancer/Login');
$app->route->add('/contact-us/submit','Freelancer/Contact@submit','POST');


