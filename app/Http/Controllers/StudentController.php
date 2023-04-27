<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('students.index')->with(['Students' =>Student::with(['Usuarios', 'Teacher', 'Level'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create')->with([
        'Usuarios'=>Usuarios::all(),
        'Teacher'=>Teacher::all(),
        'Level'=>Level::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student = new Student;
        $student->name = $request->name;
        $student->id_teacher = $request->id_teacher;
        $student->id_user = $request->id_user;
        $student->id_level = $request->id_level;
        $student->active = $request->active;
        $student->last_date = $request->last_date;
        $student->save(); 
        return redirect('/students');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('students.edit')->with(['Student'=>Student::find($id),
                                             'Usuarios'=>Usuarios::all(),
                                             'Teacher'=>Teacher::all(),
                                             'Level'=>Level::all()]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $student->name = $request->name;
        $student->id_teacher = $request->id_teacher;
        $student->id_user = $request->id_user;
        $student->id_level = $request->id_level;
        $student->active = $request->active;
        $student->last_date = $request->last_date;
        $student->update(); 
        return redirect('/students');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student::find($id)->delete();
        return ["Error"=>0];
    }
}
