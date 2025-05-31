@extends('layouts.guest')
@section('title',  $deal->name )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset('storage/' . $deal->images->first()->image)  )
@section('description',  Str::limit($deal->summary, 120)  )
@section('imagealt',  $deal->title )


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
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": "{{ $deal->name }}",
      "image": [
        "{{ asset('storage/' . $deal->images->first()->image) }}"
      ],
      "description": "{{ Str::limit(strip_tags($deal->summary), 160) }}",
      "sku": "{{ $deal->id }}",
      "offers": {
        "@type": "Offer",
        "url": "{{ url('/deal/' . $deal->slug) }}",
        "priceCurrency": "USD",
        "price": "{{ $deal->deal_price }}",
        "availability": "https://schema.org/InStock"
      }
    }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdownElements = document.querySelectorAll('.countdown');
        
            countdownElements.forEach(el => {
                const endTime = new Date(el.dataset.end).getTime();
        
                function updateCountdown() {
                    const now = new Date().getTime();
                    const distance = endTime - now;
        
                    if (distance < 0) {
                        el.innerHTML = 'Expired';
                        return;
                    }
        
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
                    el.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                }
        
                updateCountdown(); // initial call
                setInterval(updateCountdown, 1000); // update every second
            });
        });
        </script>
@endsection


@section('footer')

@endsection



@section('breadcrumbs')

@endsection


@section('content')
@php
    $shareUrl = urlencode(route('deal', $deal->slug));
    $dealTitle = urlencode($deal->title);
    $imageUrl = urlencode(asset('storage/' . $deal->images->first()->image));
@endphp
<!--====== Start gig-details-section ======-->
<div class="gig-details-section pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2 order-lg-1">
                <h1 class="mb-15">{{ $deal->name }}</h1>
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
                                    @if ( $deal->deal_ends != null)
                                        <span class="additional-info">
                                            <p>Deal expires in: <span class="countdown" data-end="{{ $deal->deal_ends }}"></span></p>
                                        </span>
                                    @endif
                                    <br/>
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
                                    <button class="main-btn" onclick=" window.open('{{ route('linkredirect', $deal->slug) }}')">Get This Deal!</span></button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-seller-details border mb-40">
                        <p>Share this deals: 
                        <div class="flex space-x-3 mt-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-square fa-2x pr-3"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $dealTitle }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-twitter fa-2x pr-3"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $dealTitle }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin fa-2x pr-3"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ $dealTitle }}%20{{ $shareUrl }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp fa-2x pr-3"></i>
                            </a>
                            <a href="https://pinterest.com/pin/create/button/?url={{ $shareUrl }}&media={{ $imageUrl }}&description={{ $dealTitle }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-pinterest fa-2x"></i>
                            </a>
                        </div>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--====== End gig-details-section ======-->
@endsection