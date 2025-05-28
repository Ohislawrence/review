@extends('layouts.guest')
@section('title',  $blog->title )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset('storage/' . $blog->image) )
@section('description',  '' )
@section('imagealt',  $blog->title )


@section('header')

@endsection


@section('footer')

@endsection



@section('breadcrumbs')
<p class="">Blog/ {{ $blog->title }}</p>
@endsection


@section('content')
<!--====== Start Blog Details Section ======-->
<div class="blog-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-wrapper mb-30">
                    
                    <div class="blog-post-item">
                        <div class="post-thumbnail">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Service Single">
                        </div>
                        <div class="entry-content">
                            <div class="post-meta">
                                <ul>
                                    <li><span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d M, Y') }}</span></li>
                                    <li><span><i class="far fa-comment"></i><a href="blogs.html">Comment (5k)</a></span></li>
                                </ul>
                            </div>
                            <h3 class="title">{{ $blog->title }}</h3>
                            {!! $blog->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End Blog Details Section ======-->
@endsection