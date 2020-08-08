@extends('layouts.app')

@section('title', 'Post')
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Blog Post</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Post Form</h4>
                <form class="cmxform" method="POST" action="{{ route('post_store') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" name="title" type="text" value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input id="authname" class="form-control" name="authname" type="text"
                                value="{{ Auth::user()->name }}" disabled>
                            {{-- @if($errors->has('authname'))
                            <div class="error">{{ $errors->first('authname') }}</div>
                        @endif --}}
                        <input type="hidden" name="author" value="{{ Auth::id() }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label">Content</label>
                <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="8"
                    name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Published at</label>
                <input name="published_at" class="form-control datepicker" data-inputmask="'alias': 'datetime'"
                    data-inputmask-inputformat="dd/mm/yyyy" />
            </div>
            <div class="form-group">
                <label for="featimg">Feature Image</label>
                <input type="file" class="form-control-file" id="featimg" name="featimg">
            </div>
            <button class="btn btn-danger text-white" type="submit" name="draft"><i class="link-icon"
                    data-feather="clipboard"></i> Draft</button>
            <button class="btn btn-primary" type="submit"><i class="link-icon" data-feather="cast"></i>
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
                                <th class="pt-1">Title</th>
                                <th class="pt-1">Author</th>
                                <th class="pt-1">Category</th>
                                <th class="pt-1">Published Date</th>
                                <th class="pt-1">Image</th>
                                <th class="pt-1">Status</th>
                                <th class="pt-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $index => $post)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->blogAuthor->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td><img src="{{ asset('/assets/front/'.$post->featimg) ?? ''}}" /></td>
                                @if( $post->status == 'published' )
                                <td><span class="badge badge-success">Released</span></td>
                                @else
                                <td><span class="badge badge-warning">Draft</span></td>
                                @endif
                                <td>
                                    <a class="btn btn-warning text-white"
                                        href="{{ route('post_update',['id' => $post->id]) }}"><i class="link-icon"
                                            data-feather="save"></i> Update</a>
                                    <form method="post" action="{{route('post_delete')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$post->id}}">
                                        <button class="btn btn-danger" type="submit"><i class="link-icon"
                                                data-feather="trash-2"></i>
                                            Delete</button>
                                    </form>
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