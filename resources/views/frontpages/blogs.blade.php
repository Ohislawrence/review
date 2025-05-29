@extends('layouts.guest')
@section('title',  'Blogs' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("assets/images/saas-deals-curation.jpg") )
@section('description',  '' )
@section('imagealt',  'Curated SaaS Deals. Vetted. Verified. Updated Daily.' )


@section('header')

@endsection


@section('footer')

@endsection



@section('breadcrumbs')

@endsection


@section('content')
<!--====== Start Blog Section ======-->
<div class="blog-area-v1 pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-post-wrapper">
                    <h3 class="mb-20">Blogs</h3>
                    <div class="row">
                        @forelse ( $blogs as $blog )
                            <div class="col-md-4">
                                <div class="blog-post-item mb-40">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('blog', $blog->slug) }}"><img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"></a>
                                        <a href="{{ route('blog', $blog->slug) }}" class="date">{{ $blog->created_at->format('d M, Y') }}</a>
                                    </div>
                                    <div class="entry-content">
                                        <div class="post-meta">
                                            <ul>
                                                <li><span><i class="far fa-folder-open"></i><a href="{{ route('blog', $blog->slug) }}">{{ $blog->category->name }}</a></span></li>
                                            </ul>
                                        </div>
                                        <h3 class="title"><a href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                        <a href="{{ route('blog', $blog->slug) }}" class="btn-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                        
                        
                    </div>
                    <nav class="pagination-area mt-20 mb-40" aria-label="Page navigation example">
                        {{ $blogs->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End Blog Section ======-->
@endsection