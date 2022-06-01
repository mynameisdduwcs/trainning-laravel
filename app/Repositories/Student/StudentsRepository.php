<?php
namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentsRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Student::class;
    }

//    public function getStudent()
//    {
//        return Student::paginate(2);
//    }

}
