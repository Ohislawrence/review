@extends('layouts.guest')
@section('title',  'Get hot deals around the web!' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("assets/images/saas-deals-curation.jpg") )
@section('description',  'Discover the best SaaS deals across the web—handpicked for founders, creators, and teams.'  )
@section('imagealt',  'Curated SaaS Deals. Vetted. Verified. Updated Daily.' )


@section('header')
<style>
    .deals-page {
    /* Namespaced container */
}

.deals-page .gig-item {
    display: block;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    will-change: transform, box-shadow;
    backface-visibility: hidden;
}

.deals-page .gig-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.deals-page .gig-item:active {
    transform: translateY(-2px);
}

.deals-page .show-more-link, 
.deals-page .show-less-link {
    color: #6c757d;
    font-weight: 600;
    text-decoration: underline;
    background: transparent;
}

.deals-page .show-more-link:hover, 
.deals-page .show-less-link:hover,
.deals-page .show-more-link:focus-visible, 
.deals-page .show-less-link:focus-visible {
    color: #0d6efd;
    outline: 2px solid #0d6efd;
    outline-offset: 2px;
}

.deals-page .tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.deals-page .tag {
    display: inline-flex;
    padding: 10px 15px;
    background: #e9ecef;
    border-radius: 4px;
    color: #212529;
    text-decoration: none;
    transition: all 0.3s ease;
    min-width: 44px;
    min-height: 44px;
    align-items: center;
    justify-content: center;
}

.deals-page .tag:hover, 
.deals-page .tag.active,
.deals-page .tag:focus-visible {
    background: #7c1925;
    color: white;
    outline: none;
}

.deals-page .more-integrations {
    display: none;
    width: 100%;
}

.deals-page .integration-show-more,
.deals-page .integration-show-less {
    display: inline-block;
}

/* Price slider styles */
.deals-page #slider-range {
    margin: 15px 0;
    height: 6px;
    background: #e9ecef;
    border-radius: 3px;
    position: relative;
}

.deals-page .ui-slider-handle {
    width: 18px;
    height: 18px;
    background: #3b82f6;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    top: -6px;
    min-width: 44px;
    min-height: 44px;
}

.deals-page .ui-slider-handle:focus {
    transform: scale(1.2);
    outline: none;
}

.deals-page .ui-slider-range {
    background: #3b82f6;
    height: 6px;
}

.deals-page .price-inputs {
    display: flex;
    align-items: center;
    gap: 10px;
}

.deals-page .price-inputs input {
    width: 80px;
    text-align: center;
    border: 1px solid #ddd;
    padding: 8px;
    border-radius: 4px;
}

@media (max-width: 991.98px) {
    .deals-page .order-1 {
        margin-top: 30px;
    }
}

@media (max-width: 767.98px) {
    .deals-page .price-inputs {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .deals-page .price-inputs input {
        width: 100%;
    }
    
    .deals-page .tags-container {
        gap: 6px;
    }
    
    .deals-page .tag {
        padding: 8px 12px;
    }
}
</style>
@endsection


@section('footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Categories functionality
        const categoryShowMore = document.getElementById('showMoreCategories');
        const categoryShowLess = document.getElementById('showLessCategories');
        const moreCategories = document.getElementById('moreCategories');
        
        if (categoryShowMore) {
            categoryShowMore.addEventListener('click', function(e) {
                e.preventDefault();
                moreCategories.style.display = 'block';
                categoryShowMore.style.display = 'none';
                categoryShowLess.style.display = 'block';
            });
        }
        
        if (categoryShowLess) {
            categoryShowLess.addEventListener('click', function(e) {
                e.preventDefault();
                moreCategories.style.display = 'none';
                categoryShowMore.style.display = 'block';
                categoryShowLess.style.display = 'none';
            });
        }
    
        // Integrations functionality
        const integrationShowMore = document.querySelector('.integration-show-more');
        const integrationShowLess = document.querySelector('.integration-show-less');
        const moreIntegrations = document.querySelector('.more-integrations');
        
        if (integrationShowMore) {
            integrationShowMore.addEventListener('click', function(e) {
                e.preventDefault();
                moreIntegrations.style.display = 'inline-block';
                integrationShowMore.style.display = 'none';
                integrationShowLess.style.display = 'inline-block';
            });
        }
        
        if (integrationShowLess) {
            integrationShowLess.addEventListener('click', function(e) {
                e.preventDefault();
                moreIntegrations.style.display = 'none';
                integrationShowMore.style.display = 'inline-block';
                integrationShowLess.style.display = 'none';
            });
        }
    });
    </script>

<script>
    $(function() {
        // Get min/max prices from your deals (you might want to pass these from controller)
        let minPrice = 0;
        let maxPrice = {{ $maxPrice ?? 1000 }}; // Pass this from controller
        
        $("#slider-range").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#min-price").val('$' + ui.values[0]);
                $("#max-price").val('$' + ui.values[1]);
            }
        });
        
        // Set initial values
        $("#min-price").val('$' + $("#slider-range").slider("values", 0));
        $("#max-price").val('$' + $("#slider-range").slider("values", 1));
        
        // Filter button click handler
        $("#price-filter-btn").click(function() {
            const min = $("#slider-range").slider("values", 0);
            const max = $("#slider-range").slider("values", 1);
            
            // You can either:
            // 1. Submit a form with these values
            // 2. Reload the page with query parameters
            // 3. Filter deals via AJAX
            
            // Example for option 2:
            window.location.href = window.location.pathname + 
                                 '?min_price=' + min + 
                                 '&max_price=' + max;
        });
    });
    </script>
    <script>
        document.querySelectorAll('.single_input[name="rating"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('rating-filter-form').submit();
    });
});
    </script>
@endsection



@section('breadcrumbs')

@endsection


@section('content')
<!--====== Start service-gig-area ======-->
<div class="service-gig-area pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-between mb-40">
            <div class="col-lg-3 col-md-6">
                <form action="{{ route('deals') }}" method="GET">
                    <div class="gig-search">
                        <div class="form_group">
                            <input type="search" 
                                   placeholder="Search Keywords" 
                                   class="form_control rounded" 
                                   name="search"
                                   value="{{ request('search') }}">
                            <button type="submit" style="background:none; border:none;">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-6">
                <form id="sort-form" method="GET" action="{{ url()->current() }}">
                    <!-- Preserve existing query parameters -->
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('min_price'))
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                    @endif
                    @if(request('max_price'))
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                    @endif
                    @if(request('integration'))
                        <input type="hidden" name="integration" value="{{ request('integration') }}">
                    @endif
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    
                    <div class="gig-select">
                        <select name="sort" id="type_sort" class="rounded" onchange="document.getElementById('sort-form').submit()">
                            <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest Product</option>
                            <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest Product</option>
                            <option value="high-to-low" {{ request('sort') == 'high-to-low' ? 'selected' : '' }}>High To Low</option>
                            <option value="low-to-high" {{ request('sort') == 'low-to-high' ? 'selected' : '' }}>Low To High</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="gigs-sidebar">
                    <div class="widget widget-categories mb-30">
                        <h4 class="widget-title">Category</h4>
                        <ul class="widget-link">
                            <li><a href="{{ route('deals') }}">All</a></li> 
                            @forelse ($categories->take($initialCount) as $category)
                                <li><a href="{{ route('deals', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                            @empty
                                <li>No Categories</li>
                            @endforelse
                            
                            <div id="moreCategories" style="display: none;">
                                @foreach ($categories->slice($initialCount) as $category)
                                    <li><a href="{{ route('deals', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </div>
                            
                            @if($totalCategories > $initialCount)
                                <li>
                                    <a href="#" id="showMoreCategories" class="show-more-link">
                                        Show More (+{{ $totalCategories - $initialCount }})
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="showLessCategories" style="display: none;" class="show-less-link">
                                        Show Less
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="widget widget-tags mb-30">
                        <h4 class="widget-title">Integrations</h4>
                        
                        <div class="tags-container">
                            <!-- All Integrations link -->
                            <a href="{{ request()->fullUrlWithQuery(['integration' => null]) }}"
                               class="{{ !request('integration') ? 'active' : '' }} tag">
                                All
                            </a>
                            
                            @foreach ($integrations->take($initialCount) as $integration)
                                <a href="{{ request()->fullUrlWithQuery(['integration' => $integration->slug]) }}"
                                   class="{{ request('integration') == $integration->slug ? 'active' : '' }} tag">
                                    {{ $integration->name }}
                                </a>
                            @endforeach
                            
                            <!-- Hidden integrations -->
                            <div class="more-integrations" style="display: none;">
                                @foreach ($integrations->slice($initialCount) as $integration)
                                    <a href="{{ request()->fullUrlWithQuery(['integration' => $integration->slug]) }}"
                                       class="{{ request('integration') == $integration->slug ? 'active' : '' }} tag">
                                        {{ $integration->name }}
                                    </a>
                                @endforeach
                            </div>
                            
                            <!-- Show More/Less toggle -->
                            @if($totalIntegrations > $initialCount)
                                <a href="#" class="integration-show-more">
                                    Show More (+{{ $totalIntegrations - $initialCount }})
                                </a>
                                <a href="#" class="integration-show-less" style="display: none;">
                                    Show Less
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="widget widget-product-filter mb-30">
                        <h4 class="widget-title">Rating</h4>
                        <form method="GET" action="{{ route('deals') }}" id="rating-filter-form">
                            <!-- Hidden fields to preserve other filters -->
                            @foreach(request()->except('rating', 'page') as $key => $value)
                                @if(is_array($value))
                                    @foreach($value as $arrayValue)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $arrayValue }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            
                            <div class="single-filter">
                                <input type="radio" class="single_input" id="radio-all" name="rating" 
                                       value="all" {{ !request('rating') || request('rating') == 'all' ? 'checked' : '' }}>
                                <label class="single_input_label single_input_check" for="radio-all">
                                    <span>Show All</span>
                                </label>
                            </div>
                            
                            @foreach([4, 3, 2, 1] as $rating)
                            <div class="single-filter">
                                <input type="radio" class="single_input" id="radio-{{ $rating }}" name="rating" 
                                       value="{{ $rating }}" {{ request('rating') == $rating ? 'checked' : '' }}>
                                <label class="single_input_label single_input_check" for="radio-{{ $rating }}">
                                    <span>{{ $rating }} Star and higher</span>
                                    
                                </label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="widget widget-price-range mb-30">
                        <h4 class="widget-title">Price</h4>
                        <div id="slider-range"></div>
                        <div class="price-inputs mt-3">
                            <span class="amount">Price: </span>
                            <input type="text" id="min-price" readonly>
                            <span> - </span>
                            <input type="text" id="max-price" readonly>
                        </div>
                        <button id="price-filter-btn" class="main-btn mt-15">Filter</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <h1 class="">Deals</h1>
                <h6 class="mb-20">{{ $totalDeals }} deals found</h6>
                <div class="row">
                    @forelse ( $deals as $deal )
                    <div class="col-xl-4 col-md-6">
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
                <nav class="pagination-area mt-20" aria-label="Page navigation example">
                    {{ $deals->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
<!--====== End service-gig-area ======-->
@endsection