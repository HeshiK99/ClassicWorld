<?php

use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* BACKEND ROUTES */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('dashboard', function () {
//     return view('Backend.dashboard');
// })->name('dashboard');

Route::group(
    ['middleware' => 'auth'],
    function ($router) {

        Route::get('brands',[App\Http\Controllers\BrandsController::class,'index'])->name('brands');
        Route::post('brands-store',[App\Http\Controllers\BrandsController::class,'store'])->name('brands.store');
        Route::post('brands-update',[App\Http\Controllers\BrandsController::class,'update'])->name('brands.update');
        Route::post('brand-delete',[App\Http\Controllers\BrandsController::class,'delete'])->name('brands.delete');
        Route::get('category',[App\Http\Controllers\CategoriesController::class,'index'])->name('categories');
        Route::post('categories-store',[App\Http\Controllers\CategoriesController::class,'store'])->name('categories.store');
        Route::post('categories-update',[App\Http\Controllers\CategoriesController::class,'update'])->name('categories.update');
        Route::post('category-delete',[App\Http\Controllers\CategoriesController::class,'delete'])->name('categories.delete');
        Route::get('product',[App\Http\Controllers\ProductController::class,'index'])->name('product');
        Route::post('product-store',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
        Route::post('product-update',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
        Route::post('product-delete',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');
        Route::get('stock',[App\Http\Controllers\StockController::class,'index'])->name('stock');
        Route::post('stock-store',[App\Http\Controllers\StockController::class,'store'])->name('stock.store');
        Route::get('orders',[App\Http\Controllers\OrderController::class,'index'])->name('orders');
        Route::post('/get-invoice-details',[App\Http\Controllers\OrderController::class,'getOrderDetails']);
        Route::get('/sales-reports',[App\Http\Controllers\SalesReportController::class,'index'])->name('sales-reports');
        Route::get('profile',[App\Http\Controllers\ProfileController::class,'index'])->name('profile');
        Route::post('/update-profile',[App\Http\Controllers\ProfileController::class,'update']);

        Route::get('/dashboard-dailysales',[App\Http\Controllers\Dashboardcontroller::class,'dailySales']);
        Route::get('/dashboard-monthlysales',[App\Http\Controllers\Dashboardcontroller::class,'monthlySales']);
        
        Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index'])->name('frontend.cart');
        Route::post('/add-to-cart',[App\Http\Controllers\Frontend\CartController::class,'addToCart']);
        Route::post('/remove-from-cart',[App\Http\Controllers\Frontend\CartController::class,'removeCart']);
        Route::get('/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index'])->name('frontend.checkout');
        Route::get('/order-checkout/{order_note}',[App\Http\Controllers\Frontend\CheckoutController::class,'orderCheckout']);
        Route::post('/post-review',[App\Http\Controllers\Frontend\ProductController::class,'postReview']);

    }
);

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', [App\Http\Controllers\StripePaymentController::class,'stripe']);
    Route::post('stripe', [App\Http\Controllers\StripePaymentController::class,'stripePost'])->name('stripe.post');
});

/* FRONTEND ROUTES */
Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.home');
Route::get('/shop',[App\Http\Controllers\Frontend\ShopController::class,'index'])->name('frontend.shop');
Route::get('/shop/filter-price/{min_value}/{max_value}',[App\Http\Controllers\Frontend\ShopController::class,'filterByPrice']);
Route::get('/shop/filter/{criteria}',[App\Http\Controllers\Frontend\ShopController::class,'filterByCriteria']);
Route::get('/shop/filter-category/{category_id}',[App\Http\Controllers\Frontend\ShopController::class,'filterByCategory']);
Route::get('/product-detail/{product_id}',[App\Http\Controllers\Frontend\ProductController::class,'index'])->name('frontend.product');


Route::post('/update-route-session',[App\Http\Controllers\Frontend\SessionController::class,'routeUpdate']);

Route::post('/search-products',[App\Http\Controllers\Frontend\ShopController::class,'searchProducts'])->name('frontend.search-products');

Route::get('/about-us', function () {
    return view('Frontend.about-us');
})->name('frontend.about-us');


Route::get('/contact-us',[App\Http\Controllers\Frontend\ContactController::class,'index'])->name('frontend.contact-us');
Route::post('/contact-email',[App\Http\Controllers\Frontend\ContactController::class,'sendEmail']);
