@extends('layouts.main')
@section('title', 'Students')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        <div class="ms-auto">
            <button class="btn btn-primary userEdit" data-bs-toggle="modal" data-bs-target="#createStudentModal" type="button">
                <i class="bx bx-user"></i>Edit Student Data
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
                                    <td class="fw-bold text-end" width="50%">First Name: </td>
                                    <td class="text-start" width="50%">{{ $student->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Last Name: </td>
                                    <td class="text-start" width="50%">{{ $student->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Other Name: </td>
                                    <td class="text-start" width="50%">{{ $student->other_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Email Address: </td>
                                    <td class="text-start" width="50%">{{ $student->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Phone Number: </td>
                                    <td class="text-start" width="50%">{{ $student->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Gender: </td>
                                    <td class="text-start" width="50%">{{ $student->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Address: </td>
                                    <td class="text-start" width="50%">{{ $student->address }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">State of Origin: </td>
                                    <td class="text-start" width="50%">{{ $student->state_of_origin }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">LGA'S of Origin: </td>
                                    <td class="text-start" width="50%">{{ $student->lga_of_origin }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Date Of Origin: </td>
                                    <td class="text-start" width="50%">{{ $student->date_of_graduation }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" width="50%">Employment Status: </td>
                                    <td class="text-start" width="50%">{{ $student->job_status }}</td>
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
                                <label for="">First Name</label>
                                <input id="first-name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Last Name</label>
                                <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Other Name</label>
                                <input id="other-name" type="text" class="form-control @error('other_name') is-invalid @enderror" name="other_name">
                                @error('other_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone Number</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Address</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">State Of Origin</label>
                                <input id="state" type="text" class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin">
                                @error('state_of_origin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">L.G.A</label>
                                <input id="lga" type="text" class="form-control @error('lga_of_origin') is-invalid @enderror" name="lga_of_origin">
                                @error('lga_of_origin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Date of Graduation</label>
                                <input id="date-graduation" type="text" class="form-control @error('date_of_graduation') is-invalid @enderror" name="date_of_graduation">
                                @error('date_of_graduation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Job Status</label>
                                <select id="job-status" name="job_status" id="job_status" class="form-control">
                                    <option>Unemployed</option>
                                    <option>Employed</option>
                                </select>
                                @error('job_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Upload Student Picture (max-size: 2MB)</label>
                                <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#students-form').submit()" id="register-btn">Register</button>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('js')
<script>
$(".userEdit").on("click", function() {
    let studentData = $(this).data("student")
    $(".modal-title").html("Update Student Data")
    $("#first-name").val(studentData.first_name)
    $("#last-name").val(studentData.last_name)
    $("#other-name").val(studentData.other_name)
    $("#email").val(studentData.email)
    $("#phone").val(studentData.phone)
    $("#address").val(studentData.address)
    $("#state").val(studentData.state_of_origin)
    $("#gender").val(studentData.gender)
    $("#lga").val(studentData.lga_of_origin)
    $("#date-graduation").val(studentData.date_of_graduation)
    $("#job-status").val(studentData.job_status)
    $("#students-form").attr("action", "/students/"+studentData.id);
    $("#register-btn").text("Update");
})
@endpush
