<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CategoryModel extends Model
{
    //
    protected $table = "categories";

    public function expenses(){
        return $this->hasMany(Expense::class, 'category');
    }
}
