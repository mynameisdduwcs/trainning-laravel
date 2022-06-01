<?php

namespace App\Http\Controllers;

use App\Repositories\Faculty\FacultiesRepository;
use Illuminate\Http\Request;


class FacultyController extends Controller

{
    protected $facultiesRepo;
    public function __construct(FacultiesRepository $facultiesRepo)
    {
        $this->facultiesRepo = $facultiesRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = $this->facultiesRepo->paginate(5);
        return view('faculties.index', compact('faculties'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.edit_create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->facultiesRepo->create($request->all());
        return redirect()->route('faculties.index');
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

        $faculty = $this -> facultiesRepo->find($id);
        return view('faculties.edit_create',compact('faculty'));


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
        $faculty = $this ->facultiesRepo->find($id);
        $faculty->update($request->all());
        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty =$this ->facultiesRepo->find($id);
        $faculty->delete();
        return redirect()->route('faculties.index');
    }
}
