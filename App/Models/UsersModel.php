<?php
namespace  App\Models;

use System\Model;

class UsersModel extends Model
{

    /**
     * Table name
     */
    protected  $table = 'users';

    /**
     * create new category record
     * @return void
     */
    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image',$image);
        }
        $password = $this->request->post('password');
        if($password) {
            $this->data('password',password_hash($password,PASSWORD_DEFAULT));

        }
        $this->data('first_name', $this->request->post('first_name'))
            ->data('last_name', $this->request->post('last_name'))
            ->data('email', $this->request->post('email'))
            ->data('birthday',strtotime($this->request->post('birthday')))
            ->data('created', $now = time())
            ->data('gender',$this->request->post('gender'))
            ->data('ip',$this->request->serves('REMOTE_ADDR'))
            ->data('status', $this->request->post('status'))
            ->data('role',$this->request->post('role'))
            ->data('code', sha1($now. mt_rand()))
            ->insert($this->table);

    }

    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image',$image);
        }
        $password = $this->request->post('password');
        if($password) {
            $this->data('password',password_hash($password,PASSWORD_DEFAULT));

        }
        $this->data('first_name', $this->request->post('first_name'))
            ->data('last_name', $this->request->post('last_name'))
            ->data('email', $this->request->post('email'))
            ->data('birthday',strtotime($this->request->post('birthday')))
            ->data('gender',$this->request->post('gender'))
            ->data('status', $this->request->post('status'))
            ->data('role',$this->request->post('role'))
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
    //select all freelancer depend proto
    public function info()
    {
        return $this->select('u.*','up.info AS`info`')
            ->from('users u')
            ->join('left join user_portfolio up ON u.id = up.user_id ')
            ->fetchAll();

    }



}