<?php

namespace App\Http\Controllers;

use App\Models\Student;

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
        $students = Student::all();

        return response()->json([
            "message" => "students data successfully fetched",
            "data" => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
        ]);

        return response()->json([
            "message" => "student successfully created",
            "data" => $student
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data = Student::find($student->id)->first();
        return response()->json([
            "message" => "student data successfully fetched",
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = Student::find($student->id);

        $data->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
        ]);

        return response()->json([
            "message" => "student successfully created",
            "data" => $data->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::find($student->id)->delete();

        return response()->json([
            "message" => "datanya udah kehapus",            
        ]);
    }
}
