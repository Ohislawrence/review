@extends('layouts.app')
@section('title',  'Get hot deals around the internet!' )
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
      <a class="btn btn-primary" href="{{ route('admin.deals.create') }}">
          <i class="fas fa-plus fa-sm text-white-50"></i> Add Deals
      </a>
  </div>
  
  <!-- Data Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 fw-bold text-primary">Deals List</h6> <!-- Updated font class -->
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
                      <th>ID</th>
                      <th>Name</th>
                      <th> Deal Price/Price($)</th> 
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($deals as $deal)
                  
                  <tr>
                      <td>{{ $deal->id }}</td>
                      <td>{{ $deal->name }}</td>
                      <td>${{ $deal->deal_price }} <span class="text-muted">/ ${{ $deal->price }}</span></td>
                      <td><span class="badge bg-success">{{ $deal->status }}</span></td>
                      <td class="action-btns">
                          <a href="{{ route('admin.deals.edit', $deal) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                          <form method="post" action="{{ route('admin.deals.destroy', $deal) }}" class="btn btn-primary btn-sm">
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
                      <td colspan="5" class="text-center">No deals found</td>
                  </tr>
                  @endforelse
              </tbody>
          </table>

          <!-- Pagination -->
          {{ $deals->links() }}
      </div>
  </div>
</div>
<!-- /.card -->

@endsection