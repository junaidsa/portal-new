@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span>Create</h4>
        <div class="row">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Admin</h5>
                    <div class="card-body">
                        <form action="{{url('admin/update')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <input type="hidden" value="{{$admin->id}}" name="id">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                                placeholder="Enter Full Name"value="{{$admin->name}}" />
                                                @error('name')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                                                placeholder="Enter Email" value="{{$admin->email}}" required />
                                                @error('email')
                                                <div class=" invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="basic-default-password">Password</label>
                                                <div class="input-group input-group-merge">
                                                  <input type="password" name="password" id="password" class="form-control" placeholder="············" aria-describedby="basic-default-password3" autocomplete="new-password">
                                                  <span class="input-group-text cursor-pointer" id="password"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                              </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Branch Assignment <span class="text-danger">*</span></label>
                                            <select class="form-select  @error('branch') is-invalid @enderror" id="branch" name="branch">
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $b)
                                                <option value="{{ $b->id }}" {{ $admin->branch_id == $b->id ? 'selected' : '' }}>
                                                    {{ $b->branch }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('branch')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Role Description</label>
                                            <input type="text" name="role_description" class="form-control" value="{{$admin->role_description}}" id="role_description">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="note" class="form-label">Additional Notes</label>
                                            <textarea class="form-control" id="note" name="note" rows="3"> {{$admin->node}}</textarea>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-4 mt-3"><button class="btn btn-primary d-grid w-50">Submit</button></div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
