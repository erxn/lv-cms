@extends('layouts.app')

@section('title', 'Update Post')
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
                <h4 class="card-title">Update Form</h4>

                <form class="cmxform" method="POST" action="{{ route('post_store') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" name="title" type="text" value="{{ $datas->title }}">
                            <input id="id" class="form-control" name="id" type="hidden" value="{{ $datas->id }}">
                            @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input id="author" class="form-control" name="author" type="text"
                                value="{{ $datas->author }}">
                            @if($errors->has('author'))
                            <div class="error">{{ $errors->first('author') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Content</label>
                            <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="8"
                                name="content">{{ $datas->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="password">Published at</label>
                            <input name="published_at" class="form-control datepicker"
                                data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"
                                value="{{ $datas->published_at }}" />
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
@endsection