<?php
namespace  App\Models;

use System\Model;

class CategoriesModel extends Model
{
    /**
     * Table name
     */
    protected  $table = 'categories';

    /**
     * create new category record
     * @return void
     */
    public function create()
    {
        $this->data('name', $this->request->post('name'))
        ->data('status', $this->request->post('status'))
        ->insert($this->table);

    }

    /**
     * update category recorde by id
     * @param $id
     */
    public function update($id)
    {
        $this->data('name', $this->request->post('name'))
            ->data('status', $this->request->post('status'))
            ->where('id=?', $id)
            ->update($this->table);
    }


    


}