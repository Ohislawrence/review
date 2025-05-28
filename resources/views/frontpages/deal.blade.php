@extends('layouts.guest')
@section('title',  'Get hot deals around the internet!' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  '' )
@section('imagealt',  'Learn about what we do' )


@section('header')
<style>
    @media (min-width: 992px) { /* lg breakpoint */
    .gigs-sidebar {
        position: sticky;
        top: 100px; /* Adjust this value based on your actual header height */
        height: calc(100vh - 100px); /* Subtract the same value */
        overflow-y: auto;
        padding-top: 20px; /* Add some spacing at the top */
    }
    
    /* Optional: Add scrollbar styling */
    .gigs-sidebar::-webkit-scrollbar {
        width: 5px;
    }
    .gigs-sidebar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .gigs-sidebar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
}
</style>
@endsection


@section('footer')

@endsection



@section('breadcrumbs')

@endsection


@section('content')
<!--====== Start gig-details-section ======-->
<div class="gig-details-section pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2 order-lg-1">
                <div class="gig-details-wrapper">
                    <div class="gig-slider-wrap mb-50">
                        <div class="gigs-big-slider">
                            @forelse ( $deal->images as $image )
                                <div class="single-item">
                                    <a href="{{ $deal->images->isNotEmpty() ? asset('storage/' . $image->image) : asset('assets/images/services/service-1.jpg') }}" class="gallery-single"><img src="{{ $deal->images->isNotEmpty() ? asset('storage/' . $image->image) : asset('assets/images/services/service-1.jpg') }}" alt="{{ $deal->name }}"></a>
                                    <div class="item-content">
                                        <h4>{{ $deal->summary }}</h4>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                        <div class="gigs-thumbs-slider">
                            @foreach ( $deal->images as $image )
                                <div class="single-item">
                                    <img src="{{ $deal->images->isNotEmpty() ? asset('storage/' . $image->image) : asset('assets/images/services/service-1.jpg') }}" alt="{{ $deal->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="discription-wrap">
                        <div class="discription-tabs">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a class="nav-link active" data-toggle="tab" href="#discription">Overview</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="#reviews">Reviews</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="#faqs">Faqs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="discription">
                                <div class="content-box pb-30">
                                    <div class="item-desc pt-20">
                                        <h5 class="title mb-15">About {{ $deal->name }}</h5>
                                        {!! $deal->long_desc !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <div class="gigs-review-area mb-50">
                                    @forelse ($deal->review as $review)
                                    <div class="review_user">
                                        <div><span>user</span> – {{ $review->created_at->format('F j, Y') }}</div>
                                        <p>{{ $review->review }}</p>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faqs">
                                <div class="faq-wrapper pb-30">
                                    <div class="accordion" id="accordionone">
                                        @forelse ($deal->faq as $faq )
                                            <div class="card mb-20">
                                                <a class="collapsed card-header" id="heading{{ $faq->id }}" href="#collapse{{ $faq->id }}" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                                    {{ $faq->question }}<span class="toggle_btn"></span>
                                                </a>
                                                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionone">
                                                    <div class="card-body">
                                                        <p>{{ $faq->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            
                                        @endforelse
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2">
                <div class="gigs-sidebar pb-10">
                    <div class="packages-widgets mb-40">
                        <div class="tab-pane active show fade" id="basic">
                            <div class="packges-content-wrap">
                                <div class="packages-content">
                                    <h3><span class="title">{{ $deal->name }}</span> <span class="price ml-10">${{ $deal->deal_price }}</span> <span class="price text-muted "><s>${{ $deal->price }}</s></span></h3>
                                    <p>{{ $deal->short_desc }}</p>
                                    <span class="additional-info">
                                        <h3><span class="price"></span>
                                        <span class="text-muted price">Pay just ${{ $deal->deal_price }} for this deal!</span></h3>
                                    </span><br/>
                                    <div class="rating-info mb-10">
                                        <div class="">
                                            <div class="">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= floor($deal->rating))
                                                        <i class="fas fa-star" style="color: yellow;"></i>
                                                    @elseif($i == ceil($deal->rating) && $deal->rating - floor($deal->rating) >= 0.5)
                                                        <i class="fas fa-star-half-alt" style="color: yellow;"></i>
                                                    @else
                                                        <i class="far fa-star" style="color: rgb(221, 221, 150);"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <span>({{ number_format($deal->rating, 1) }})</span>
                                    </div>
                                </div>
                                <div class="packages-footer">
                                    <button class="main-btn" onclick=" window.open('{{ $deal->affiliate_url }}')">Get This Deal!</span></button>
                                    <button class="btn-link">Compare Packages</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End gig-details-section ======-->
@endsection