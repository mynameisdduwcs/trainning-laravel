<?php
namespace App\Repositories\SubjectScore;

use App\Models\SubjectScore;
use App\Repositories\BaseRepository;

class SubjectScoreRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\SubjectScore::class;
    }

//    public function getSubjectScore()
//    {
//        return SubjectScore::paginate(20);
//    }

}
