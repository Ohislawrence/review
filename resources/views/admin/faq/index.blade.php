@extends('layouts.app')
@section('title',  'FAQ!' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  '' )
@section('imagealt',  'Learn about what we do' )


@section('header')

@endsection


@section('footer')
<script>
</script>
@endsection



@section('breadcrumbs')

@endsection


@section('content')
 
  <!-- Begin Page Content -->
<div class="container-fluid content-container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Deals</h1>
      <a class="btn btn-primary" href="{{ route('admin.faq.create') }}">
          <i class="fas fa-plus fa-sm text-white-50"></i> Add FAQ
      </a>
  </div>
  
  <!-- Data Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 fw-bold text-primary">FAQ List</h6> <!-- Updated font class -->
      <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end shadow animated--fade-in"> <!-- Updated to dropdown-menu-end -->
              <div class="dropdown-header">Export Options:</div>
              <a class="dropdown-item" href="#">Excel</a>
              <a class="dropdown-item" href="#">CSV</a>
              <a class="dropdown-item" href="#">PDF</a>
          </div>
      </div>
  </div>

  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Deal</th>
                      <th>Question</th>
                      <th> Answer</th> 
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($faqs as $faq)
                  
                  <tr>
                      <td>{{ $faq->deal->name }}</td>
                      <td>{{ $faq->question}}</td>
                      <td>{{ $faq->answer}} </td>
                      <td class="action-btns">
                          <a href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                          <form method="post" action="{{ route('admin.faq.destroy', $faq) }}" class="btn btn-primary btn-sm">
                            @csrf
                            @method('DELETE')
                           <button type="submit" >
                            <i class="fas fa-trash"></i>
                          </button>
                          </form>
                      </td>
                  </tr>
                  
                  @empty
                  <tr>
                      <td colspan="5" class="text-center">No faq found</td>
                  </tr>
                  @endforelse
              </tbody>
          </table>

          <!-- Pagination -->
          {{ $faqs->links() }}
      </div>
  </div>
</div>
<!-- /.card -->

@endsection