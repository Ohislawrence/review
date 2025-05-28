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
@include('admin.catagory.include')
@endsection



@section('breadcrumbs')

@endsection


@section('content')
<div class="dashboard-body__content">
    <!-- ===================== Review Section Start ========================== -->
    <div class="card common-card border border-gray-five">
        <div class="card-body">
            <div class="crud-header">
                <h2 class="crud-title">Affiliate Links</h2>
                <button class="crud-btn" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="fas fa-plus"></i>
                    Add Link
                </button>
            </div>



            <div class="table-responsive">
                <table class="table text-body mt--24">
                </table>
            </div>
        </div>
    </div>
</div>
@endsection