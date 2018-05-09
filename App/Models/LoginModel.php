<?php
namespace App\Models;

use System\Model;

class LoginModel extends Model
{
    /**
     * table name
     */
    protected  $table = 'users';
    /**
     * logged in user
     */
    private $user;

    /**
     * if the given login data is valid
     */
    public function isValidLogin($email, $password)
    {
       $user = $this->where('email=?',$email)->fetch($this->table);
       if(! $user) {
           return false;
       }
        $this->user = $user;

       return password_verify($password, $user->password);

    }
    /**
     * get logged in user data
     */
    public function user()
    {
        return $this->user;
    }


    /**
     * if is logged in  save cookies and session
     */
    public function isLogged()
    {
        if($this->cookie->has('login')) {
            $code = $this->cookie->get('login');
        } elseif($this->session->has('login')) {
            $code = $this->session->get('login');
        } else {
            $code = '';
        }
        $user = $this->where('code=?', $code)->fetch($this->table);
        if(! $user) {
            return false;
        }
        $this->user = $user;
        return true;

    }
    
    
}