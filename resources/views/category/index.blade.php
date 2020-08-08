@extends('layouts.app')

@section('title', 'Categories')
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Blog Categories</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories</h4>
                <form class="cmxform" method="POST" action="{{ route('category_create') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="title">Category Name</label>
                            <input id="title" class="form-control" name="category" type="text"
                                value="{{ old('category') }}">
                            @if($errors->has('category'))
                            <div class="error">{{ $errors->first('category') }}</div>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="link-icon" data-feather="airplay"></i>
                            Publish</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="pt-1">#</th>
                                <th class="pt-1">Category</th>
                                <th class="pt-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->category }}</td>
                                <td>
                                    <span style="display: inline;">
                                        <button class="btn btn-success text-white"
                                            href="{{ route('category_update',['id' => $data->id]) }}"><i
                                                class="link-icon" data-feather="save"></i>
                                            Update</button>
                                        <form method="post" action="{{route('category_delete')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <button class="btn btn-danger" type="submit"><i class="link-icon"
                                                    data-feather="trash-2"></i>
                                                Delete</button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
@endsection