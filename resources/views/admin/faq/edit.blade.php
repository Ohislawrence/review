@extends('layouts.app')
@section('title',  $faq->name )
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
        <h1 class="h3 mb-0 text-gray-800">Edit FAQ for {{ $faq->deal->name }}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
                <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="hidden" name="deal_id" class="form-control" id="question" value="{{ $faq->deal->id }}" readonly>
                    </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Question</label>
                            <input type="text" name="question" class="form-control" id="question" value="{{ $faq->question }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Answer</label>
                          <textarea name="answer" id="answer" class="form-control">{{ $faq->answer }}</textarea>
                        </div>
                        
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" id="saveUserBtn">Update FAQ</button>
                      </div>
                    </form>
        </div>
    </div>
</div>
@endsection

