@extends('admin.layouts.app')
@section('title', 'Edit Profile')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                </div>
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Profile</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="offset-4 col-4 mb-2">
                                    <a href="#">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('images/defaultProfile.png') }}" class="rounded" />
                                        @else
                                            <img src="" alt="">
                                        @endif
                                    </a>
                                    <input type="file" class="form-control mt-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-2 col-8">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Name</label>
                                        <input name="name" type="text" class="form-control "
                                            value="{{ old('name', Auth::user()->name) }}">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input name="email" type="email" class="form-control"
                                            value="{{ old('name', Auth::user()->email) }}">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Phone</label>
                                        <input name="phone" type="text" class="form-control"
                                            value="{{ old('name', Auth::user()->phone) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Address</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ old('name', Auth::user()->address) }}">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Role</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ old('name', Auth::user()->role) }}" disabled>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="offset-5 col-2 ">
                                        <button class="btn btn-dark"><i class="fa-solid fa-greater-than me-2"></i>Update
                                            Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
    @endsection
