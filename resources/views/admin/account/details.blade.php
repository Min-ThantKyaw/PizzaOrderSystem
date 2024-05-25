@extends('admin.layouts.app')
@section('title', 'Profile')
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
                                <h3 class="text-center title-2">Your Profile</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-2 offset-2">
                                    <a href="#">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('images/defaultProfile.png') }}" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="col-5 offset-1">
                                    <div class="form-group">
                                        <h4 class="control-label mb-1"><i
                                                class="fa-regular fa-user me-2"></i>{{ Auth::user()->name }}</h4>
                                        <h4 class="control-label mb-1"><i
                                                class="fa-solid fa-envelope me-2"></i>{{ Auth::user()->email }}</h4>
                                        <h4 class="control-label mb-1"><i
                                                class="fa-solid fa-phone me-2"></i>{{ Auth::user()->phone }}</h4>
                                        <h4 class="control-label mb-1"><i
                                                class="fa-solid fa-address-book me-2"></i>{{ Auth::user()->address }}</h4>
                                        <h4 class="control-label mb-1"><i
                                                class="fa-solid fa-calendar-days me-2"></i>{{ Auth::user()->created_at->format('j-F-Y') }}
                                        </h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="  offset-2 col-4 ">
                                    <a href="{{ route('admin#edit') }}"> <button class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square me-2"></i>Edit
                                            Profile</button></a>
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
