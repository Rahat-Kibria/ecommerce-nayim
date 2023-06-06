<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\Ordercontroller;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\WishlistController;
use App\Http\Controllers\UserBackend\IndexController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Backend\AdminContactController;
use App\Http\Controllers\Backend\OderTrackingController;
use App\Http\Controllers\Backend\ProductStockController;
use App\Http\Controllers\Setting\AdminSettingController;
use App\Http\Controllers\Backend\ProductDetailsController;
use App\Http\Controllers\OthersPageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('frontend.index');
});

// User Create
Route::get('/user/create', [UserController::class, 'create_auth_user'])->name('create.user');
Route::post('/user/create', [UserController::class, 'store_auth_user'])->name('store.user');

// user Login
Route::get('user/login', [UserController::class, 'user_login'])->name('user.login');
Route::post('user/login', [UserController::class, 'login_attempt'])->name('user.login.attempt');

// Authenticated User Check
Route::group(['middleware' => 'AuthUser'], function () {

    // logout
    Route::get('/user/logout', [UserController::class, 'Logout'])->name('user.logout');

    // User dashboard
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    // User Profile all Route
    Route::get('/password/change', [IndexController::class, 'UserPassChange'])->name('userpassword.change');
    Route::post('/password/update', [IndexController::class, 'UserPassUpdate'])->name('userpassword.update');

    // Edit profile for user all route
    Route::get('/edit/profile/update', [IndexController::class, 'UserUpdateProfile'])->name('updateuser.profile');
    Route::post('/edit/profile-update', [IndexController::class, 'UserChangeProfile'])->name('changeuser.profile');

    // Wishlist all Route
    Route::get('/add/wishlist/{id}', [WishlistController::class, 'WishlistAdd'])->name('wishlist.add');
});

// Add to Cart all route
Route::get('/add/cart/{id}', [CartController::class, 'APaymentddCart'])->name('add.cart');
Route::get('/cart/show', [CartController::class, 'ShowCart'])->name('cart.show');
Route::get('/cart/remove/{id}', [CartController::class, 'CartRemove'])->name('cart.remove');
Route::post('/cart/update/item', [CartController::class, 'CartItemUpdate'])->name('update.cartitem');
Route::get('/cart/product/view/{id}', [CartController::class, 'ModalCartView'])->name('modalcart.productview');
Route::post('/cart/modal/insert', [CartController::class, 'ModalCartInsert'])->name('insert.into.cart');
Route::get('/user/checkout', [CartController::class, 'CheckOut'])->name('user.checkout');

// Payment page Step all Route
Route::get('/payment/step', [CartController::class, 'PaymentPage'])->name('payment.step');

// Payment route
Route::post('/user/payment/process', [PaymentController::class, 'Payment'])->name('payment.process');
// payment stripe charge
Route::post('/user/stripe/charge', [PaymentController::class, 'StripeCharge'])->name('stripe.charge');

// payment oncash charge
Route::post('/user/oncash/charge', [PaymentController::class, 'OnCashCharge'])->name('on.cash');

// details wishlist
Route::get('/user/wishlist', [CartController::class, 'UserWishlist'])->name('user.wishlist');
Route::get('/wishlist/delete/{id}', [CartController::class, 'UserWishlistDelete'])->name('wishtlist.delete');

// apply cupon route
Route::post('/user/apply/cupon', [CartController::class, 'UserCupon'])->name('apply.cupon');

// Cupon remove all route
Route::get('/cupon/remove', [CartController::class, 'CuponRemove'])->name('cupon.remove');
// Route::get('/check/product',[CartController::class,'ProductCheck'])->name('product.check');

// product details route
Route::get('/product/details/{id}/{product_name}', [ProductDetailsController::class, 'ProductDetails'])->name('product.details');
Route::post('/cart/product/add/{id}', [ProductDetailsController::class, 'ProducAdd'])->name('product.addcart');

// all subcategory product route
Route::get('/product/subcategory/{id}', [ProductDetailsController::class, 'SubcategoryProduct'])->name('subcategory.product');

// all category product route
Route::get('/product/category/{id?}', [ProductDetailsController::class, 'CategoryProduct'])->name('category.product');

// Order Tracking Route
Route::post('/order/tracking', [OderTrackingController::class, 'OrderTracking'])->name('order.tracking');

// Blog all Route
Route::get('/blog/post', [BlogController::class, 'Blog'])->name('blog.post');
Route::get('/blog/single/post/{id}', [BlogController::class, 'SinglePost'])->name('single.post');

// blog-post multi-language
Route::get('/language/english', [BlogController::class, 'English'])->name('lang.english');
Route::get('/language/bangla', [BlogController::class, 'Bangla'])->name('lang.bangla');

// user return order route
Route::get('/user/return/order', [PaymentController::class, 'ReturnOrderUser'])->name('return.order');
Route::get('/user/request/return/{id}', [PaymentController::class, 'RequestReturn'])->name('request.return');

// Contact all Route
Route::get('/contact-page', [ContactController::class, 'Contact'])->name('contact.page');
Route::post('/contact/store', [ContactController::class, 'ContactStore'])->name('contact.store');

// Googgle login route
Route::get('/auth/redirect/{provider}', [GoogleSocialiteController::class, 'redirect']);
Route::get('/callback/{provider}', [GoogleSocialiteController::class, 'callback']);

// Product Search route
Route::post('/product/search', [ContactController::class, 'Search'])->name('product.search');

// Others Page Controller
Route::get('/about-page', [OthersPageController::class, 'About'])->name('about.page');

// Admin group all route
Route::prefix('admin')->group(function () {

    // Admin login
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'verify'])->name('admin.login.verify');

    Route::group(['middleware' => ['auth', 'Admin']], function () {
        //Admin dashboard
        Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');

        // Logout Route
        Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');

        // Reset password for admin route
        Route::get('/password/change', [AdminSettingController::class, 'ChangePassword'])->name('admin.password.change');
        Route::post('/password/update/', [AdminSettingController::class, 'ChangePassStore'])->name('admin.password.update');

        // Category all route
        Route::get('/category/view', [CategoryController::class, 'CategoryView'])->name('category.view');
        Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

        // Sub Category all route
        Route::get('/subcategory/view', [SubCategoryController::class, 'SubCategoryView'])->name('subcategory.view');
        Route::post('/subcategory/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

        //    Brand all route
        Route::get('/brand/view', [BrandController::class, 'BrandView'])->name('brand.view');
        Route::post('/brand/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/brand/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/brand/delete/{id}', [BrandController::class, 'BrandUDelete'])->name('brand.delete');

        // Cupon all route
        Route::get('/cupon/view', [CuponController::class, 'CuponView'])->name('cupon.view');
        Route::post('/cupon/store', [CuponController::class, 'CuponStore'])->name('cupon.store');
        Route::get('/cupon/edit/{id}', [CuponController::class, 'CuponEdit'])->name('cupon.edit');
        Route::post('/cupon/update/{id}', [CuponController::class, 'CuponUpdate'])->name('cupon.update');
        Route::get('/cupon/delete/{id}', [CuponController::class, 'CuponDelete'])->name('cupon.delete');

        // Newsletter all route
        Route::get('/newsletter/view', [NewsletterController::class, 'NewsLetterView'])->name('newsletter.view');
        Route::post('/newsletter/store', [NewsletterController::class, 'NewsletterStore'])->name('newsletter.store');
        Route::get('/newsletter/delete/{id}', [NewsletterController::class, 'NewsletterDelete'])->name('newsletter.delete');

        // Product all route
        Route::get('/product/view', [ProductController::class, 'ProductView'])->name('product.view');
        Route::get('/product/add', [ProductController::class, 'ProductAdd'])->name('product.add');
        Route::post('/product/store', [ProductController::class, 'ProductStore'])->name('product.store');
        Route::get('/product/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        Route::get('/product/details/{id}', [ProductController::class, 'ProductDetails'])->name('product.details');
        Route::get('/product/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
        Route::post('/product/update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');

        // auto load subcategory route
        Route::get('/get/subcategory/{category_id}', [ProductController::class, 'GetSubCategory']);

        // Product active inactive all Route
        Route::get('/product/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/product/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

        // post category all Route
        Route::get('/post/category', [PostController::class, 'PostCategoryView'])->name('postcategory.view');
        Route::post('/post/category/store', [PostController::class, 'PostCategoryStore'])->name('postcategory.store');
        Route::get('/post/category/edit/{id}', [PostController::class, 'PostCategoryEdit'])->name('postcategory.edit');
        Route::post('/post/category/update/{id}', [PostController::class, 'PostCategoryUpdate'])->name('postcategory.update');
        Route::get('/post/category/delete/{id}', [PostController::class, 'PostCategoryDelete'])->name('postcategory.delete');

        // Blog all route
        Route::get('/blog/view', [PostController::class, 'BlogView'])->name('blog.view');
        Route::get('/blog/add', [PostController::class, 'BlogAdd'])->name('blog.add');
        Route::post('/blog/store', [PostController::class, 'BlogStore'])->name('blog.store');
        Route::get('/blog/edit/{id}', [PostController::class, 'BlogEdit'])->name('blog.edit');
        Route::post('/blog/update/{id}', [PostController::class, 'BlogUpdate'])->name('blog.update');
        Route::get('/blog/delete/{id}', [PostController::class, 'BlogDelete'])->name('blog.delete');


        // Admin Order all Route
        Route::get('/pending/orders', [Ordercontroller::class, 'NewOrder'])->name('admin.order');
        Route::get('/order/view/{id}', [Ordercontroller::class, 'ViewOrder'])->name('order.view');

        Route::get('/payment/accept/{id}', [Ordercontroller::class, 'PaymentAccept'])->name('payment.accept');
        Route::get('/payment/cancel/{id}', [Ordercontroller::class, 'PaymentCancel'])->name('payment.cancel');

        Route::get('/accept/payment', [Ordercontroller::class, 'AcceptPayment'])->name('accept.payment');
        Route::get('/cancel/payment', [Ordercontroller::class, 'CancelPayment'])->name('cancel.payment');
        Route::get('/process/payment', [Ordercontroller::class, 'ProcessPayment'])->name('process.payment');
        Route::get('/delivared/payment', [Ordercontroller::class, 'DelivaredPayment'])->name('delivared.payment');

        Route::get('/process/delivary/{id}', [Ordercontroller::class, 'ProcessDelivary'])->name('process.delivary');
        Route::get('/delivary/done/{id}', [Ordercontroller::class, 'DelivaryDone'])->name('delivary.done');

        // Report all route
        Route::get('/today/order', [ReportController::class, 'TodayOrder'])->name('today.order');
        Route::get('/today/delivary', [ReportController::class, 'TodayDelivary'])->name('today.delivary');
        Route::get('/this/month', [ReportController::class, 'ThisMonth'])->name('this.month');
        Route::get('/search/report', [ReportController::class, 'SearchReport'])->name('search.report');

        // search report route
        Route::post('search/year', [ReportController::class, 'SearchYear'])->name('serachby.year');
        Route::post('search/month', [ReportController::class, 'SearchMonth'])->name('serachby.month');
        Route::post('search/date', [ReportController::class, 'SearchDate'])->name('serachby.date');

        // admin return all route
        Route::get('/return/request', [ReturnController::class, 'AdminReturnRequest'])->name('admin.return.rquest');
        Route::get('/return/request/approve/{id}', [ReturnController::class, 'AdminReturnRequestApprove'])->name('approve.return');
        Route::get('/return/all-request', [ReturnController::class, 'AdminReturnAllRequest'])->name('admin.return.allrequest');

        // product stock controller
        Route::get('/product/stock', [ProductStockController::class, 'ProductStock'])->name('product.stock');

        // admin contact route
        Route::get('/contact-admin', [AdminContactController::class, 'AdminMessage'])->name('all.message');

        //   site setting
        Route::get('sitesetiing', [AdminSettingController::class, 'getSetting'])->name('setting');
        Route::post('sitesetiing/update/{id?}', [AdminSettingController::class, 'updateSetting'])->name('update.setting');

        Route::get('admin/profile/', [AdminSettingController::class, 'adminprofile'])->name('adminprofile');
        Route::post('admin/update/{id}', [AdminSettingController::class, 'updateadminprofile'])->name('update.adminprofile');
    });
});
