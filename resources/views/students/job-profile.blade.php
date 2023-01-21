@extends('layouts.main')
@section('title', 'Job Profile')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        @if($jobProfile->status != 'pending')
            <div class="ms-auto">
                <button class="btn btn-primary userEdit" data-bs-toggle="modal" data-bs-target="#createStudentModal" type="button">
                    <i class="bx bx-briefcase"></i>Update Job Profile
                </button>
            </div>
        @endif
    </div>
    <!--end breadcrumb-->

    <div class="page-class">
        <div class="card">
            <div class="card-body">
                <div class="row p-3">
                    <div class="col-md-12 p-3">
                        <div class="col-md-12 mb-3">
                            <h4>Job Profile</h4>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Workplace Address: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->workplace_address }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Country: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->country }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">State: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->state }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Company Name: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->company_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Company Department: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->company_dept }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Position: </td>
                                    <td class="text-start" width="70%">{{ $jobProfile->position }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Employment Letter: </td>
                                    <td class="text-start" width="70%">@if($jobProfile->employment_letter_url)<a href="{{ asset($jobProfile->employment_letter_url) }}" class="btn btn-primary" download>Download</a> @endif</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-start" width="30%">Verification Status: </td>
                                    <td class="text-start" width="70%">
                                        {{ $jobProfile->status }}
                                        @if($jobProfile->status == 'not sent')
                                            <form class="d-inline-block" method="post" action="{{ route('dashboard.job-profile.send') }}">
                                                @csrf @method('put')
                                                <button class="btn btn-success btn-sm">Send</button>
                                            </form>
                                        @endif
                                    </td>
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
                    <h5 class="modal-title">Update Job Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="students-form">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Workplace Address</label>
                                <input id="workplace_address" type="text" class="form-control @error('workplace_address') is-invalid @enderror" name="workplace_address" value="{{ old('workplace_address', $jobProfile->workplace_address) }}">
                                @error('workplace_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Country</label>
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $jobProfile->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">State</label>
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state', $jobProfile->state) }}">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Name</label>
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $jobProfile->company_name) }}">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Department</label>
                                <input id="company_dept" type="text" class="form-control @error('company_dept') is-invalid @enderror" name="company_dept" value="{{ old('company_dept', $jobProfile->company_dept) }}">
                                @error('company_dept')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Position</label>
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position', $jobProfile->position) }}">
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Upload Employment Letter (max-size: 2MB)</label>
                                <input type="file" class="form-control @error('employment_letter') is-invalid @enderror" name="employment_letter">
                                @error('employment_letter')
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
