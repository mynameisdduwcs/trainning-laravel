<?php

namespace App\Http\Controllers;

use App\Repositories\Faculty\FacultiesRepository;
use App\Repositories\Student\StudentsRepository;
use App\Repositories\Subject\SubjectsRepository;
use App\Repositories\SubjectScore\SubjectScoreRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentsRepo;
    protected $facultiesRepo;
    protected $subjectsRepo;
    protected $pointRepo;

    public function __construct(
        StudentsRepository     $studentsRepo,
        FacultiesRepository    $facultiesRepo,
        SubjectsRepository     $subjectsRepo,
        SubjectScoreRepository $pointRepo,

    )
    {
        $this->studentsRepo = $studentsRepo;
        $this->facultiesRepo = $facultiesRepo;
        $this->subjectsRepo = $subjectsRepo;
        $this->pointRepo = $pointRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = $this->facultiesRepo->paginate(5);
        $students = $this->studentsRepo->paginate(5);

        return view('students.index', compact('students', 'faculties'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = $this->facultiesRepo->pluck('name', 'id');
        $students = $this->studentsRepo->getAll();

        return view('students.edit_create', compact('students', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $getAll = $request->all();
        if ($request->has('avatar')) {
            $file_name = $request->file('avatar');
            //dd($file_name);
            $post_file = $file_name->move('images', $file_name->getClientOriginalName());
        }
        $getAll['avatar'] = $post_file;
        $this->studentsRepo->create($getAll);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties = $this->facultiesRepo->pluck('name', 'id');
        $student = $this->studentsRepo->find($id);
        return view('students.edit_create', compact('student', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getAll = $request->all();
        if ($request->has('avatar')) {
            $file_name = $request->file('avatar');

            $post_file = $file_name->move('images', $file_name->getClientOriginalName());
        }
        $getAll['avatar'] = $post_file;


        $student = $this->studentsRepo->find($id);
        $student->update($getAll);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentsRepo->find($id)->delete();

        return redirect()->route('students.index');

    }

    public function addSubject($id)
    {
        $subjects = $this->subjectsRepo->getAll();
        $student = $this->studentsRepo->find($id);

        return view('students.addSubject', compact('student', 'subjects'));
    }

    public function saveSubject(Request $request, $student_id)
    {
        $this->studentsRepo->find($student_id)->subjects()->sync($request->subject_id);

        return redirect()->route('students.index');
    }

    public function addPoint($id)
    {

        $student = $this->studentsRepo->find($id);
        $subject =  $student->subjects->pluck('name', 'id')->toArray();
        $subjects = $this->subjectsRepo->getAll();
        $this->pointRepo

        return view('students.addPoint', compact('subject', 'student', 'subjects','point'));
    }

    public function savePoint(Request $request, $id)
    {


        $data = [];
        foreach ($request->subject_id as $item => $value) {
            array_push($data, [
                'subject_id' => $request->subject_id[$item],
                'point' => $request->point[$item],
            ]);
        }

        $point = [];
        foreach ($data as $key => $value) {
            $point[$value['subject_id']] = ['point' => $value['point']];
        }

        $this->studentsRepo->find($id)->subjects()->syncWithoutDetaching($point);

        return redirect()->route('students.index');
    }

}
