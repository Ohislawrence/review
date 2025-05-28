@extends('layouts.app')
@section('title',  'Create Blog')
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  '' )
@section('imagealt',  'Learn about what we do' )


@section('header')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

<script>
    $(document).ready(function() {
        $('#categories').select2({
            placeholder: "Select categories",
            allowClear: true
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
        <h1 class="h3 mb-0 text-gray-800">Create New Blogs</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Image</label>
                      <input type="file" name="image" class="form-control" id="" >
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Categories</label>
                        <select name="category_id" class="form-select" id="categories" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Post</label>
                      <textarea name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="saveUserBtn">Post</button>
                  </div>
                </form>
        </div>
    </div>
</div>
@endsection