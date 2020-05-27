<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['course_id', 'name','description'];


    public function lessons(){

        return $this->hasMany(Lesson::class);
    }
}
