@extends('layouts.main')
@section('title', 'Job Referee')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        <div class="ms-auto">
            <button class="btn btn-primary userEdit" data-bs-toggle="modal" data-bs-target="#createStudentModal" type="button">
                <i class="bx bx-plus"></i>Update Job Referee
            </button>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="page-class">
        <div class="card">
            <div class="card-body">
                <div class="row p-3">
                    <div class="col-md-12 p-3">
                        <div class="col-md-12 mb-3">
                            <h4>Job Referee</h4>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Name: </td>
                                    <td class="text-start" width="70%">{{ $jobReferee->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Phone Number</td>
                                    <td class="text-start" width="70%">{{ $jobReferee->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Email Address: </td>
                                    <td class="text-start" width="70%">{{ $jobReferee->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Company Name: </td>
                                    <td class="text-start" width="70%">{{ $jobReferee->company_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Company Department: </td>
                                    <td class="text-start" width="70%">{{ $jobReferee->company_dept }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Company Position: </td>
                                    <td class="text-start" width="70%">{{ $jobReferee->company_position }}</td>
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
                    <h5 class="modal-title">Update Job Referee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="students-form">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $jobReferee->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone Number</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $jobReferee->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $jobReferee->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Name</label>
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $jobReferee->company_name) }}">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Department</label>
                                <input id="company_dept" type="text" class="form-control @error('company_dept') is-invalid @enderror" name="company_dept" value="{{ old('company_dept', $jobReferee->company_dept) }}">
                                @error('company_dept')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Position</label>
                                <input id="company_position" type="text" class="form-control @error('company_position') is-invalid @enderror" name="company_position" value="{{ old('company_position', $jobReferee->company_position) }}">
                                @error('company_position')
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
