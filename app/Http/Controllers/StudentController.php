<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Repositories\Student\StudentsRepository;

use App\Repositories\Faculty\FacultiesRepository;
use App\Repositories\Subject\SubjectsRepository;
use App\Repositories\SubjectScore\SubjectScoreRepository;

class StudentController extends Controller
{
    public function __construct(
        StudentsRepository $studentsRepo,
        FacultiesRepository $facultiesRepo,
        SubjectsRepository $subjectsRepo,
        SubjectScoreRepository $pointRepo,

    ) {
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
        $faculties = $this->facultiesRepo->getAll();
        $students = $this->studentsRepo->getAll();
        return view('students.index', compact('students', 'faculties'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = $this->facultiesRepo->getAll();
        $students = $this->studentsRepo->getAll();
        return view('students.create', compact('students', 'faculties'));
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
        $faculties = $this->facultiesRepo->getAll();
        $students = $this->studentsRepo->find($id);
        return view('students.edit', compact('students', 'faculties'));
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
            //dd($file_name);
            $post_file = $file_name->move('images', $file_name->getClientOriginalName());
        }
        $getAll['avatar'] = $post_file;


        $students = $this->studentsRepo->find($id);
        $students->update($getAll);
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

    public function addsubject($id)
    {
        $subject = $this->subjectsRepo->getAll();
        $student = $this->studentsRepo->find($id);
        return view('students.addsubject', compact('student', 'subject'));
    }

    public function savesubject(Request $request)
    {
        $student_id = $request->input('student_id');

        // $subject = $request->input('subject_id');

        // $point = $request->input('point');



        $this-> studentsRepo->find($student_id)->subjects()->syncWithoutDetaching($request->subject_id);
        return redirect()->route('students.index');
    }
}
