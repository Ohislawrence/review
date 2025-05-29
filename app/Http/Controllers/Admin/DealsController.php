<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Deal;
use App\Models\Image;
use App\Models\Integration;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::latest()->paginate(10);
        return view('admin.deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $integrations = Integration::all();
        $plans = Plan::all();
        return view('admin.deals.create', compact('categories', 'integrations','plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255|unique:deals,name',
            'short_desc' =>'nullable',
            'long_desc' =>'nullable',
            'summary' =>'nullable',
            'price' =>'nullable',
            'deal_price' =>'nullable',
            'status' =>'nullable',
            'video' =>'nullable',
            'affiliate_url' =>'nullable',
            'code' =>'nullable',
            'api_secret' =>'nullable',
            'api_user' =>'nullable',
            'deal_ends' =>'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'integrations' => 'required|array',
            'integrations.*' => 'exists:integrations,id',
            'plan_id' =>'nullable',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $deal = Deal::create($validated);

        // Attach categories
        $deal->categories()->attach($request->categories);

        $deal->integrations()->attach($request->integrations);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('deals/images', 'public'); // 'public' disk, path stored in 'deals/images/...'
                $deal->images()->create([
                    'image' => $path // Store as-is, or just use $path
                ]);
            }
        }

        return back()->with('success', 'Deals Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        $categories = Category::all();
        $integrations = Integration::all();
        $plans = Plan::all();
        return view('admin.deals.edit', compact('deal','categories', 'integrations','plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:deals,name,' . $deal->id,
            'short_desc' => 'nullable',
            'long_desc' => 'nullable',
            'summary' => 'nullable',
            'price' => 'nullable',
            'deal_price' => 'nullable',
            'status' => 'nullable',
            'video' => 'nullable',
            'affiliate_url' => 'nullable',
            'code' => 'nullable',
            'api_secret' => 'nullable',
            'api_user' => 'nullable',
            'deal_ends' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'integrations' => 'required|array',
            'integrations.*' => 'exists:integrations,id',
            'plan_id' => 'nullable',
            // Add field to track deleted images if needed
            'deleted_images' => 'nullable|array',
        ]);
    
        // Update slug if name changed
        if ($deal->name !== $request->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }
    
        // Update deal attributes
        $deal->update($validated);
    
        // Sync categories
        $deal->categories()->sync($request->categories);
    
        // Sync integrations
        $deal->integrations()->sync($request->integrations);
    
        // Handle deleted images
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $image = $deal->images()->find($imageId);
                if ($image) {
                    // Delete from storage
                    Storage::disk('public')->delete($image->image);
                    // Delete from database
                    $image->delete();
                }
            }
        }
    
        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('deals/images', 'public');
                $deal->images()->create([
                    'image' => $path
                ]);
            }
        }
    
        return back()->with('success', 'Deal updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        try {
            $deal->delete();
            return back()->with('success', 'Deals deleted successfully.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting deal']);
        }
    }
}
