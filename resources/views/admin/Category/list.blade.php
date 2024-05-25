@extends('admin.layouts.app')
@section('title', 'Category List Page')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Category List</h2>

                            </div>
                        </div>

                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    @if (session('message'))
                        <div class="">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check"></i> {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if (session('deleteMessage'))
                        <div class="">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('deleteMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <h4 class="btn btn-success">Total Category= {{ $categories->total() }}</h4>
                        </div>
                        <div class="col-4 offset-5 mb-3 me-0">

                            <form action="{{ route('category#listPage') }}" method="GET">
                                @csrf
                                <div class="d-flex">

                                    <input type="text" class="border border-success rounded" name="searchCategory"
                                        placeholder="Search Categories" value="{{ request('searchCategory') }}">
                                    <button class="btn btn-success mx-1" type="submit"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>

                    @if (count($categories) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="tr-shadow">
                                            <td>{{ $category->id }}</td>
                                            <td class="col-6">{{ $category->name }}</td>
                                            <td>{{ $category->created_at->format('j-F-y') }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </button> --}}
                                                    <a href="{{ route('category#edit', $category->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('category#delete', $category->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                            title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    @else
                        <h3 class="text-danger mb-5 text-center">There is no categories here!</h3>
                    @endif




                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
