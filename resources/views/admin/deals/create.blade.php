@extends('layouts.app')
@section('title',  'Creat Deal')
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
            .create(document.querySelector('#long_desc'), {
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
        <h1 class="h3 mb-0 text-gray-800">Create New Deal</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.deals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Images</label>
                      <input type="file" name="images[]" class="form-control" id="" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Categories</label>
                        <select name="categories[]" class="form-select" id="categories" multiple required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Integrations</label>
                        <select name="integrations[]" class="form-select" id="integrations" multiple required>
                            @foreach($integrations as $integration)
                                <option value="{{ $integration->id }}">{{ $integration->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Plan</label>
                        <select name="plan_id" class="form-select" id="integrations"required>
                            @foreach($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Short Description</label>
                        <textarea name="short_desc" class="form-control">{{ old('short_desc') }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Long Description</label>
                      <textarea name="long_desc" id="long_desc" class="form-control">{{ old('long_desc') }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Summary</label>
                      <textarea name="summary" class="form-control">{{ old('summary') }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Price</label>
                      <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Deal Price</label>
                      <input type="text" name="deal_price" class="form-control" id="price" value="{{ old('deal_price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Status</label>
                        <select name="status" class="form-select" id="role" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="pending">pending</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rating</label>
                        <select name="rating" class="form-select" id="role" required>
                            <option value="">Select Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Rating Count</label>
                        <input type="number" name="rating_count" class="form-control" id="" value="{{ old('rating_count') }}" required>
                      </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Video URL</label>
                      <input type="url" name="video" class="form-control" id="" value="{{ old('video') }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Affilite URL</label>
                      <input type="url" name="affiliate_url" class="form-control" id="" value="{{ old('affiliate_url') }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Deal Ends</label>
                      <input type="date" name="deal_ends" class="form-control" id="" value="{{ old('deal_ends') }}" required>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="saveUserBtn">Create Deal</button>
                  </div>
                </form>
        </div>
    </div>
</div>
@endsection