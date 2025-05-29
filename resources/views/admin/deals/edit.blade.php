@extends('layouts.app')
@section('title',  $deal->name )
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
@endsection



@section('breadcrumbs')

@endsection


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid content-container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $deal->name }}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
                <form action="{{ route('admin.deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $deal->name }}" required>
                        </div>
                        <!-- Images -->
    <div class="mb-3">
        <label for="images" class="form-label">Images</label>
        <input type="file" name="images[]" class="form-control" id="images" multiple>
        
        @if($deal->images->count() > 0)
            <div class="mt-3">
                <h6>Current Images:</h6>
                <div class="row">
                    @foreach($deal->images as $image)
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" style="height: 100px;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" 
                                       name="deleted_images[]" 
                                       value="{{ $image->id }}" 
                                       id="delete_image_{{ $image->id }}">
                                <label class="form-check-label" for="delete_image_{{ $image->id }}">
                                    Delete
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Short Description</label>
                            <textarea name="short_desc" class="form-control">{{ $deal->short_desc }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Long Description</label>
                          <textarea name="long_desc" id="long_desc" class="form-control">{{ $deal->long_desc }}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Summary</label>
                          <textarea name="summary" class="form-control">{{ $deal->summary }}</textarea>
                        </div>
                        <!-- Categories -->
    <div class="mb-3">
        <label for="categories" class="form-label">Categories</label>
        <select name="categories[]" class="form-select" id="categories" multiple required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ in_array($category->id, $deal->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
                        <!-- Integrations -->
    <div class="mb-3">
        <label for="integrations" class="form-label">Integrations</label>
        <select name="integrations[]" class="form-select" id="integrations" multiple required>
            @foreach($integrations as $integration)
                <option value="{{ $integration->id }}" 
                    {{ in_array($integration->id, $deal->integrations->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $integration->name }}
                </option>
            @endforeach
        </select>
    </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Price</label>
                          <input type="text" name="price" class="form-control" id="price" value="{{ $deal->price }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Deal Price</label>
                          <input type="text" name="deal_price" class="form-control" id="price" value="{{ $deal->deal_price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Status</label>
                            <select name="status" class="form-select" id="role" required>
                                <option value="">Select Status</option>
                                <option value="active" {{ $deal->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="pending" {{ $deal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Video URL</label>
                          <input type="url" name="video" class="form-control" id="" value="{{ $deal->video }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Affilite URL</label>
                          <input type="url" name="affiliate_url" class="form-control" id="" value="{{ $deal->affiliate_url }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Deal Ends</label>
                          <input type="date" name="deal_ends" class="form-control" id="" value="{{ $deal->deal_ends }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Deal</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection


<!-- Delete Deal Modal -->
<div class="modal fade" id="deleteDealModal{{ $deal->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $deal->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel{{ $deal->id }}">Delete Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this deal? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.deals.destroy', $deal->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>