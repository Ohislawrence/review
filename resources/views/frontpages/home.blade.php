@extends('layouts.guest')
@section('title',  'Top SaaS Lifetime Deals, Discounts & Promos' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("assets/images/saas-deals-curation.jpg") )
@section('description',  'Stop overpaying for tools. Discover the best SaaS deals across the web—handpicked for founders, creators, and teams.' )
@section('imagealt',  'Curated SaaS Deals. Vetted. Verified. Updated Daily.' )


@section('header')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "DealsIntel",
      "url": "https://dealsintel.com",
      "description": "Discover top SaaS deals, lifetime offers & exclusive discounts. Built for creators, marketers & founders.",
      "publisher": {
        "@type": "Organization",
        "name": "DealsIntel",
        "logo": {
          "@type": "ImageObject",
          "url": "https://dealsintel.com/assets/images/logo-1.png.png"
        }
      },
      "sameAs": [
        "https://twitter.com/dealsintel",
        "https://facebook.com/dealsintel"
      ]
    }
    </script>
@endsection




@section('footer')

@endsection

@section('breadcrumbs')

@endsection


@section('content')
<!--====== Start Banner ======-->
<section class="banner-area-v1 bg_cover bg-img" data-bg-img="assets/images/main-bg.jpg">
    <div class="container">
        <div class="hero-content-slider">
            <div class="single-slider">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <h1 data-animation="fadeInDown" data-delay=".1s">
                                Don’t Miss Another Great SaaS Deal
                            </h1>
                            <p data-animation="fadeInDown" data-delay=".2s">We track and curate the top deals before they disappear—so you save more and grow faster.</p>
                            <div class="hero-search-form mt-40" data-animation="fadeInDown" data-delay=".2s">
                                <div class="form-wrapper">
                                    <form action="{{ route('deals') }}" method="GET">
                                        <div class="form-inline">
                                            <input type="text" name="search"
                                            value="{{ request('search') }}" class="form_control" placeholder="e. g. Shopify store theme">
                                            <button class="main-btn" type="submit">Search<i class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="banner-tags mt-15">
                                    <span class="color-dark">Search 100+ SaaS deals e.g. </span>
                                    <a href="{{ route('deals',['category' => 'ai-tools']) }}">AI tools,</a>
                                    <a href="{{ route('deals',['category' => 'crm']) }}">CRM,</a>
                                    <a href="{{ route('deals',['category' => 'social-media']) }}">Social Media</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-img">
                            <img src="assets/images/hero-one.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <h1 data-animation="fadeInDown" data-delay=".1s">
                                Curated SaaS Deals. Vetted. Verified. Updated Daily.
                            </h1>
                            <p data-animation="fadeInDown" data-delay=".2s">Stop overpaying for tools. Discover the best SaaS deals across the web—handpicked for founders, creators, and teams.</p>
                            <div class="hero-search-form mt-40" data-animation="fadeInDown" data-delay=".2s">
                                <div class="form-wrapper">
                                    <form action="{{ route('deals') }}" method="GET">
                                        <div class="form-inline">
                                            <input type="text" name="search"
                                            value="{{ request('search') }}" class="form_control" placeholder="e. g. Shopify store theme">
                                            <button class="main-btn" type="submit">Search<i class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="banner-tags mt-15">
                                    <span class="color-dark">Search 100+ SaaS deals e.g. </span>
                                    <a href="{{ route('deals',['category' => 'ai-tools']) }}">AI tools,</a>
                                    <a href="{{ route('deals',['category' => 'crm']) }}">CRM,</a>
                                    <a href="{{ route('deals',['category' => 'social-media']) }}">Social Media</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-img">
                            <img src="assets/images/hero-one.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Banner ======-->


<!--====== Start Service ======-->
<section class="popular-services-area pb-120 mt-40">
    <div class="container">
        <div class="row justify-content-center mb-40">
            <div class="col-xl-5 col-lg-6">
                <div class="section-title text-center">
                    <h2>Top Deals</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="popular-service-nav mb-40">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#ai" class="nav-link active" data-toggle="tab">
                                AI tools
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#webhosting" class="nav-link" data-toggle="tab">
                                Web Hosting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#marketing" class="nav-link" data-toggle="tab">
                                Marketing
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div id="ai" class="tab-pane fade show active">
                <div class="row">
                    @forelse ( $dealAI as $deal )
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <a href="{{ route('deal', $deal->slug) }}" class="gig-card-link">
                                <div class="gig-item mb-30">
                                    <div class="gig-img">
                                        <img src="{{ $deal->images->isNotEmpty() ? asset('storage/' . $deal->images->first()->image) : asset('assets/images/services/service-1.jpg') }}" alt="{{ $deal->name }}">
                                    </div>
                                    <div class="gig-info">
                                        <div class="gig-top">
                                            <div class="user-title-thumb">
                                                <h5 class="title">{{ $deal->name }}</h5>
                                            </div>
                                        </div>
                                        <div class="service-content">
                                            <h4 class="title">{{ $deal->short_desc }}</h4>
                                            <div class="rating-info">
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
                                        <div class="service-bottom">
                                            <span class="text">Starting at</span>
                                            <span class="nubmer">${{ $deal->deal_price }}</span> <span class="nubmer text-muted"><s>${{ $deal->price }}</s></span> 
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        
                    @endforelse
                    
                </div>
            </div>
            <div id="webhosting" class="tab-pane fade">
                <div class="row">
                    @forelse ( $dealWEB as $deal )
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('deal', $deal->slug) }}" class="gig-card-link">
                            <div class="gig-item mb-30">
                                <div class="gig-img">
                                    <img src="{{ $deal->images->isNotEmpty() ? asset('storage/' . $deal->images->first()->image) : asset('assets/images/services/service-1.jpg') }}" alt="{{ $deal->name }}">
                                </div>
                                <div class="gig-info">
                                    <div class="gig-top">
                                        <div class="user-title-thumb">
                                            <h5 class="title">{{ $deal->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h4 class="title">{{ $deal->short_desc }}</h4>
                                        <div class="rating-info">
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
                                    <div class="service-bottom">
                                        <span class="text">Starting at</span>
                                        <span class="nubmer">${{ $deal->deal_price }}</span> <span class="nubmer text-muted"><s>${{ $deal->price }}</s></span> 
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse
                </div>
            </div>
            <div id="marketing" class="tab-pane fade">
                <div class="row">
                    @forelse ( $dealMarketing as $deal )
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('deal', $deal->slug) }}" class="gig-card-link">
                            <div class="gig-item mb-30">
                                <div class="gig-img">
                                    <img src="{{ $deal->images->isNotEmpty() ? asset('storage/' . $deal->images->first()->image) : asset('assets/images/services/service-1.jpg') }}" alt="{{ $deal->name }}">
                                </div>
                                <div class="gig-info">
                                    <div class="gig-top">
                                        <div class="user-title-thumb">
                                            <h5 class="title">{{ $deal->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h4 class="title">{{ $deal->short_desc }}</h4>
                                        <div class="rating-info">
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
                                    <div class="service-bottom">
                                        <span class="text">Starting at</span>
                                        <span class="nubmer">${{ $deal->deal_price }}</span> <span class="nubmer text-muted"><s>${{ $deal->price }}</s></span> 
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse
                    
                </div>
            </div>
        </div>
        <div class="all-btn text-center mt-30">
            <a href="{{ route('deals') }}" class="main-btn">
                More Deals
            </a>
        </div>
    </div>
</section>
<!--====== End Service ======-->

<!--====== Start Newsletter ======-->
<section class="newsletter-area-two mb-30">
    <div class="container">
        <div class="newsletter-two-inner bg-img" data-bg-img="{{ asset('assets/images/newsletter-bg-1.png') }}">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-two-content pt-70 pb-70">
                        <div class="section-title mb-40">
                            <h3>Stay ahead. We send no-fluff email with the top lifetime offers, discounts, and beta invites.</h3>
                        </div>

                        <form action="" method="POST" class="subscription-form">
                            <input type="email" placeholder="Enter Your Email Address" name="email_id">
                            <button type="submit" class="main-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter-shapes">
        <img class="shape-one" src="assets/images/shapes/newsletter-left.png" alt="shape">
        <img class="shape-two" src="assets/images/shapes/newsletter-right.png" alt="shape">
    </div>
</section>
<!--====== End Newsletter ======-->


<!--====== Start About ======-->
<section class="about-area-v1 pt-120 pb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-box mb-40">
                    <div class="about-img about-img-one">
                        <img src="assets/images/about-one.png" alt="Image">
                        <div class="shape-box">
                            <img src="assets/images/shape-1.png" class="shape" alt="Image">
                        </div>
                    </div>
                    <div class="about-img about-img-two">
                        <img src="assets/images/about-two.png" alt="Image">
                        <div class="play-content text-center">
                            <a href="" class="video-popup"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-box mb-40">
                    <h2>SaaS Deals That Actually Save You Money.</h2>
                    <ul class="list-box">
                        <li class="list-item">
                            <h6>Curated SaaS Deal Listings</h6>
                            <p>We manually handpick the best SaaS deals from across the web—AppSumo, vendor websites, private betas, and beyond. Each deal is verified, tagged by category, and includes expiration dates and offer types (LTD, discount, free tier, etc.).</p>
                        </li>
                        <li class="list-item">
                            <h6>SaaS Deal Promotion for Founders</h6>
                            <p>Got a new product or launch offer? We help you get visibility and drive qualified leads. Whether it's a lifetime deal, discount, or beta access—we connect you with the right audience.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End About ======-->


<!--====== Start Blog ======-->
<section class="blog-area-v1 pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-40">
                    <h2>Our Insights & Articles</h2>
                </div>
            </div>
        </div>
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
        <div class="all-btn text-center mt-30">
            <a href="{{ route('blogs') }}" class="main-btn">All Posts</a>
        </div>
    </div>
</section>
<!--====== End Blog ======-->

@endsection