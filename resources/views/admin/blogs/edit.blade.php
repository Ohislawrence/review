@extends('layouts.app')
@section('title',  $blog->title )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  '' )
@section('imagealt',  'Learn about what we do' )


@section('header')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection


@section('footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#desc'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'insertTable', 'mediaEmbed', 'undo', 'redo'],
                mediaEmbed: {
                    previewsInData: true
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
    </script>
@endsection



@section('breadcrumbs')

@endsection


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid content-container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $blog->title }}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
                <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ $blog->title }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Image</label>
                      <input type="file" name="image" class="form-control" id="" >
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Categories</label>
                        <select name="category_id" class="form-select" id="categories" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Post</label>
                      <textarea name="desc" id="desc" class="form-control">{{ $blog->desc }}</textarea>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="saveUserBtn">Edit Post</button>
                  </div>
                        
                    </form>
        </div>
    </div>
</div>
@endsection

