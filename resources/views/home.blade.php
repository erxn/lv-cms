@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">MyLaravelCMS Dashboard</h4>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex"
            id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="text" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h3 class="card-title mb-2"><i class="link-icon" data-feather="calendar"></i>
                                Posts</h3>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{  $counts['postCount'] }}</h3>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2"><i class="link-icon" data-feather="message-square"></i>
                                Categories</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{  $counts['catCount'] }}</h3>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2"><i class="link-icon" data-feather="users"></i>
                                Users</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{  $counts['userCount'] }}</h3>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->


<div class="row">
    <div class="col-lg-7 col-xl-8 stretch-card mb-2">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">List of Posts</h6>
                    <div class="dropdown mb-2">
                        <a class="dropdown-item d-flex align-items-center" href="post"><i data-feather="eye"
                                class="icon-sm mr-2"></i> <span class="">View</span></a>
                    </div><br />
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="pt-1">#</th>
                                <th class="pt-1">Title</th>
                                <th class="pt-1">Author</th>
                                <th class="pt-1">Post Date</th>
                                <th class="pt-1">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->blogAuthor->name }}</td>
                                <td>{{ $data->published_at }}</td>
                                <td><span class="badge badge-danger">{{  $data->category->name }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Categories</h6>
                    <div class="dropdown mb-2">
                        <a class="dropdown-item d-flex align-items-center" href="category"><i data-feather="eye"
                                class="icon-sm mr-2"></i> <span class="">View</span></a>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-1">#</th>
                                    <th class="pt-1">Category</th>
                                    <th class="pt-1">#Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $index => $cat)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td style="text-align: right">{{ $cat->getPosts->count() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
@endsection