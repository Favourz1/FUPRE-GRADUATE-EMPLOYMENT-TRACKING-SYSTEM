@extends('layouts.main')
@section('title', 'Students')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        <div class="ms-auto">
            <button class="btn btn-primary userCreateBtn" data-bs-toggle="modal" data-bs-target="#createStudentModal" type="button">
                <i class="bx bx-user"></i>Register New Student
            </button>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="page-class">
        <div class="card">
            <div class="card-body">
                @if($students->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="studentsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Job Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            @if($student->has_media)
                                                <img src="{{ $student->url }}" width="150" />
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->job_status }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student) }}" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                            <button class="btn btn-warning btn-sm userEdit" data-bs-toggle="modal" data-bs-target="#createStudentModal" data-student="{{ json_encode($student) }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info border-0 bg-outline-info">
                        <div class="text-dark">There are no student data available</div>
                    </div>
                @endif
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
                    <h5 class="modal-title">Register New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" id="students-form">
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
    $("#students-form").append('<input type="hidden" name="_method" value="PUT" id="hidden-put">')
    $("#register-btn").text("Update");
})

$(".userCreateBtn").on("click", function() {
    $(".modal-title").html("Register Student")
    $("#first-name").val("")
    $("#last-name").val("")
    $("#other-name").val("")
    $("#email").val("")
    $("#phone").val("")
    $("#address").val("")
    $("#state").val("")
    $("#gender").val("")
    $("#lga").val("")
    $("#date-graduation").val("")
    $("#job-status").val("")
    $("#students-form").attr("action", "/students/");
    if($("#hidden-put").length > 0) {
        $("#hidden-put").remove()
    }
    $("#register-btn").text("Register");
});
</script>
@endpush
