<?php
namespace App\Repositories\Faculty;

use App\Models\Faculty;
use App\Repositories\BaseRepository;

class FacultiesRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Faculty::class;
    }

//    public function getFaculty()
//    {
//        return Faculty::paginate(20);
//    }
}
