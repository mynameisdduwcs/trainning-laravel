<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Repositories\Faculty\FacultiesRepository;


class FacultyController extends Controller

{

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
        $faculties = $this->facultiesRepo->getFaculty();
        return view('faculties.index', compact('faculties'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculties = $this->facultiesRepo->create($request->all());
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

        $faculties = $this -> facultiesRepo->find($id);
        return view('faculties.edit',compact('faculties'));


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
        $faculties = $this ->facultiesRepo->find($id);
        $faculties->update($request->all());
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
        $faculties =$this ->facultiesRepo->find($id);
        $faculties->delete();
        return redirect()->route('faculties.index');
    }
}
