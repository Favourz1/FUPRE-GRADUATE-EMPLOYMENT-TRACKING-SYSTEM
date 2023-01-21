<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $student = auth()->user()->student;
        return view('students.profile', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        auth()->user()->student()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'mat_no' => $request->mat_no,
            'dept' => $request->dept,
            'cgpa' => $request->cgpa,
            'marital_status' => $request->marital_status,
            'admission_year' => $request->admission_year,
            'address' => $request->address,
            'country' => $request->country,
        ]);

        if($request->hasFile('image')){
            auth()->user()->student->addMedia($request->image)->toMediaCollection('students');
        }

        return back()->with('success', "Student profile has been updated successfully");
    }

    public function jobProfile() {
        $jobProfile = auth()->user()->student->jobProfile;
        if ($jobProfile == null) {
            $jobProfile = auth()->user()->student->jobProfile()->create([]);
        }
        return view('students.job-profile', compact('jobProfile'));
    }

    public function updateJobProfile(Request $request)
    {
        $request->validate([
            'employment_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        auth()->user()->student->jobProfile()->update([
            'workplace_address' => $request->workplace_address,
            'country' => $request->country,
            'state' => $request->state,
            'company_name' => $request->company_name,
            'company_dept' => $request->company_dept,
            'position' => $request->position,
            'status' => 'not sent',
        ]);

        if($request->hasFile('employment_letter')){
            auth()->user()->student->jobProfile->addMedia($request->employment_letter)->toMediaCollection('job_profiles');
        }

        return back()->with('success', "Job Profile has been updated successfully");
    }

    public function sendJobProfile() {
        auth()->user()->student->jobProfile->update([
            'status' => 'sent'
        ]);
        return back()->with('success', 'Job profile sent successfully!');
    }

    public function jobReferee() {
        $jobReferee = auth()->user()->student->jobReferee;
        if ($jobReferee == null) {
            $jobReferee = auth()->user()->student->jobReferee()->create([
                'name' => ''
            ]);
        }
        return view('students.job-referee', compact('jobReferee'));
    }

    public function updateJobReferee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        auth()->user()->student->jobReferee()->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_dept' => $request->company_dept,
            'company_position' => $request->company_position,
        ]);

        return back()->with('success', "Job Referee has been registered successfully");
    }

    public function changePassword() {
        return view('students.change-password');
    }

    public function updateChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', function($attribute, $value, $fail) {
                if(!Hash::check($value, auth()->user()->password)) {
                    $fail('Old password incorrect');
                }
            }],
            'password' => 'required|string|min:8|confirmed'
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', "Password changed successfully!");
    }
}
