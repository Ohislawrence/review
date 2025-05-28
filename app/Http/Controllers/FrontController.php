<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Deal;
use App\Models\Integration;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $dealAI = Deal::whereHas('categories', function($query) {
            $query->where('slug', 'ai-tools'); 
        })->latest()->limit(8)->get();

        $dealWEB = Deal::whereHas('categories', function($query) {
            $query->where('slug', 'cloud-services'); 
        })->latest()->limit(8)->get();

        $dealMarketing = Deal::whereHas('categories', function($query) {
            $query->where('slug', 'marketing'); 
        })->latest()->limit(8)->get();

        $blogs = Blog::latest()->limit(3)->get();
        return view('frontpages.home', compact('dealAI', 'blogs','dealWEB','dealMarketing'));
    }

    public function deals(Request $request)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', Deal::max('deal_price') ?? 1000);
        $categories = Category::all();
        $initialCount = 7;
        $totalCategories = count($categories);
        $integrations = Integration::all();
        $totalIntegrations = count($integrations);

        $search = $request->input('search');
        
        $dealsQuery = Deal::with(['images', 'categories', 'integrations'])
                    ->when($search, function($query) use ($search) {
                        $query->where(function($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%")
                              ->orWhere('short_desc', 'like', "%{$search}%")
                              ->orWhere('long_desc', 'like', "%{$search}%")
                              ->orWhereHas('categories', function($q) use ($search) {
                                  $q->where('name', 'like', "%{$search}%");
                              })
                              ->orWhereHas('integrations', function($q) use ($search) {
                                  $q->where('name', 'like', "%{$search}%");
                              });
                        });
                    })
                    ->when($request->filled('min_price'), function($query) use ($request) {
                        $query->where('deal_price', '>=', $request->min_price);
                    })
                    ->when($request->filled('max_price'), function($query) use ($request) {
                        $query->where('deal_price', '<=', $request->max_price);
                    })
                    ->when($request->filled('integration'), function($query) use ($request) {
                        $query->whereHas('integrations', function($q) use ($request) {
                            $q->where('slug', $request->integration);
                        });
                    })
                    ->when($request->filled('category'), function($query) use ($request) {
                        $query->whereHas('categories', function($q) use ($request) {
                            $q->where('slug', $request->category);
                        });
                    })
                    ->when($request->filled('rating') && $request->rating !== 'all', function($query) use ($request) {
                        $query->where('rating', '>=', $request->rating);
                    })
                    ->when($request->input('sort'), function($query, $sort) {
                        switch ($sort) {
                            case 'new':
                                return $query->orderBy('created_at', 'desc');
                            case 'old':
                                return $query->orderBy('created_at', 'asc');
                            case 'high-to-low':
                                return $query->orderBy('deal_price', 'desc');
                            case 'low-to-high':
                                return $query->orderBy('deal_price', 'asc');
                            default:
                                return $query->orderBy('created_at', 'desc');
                        }
                    }, function($query) {
                        // Default sorting if none specified
                        return $query->orderBy('created_at', 'desc');
                    });
        $totalDeals = $dealsQuery->count();
        $deals = $dealsQuery->paginate(12);
        return view('frontpages.deals', [
            'deals' => $deals,
            'searchTerm' => $search,
            'categories' => $categories,
            'initialCount' => $initialCount,
            'totalCategories' => $totalCategories,
            'integrations' => $integrations,
            'totalIntegrations' => $totalIntegrations,
            'totalDeals' => $totalDeals,
            'maxPrice' => Deal::max('deal_price') 
        ]);
    }

    public function deal($slug)
    {
        $deal = Deal::with(['images', 'categories']) 
               ->where('slug', $slug)
               ->firstOrFail();
        return view('frontpages.deal',compact('deal'));
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('frontpages.blog', compact('blog'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(12);
        return view('frontpages.blogs', compact('blogs'));
    }
    

    public function privacy()
    {
        return view('frontpages.privacy');
    }

    public function tos()
    {
        return view('frontpages.tos');
    }
}
