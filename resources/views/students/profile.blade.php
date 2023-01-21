@extends('layouts.main')
@section('title', 'Students')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        <div class="ms-auto">
            <button class="btn btn-primary userEdit" data-bs-toggle="modal" data-bs-target="#createStudentModal" type="button">
                <i class="bx bx-user"></i>Update Profile
            </button>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="page-class">
        <div class="card">
            <div class="card-body">
                <div class="row p-3">
                    <div class="col-md-12 mb-3">
                        @if($student->has_media)
                            <img width="200" src="{{ asset($student->url) }}" />
                        @else
                            <img width="200" src="{{ asset('assets/images/no-image.png') }}" />
                        @endif
                    </div>
                    <div class="col-12 border-bottom">
                        <h2>{{ ucfirst($student->full_name) }}</h2>
                    </div>
                    <div class="col-md-12 p-3">
                        <div class="col-md-12 mb-3">
                            <h4>Personal Details</h4>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Surname: </td>
                                    <td class="text-start" width="70%">{{ $student->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Last Name: </td>
                                    <td class="text-start" width="70%">{{ $student->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Gender: </td>
                                    <td class="text-start" width="70%">{{ ucfirst($student->gender) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Email Address: </td>
                                    <td class="text-start" width="70%">{{ $student->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Phone Number: </td>
                                    <td class="text-start" width="70%">{{ $student->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Date of Birth: </td>
                                    <td class="text-start" width="70%">{{ $student->dob }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Marital Status: </td>
                                    <td class="text-start" width="70%">{{ $student->marital_status }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Address: </td>
                                    <td class="text-start" width="70%">{{ $student->address }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Country: </td>
                                    <td class="text-start" width="70%">{{ $student->country }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Matriculation Number: </td>
                                    <td class="text-start" width="70%">{{ $student->mat_no }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">CGPA: </td>
                                    <td class="text-start" width="70%">{{ $student->cgpa }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Department: </td>
                                    <td class="text-start" width="70%">{{ $student->dept }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Year of Admission: </td>
                                    <td class="text-start" width="70%">{{ $student->admission_year }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modals')
    <div class="modal fade" id="createStudentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="students-form">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Surname</label>
                                <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $student->last_name) }}" name="last_name">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input id="first-name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $student->first_name) }}" placeholder="">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male" @if($student->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if($student->gender == 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone Number</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $student->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $student->address) }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Date Of Birth</label>
                                <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob', $student->dob) }}">
                                <small class="text-muted">Use this format dd/mm/yyyy e.g 01-01-1998</small>
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Marital Status</label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="single" @if($student->gender == 'single') selected @endif>Male</option>
                                    <option value="married" @if($student->gender == 'married') selected @endif>Female</option>
                                    <option value="divorced" @if($student->gender == 'divorced') selected @endif>Divorced</option>
                                </select>
                                @error('marital_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Country</label>
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $student->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Matriculation Number</label>
                                <input id="mat_no" type="text" class="form-control @error('mat_no') is-invalid @enderror" name="mat_no" value="{{ old('mat_no', $student->mat_no) }}">
                                @error('mat_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Department</label>
                                <input id="department" type="text" class="form-control @error('dept') is-invalid @enderror" name="dept" value="{{ old('dept', $student->dept) }}">
                                @error('dept')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">CGPA</label>
                                <input id="cgpa" type="text" class="form-control @error('cgpa') is-invalid @enderror" name="cgpa" value="{{ old('cgpa', $student->cgpa) }}">
                                @error('cgpa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Year of Admission</label>
                                <input id="admission_year" type="text" value="{{ old('admission_year', $student->admission_year) }}" class="form-control @error('admission_year') is-invalid @enderror" name="admission_year">
                                @error('admission_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                @if($student->url)
                                    <div><img src="{{ asset($student->url) }}" alt=""></div>
                                @endif
                                <label for="">Upload Student Picture (max-size: 2MB)</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#students-form').submit()" id="register-btn">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush
