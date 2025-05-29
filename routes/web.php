<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DealsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Deal;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('', [FrontController::class, 'index'])->name('home');
Route::get('deal/{slug}', [FrontController::class, 'deal'])->name('deal');
Route::get('deals', [FrontController::class, 'deals'])->name('deals');
Route::get('blogs', [FrontController::class, 'blogs'])->name('blogs');
Route::get('blog/{slug}', [FrontController::class, 'blog'])->name('blog');
Route::get('privacy', [FrontController::class, 'privacy'])->name('privacy');
Route::get('tos', [FrontController::class, 'tos'])->name('tos');

/**
Route::get('role/admin', function () {
    $user = auth()->user();
    $user->assignRole('admin');
    return 'You are admin';
});
 */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin route
    Route::group([
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function () {

        Route::resource('deals', DealsController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('blogs', BlogController::class);
    });


    //member route
    Route::group([
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix' => 'member',
        'middleware' => 'role:member',
        'as' => 'member.',
    ], function () {

        //
       
    });


    //partner route
    Route::group([
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix' => 'partner',
        'middleware' => 'role:partner',
        'as' => 'partner.',
    ], function () {

        //
       
    });


    
});

//sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0))
        ->add(Url::create('/blogs/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8))
        ->add(Url::create('/deals/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8))
        ->add(Url::create('/tos/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8))
        ->add(Url::create('/privacy/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));

    // Add all blog posts dynamically
    $posts = Blog::latest()->get();
    $deals = Deal::latest()->get();

    foreach ($posts as $post) {
        $sitemap->add(
            Url::create("/blog/{$post->slug}/")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7)
        );
    }
    foreach ($deals as $deal) {
        $sitemap->add(
            Url::create("/deal/{$deal->slug}/")
                ->setLastModificationDate($deal->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7)
        );
    }
    return $sitemap->toResponse(request());
})->name('sitemap');

require __DIR__.'/auth.php';
