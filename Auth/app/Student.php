<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'student_subject','student_id','subject_id');
    }
    
    // public function subjectsThroughTeachers()
    // {
    //     return $this->hasManyThrough(Subject::class, Teacher::class);
    // }

    


   


}
