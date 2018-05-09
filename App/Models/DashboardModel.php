<?php

namespace App\Models;

use System\Model;

class DashboardModel extends Model
{
    public function allUser()
    {

      return $this->select('(SELECT COUNT(u.id)FROM users u )AS `total_users`')
        ->from('users')
        ->fetchAll();

    }

    /**
     * @return mixed
     * get just enabled job  and have anew job not empty
     */

    public function getEnabledCategorieswithNumberofTotalPost()
    {
        return $this->select('c.id','c.name')
            ->select('(SELECT COUNT(j.id)FROM jobs j WHERE j.status="enabled" AND j.category_id = c.id )AS `total_jobs`')
            ->from('categories c')
            ->where('c.status =?', 'enabled')
            ->fetchAll();
    }
}