<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'other_name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'gender' => 'required',
            'address' => 'nullable',
            'state_of_origin' => 'nullable',
            'lga_of_origin' => 'nullable',
            'date_of_graduation' => 'nullable',
            'job_status' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_name' => $request->other_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'state_of_origin' => $request->state_of_origin,
            'lga_of_origin' => $request->lga_of_origin,
            'date_of_graduation' => $request->date_of_graduation,
            'job_status' => $request->job_status,
        ]);

        if($request->hasFile('picture')){
            $student->addMedia($request->picture)->toMediaCollection('students');
        }

        return back()->with('success', "Student has been registered successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'other_name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'gender' => 'required',
            'address' => 'nullable',
            'state_of_origin' => 'nullable',
            'lga_of_origin' => 'nullable',
            'date_of_graduation' => 'nullable',
            'job_status' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_name' => $request->other_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'state_of_origin' => $request->state_of_origin,
            'lga_of_origin' => $request->lga_of_origin,
            'date_of_graduation' => $request->date_of_graduation,
            'job_status' => $request->job_status,
        ]);

        if($request->hasFile('picture')){
            $student->clearMediaCollection('students');
            $student->addMedia($request->picture)->toMediaCollection('students');
        }

        return back()->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
