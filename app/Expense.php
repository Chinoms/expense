<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function categories(){
        return $this->belongsTo(CategoryModel::class, 'category');
    }
}
