<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;


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

Route::get('/', function () {
    return view('welcome');
}); 

/* =============================== START FRONTEND SECTION =============================== */
Route::get('/',[IndexController::class, 'index'])->name('index');
/* =============================== START PRODUCTS DETAILS SECTION =============================== */
Route::get('/product-details/{id}/{slug}',[IndexController::class, 'productDetails'])->name('product.details');
/* =============================== START SUBCATEGORY SECTION =============================== */
Route::get('/subcategory-product/{id}/{slug}',[IndexController::class, 'SubcatWiseProduct'])->name('product-subcategory');
/* =============================== START CHIELD CATEGORY SECTION =============================== */
Route::get('/subsubcategory-product/{id}/{slug}',[IndexController::class, 'SubSubcatWiseProduct'])->name('product-subsubcategory');
Route::get('/subcategory-product/{id}/{slug}',[IndexController::class, 'SubcatWiseProduct'])->name('product-subcategory');
/* =============================== START PRODUCT TAGS SECTION =============================== */
Route::get('/product-tag/{tag}',[IndexController::class, 'TagWiseProduct'])->name('product-tag');
/* =============================== START SINGLE POST SECTION =============================== */
Route::get('/single-post/{id}/{slug}',[IndexController::class, 'SinglePost'])->name('single-post');
/* =============================== START REVOEW STORE SECTION =============================== */
Route::post('/review-store',[ReviewController::class, 'ReviewStore'])->name('review.store');

/* ========================= START PRODUCT VIEW MODAL WITH AJAX ========================= */
Route::get('/product/view/modal/{id}',[IndexController::class,'ProductViewAjax']);
/* ======================= START ADD TO CART STORE DATA WITH AJAX ======================= */
Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart']);
/* ========================= START  MINI CART  WITH AJAX ================================ */
Route::get('/product/mini/cart',[CartController::class,'AddMiniCart']);
/* ===============================  START MINICART REMOVE =============================== */
Route::get('/minicart/product-remove/{rowId}',[CartController::class,'RemoveMiniCart']);
/* =============================== START ADD TO WISHLIST WITH AJAX =============================== */
Route::post('/add-to-wishlist/{product_id}',[CartController::class, 'AddToWishlist']);


/* =========================== Start Product Search Routes =========================== */
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');
/* =========================== Start Advance Search Routes  =========================== */
Route::post('search-product', [IndexController::class, 'SearchProduct']);



/* =============================== START WISHLIST PAGE =============================== */
Route::get('/wishlist',[WishlistController::class, 'ViewWishlist'])->name('wishlist');
/* ========================= START WISHLIST ALL PRODUCT SHOW ========================= */
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
/* ========================= START WISHLIST PRODUCT REMOVE ========================= */
Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
/* =============================== START MY CART All ROUTE =============================== */
Route::get('/mycart', [CartPageController::class, 'Mycart'])->name('mycart');
Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);


/* =============================== END MY CART All ROUTE =============================== */

/* ============================== START COUPON OPTIONS ================================ */
Route::post('/coupon-apply',[CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
/* ============================== START CHECKOUT ROUTE ================================ */
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

/* ============================== Division Select With Ajax =========================== */
Route::get('/division-get/ajax/{division_id}',[CheckoutController::class, 'DistrictGetAjax']);
/* ============================== District Select With Ajax =========================== */
Route::get('/district-view/state-view/ajax/{district_id}',[CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store',[CheckoutController::class,'CheckoutStore'])->name('checkout.store');

/* ============================== Start Cash On Order  =========================== */
Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
// Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('orders.manage');

// User Dashboard Route //
Route::get('/my/orders',[AllUserController::class, 'MyOrders'])->name('manage.orders');
Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails'])->name('orders_details');
Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload'])->name('invoice_download');
Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel-orders');
   
Route::get('/user-roll',[AllUserController::class, 'UserRoll'])->name('admin.user_role');






/*=============================== START USER ALL ROUTE ===============================*/ 
Route::get('/user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update',[IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
Route::get('/user/all-user',[IndexController::class,'AllUsers'])->name('all.user');
/*=============================== END USER ALL ROUTE ===============================*/
/* =============================== END FRONTEND SECTION =================================*/

/*========================== Start Admin Route Section ==========================*/
Route::prefix('admin')->group(function(){

	Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
	Route::post('/login',[AdminController::class, 'Login'])->name('admin.login');
	Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
	Route::get('/logout',[AdminController::class, 'AminLogout'])->name('admin.logout')->middleware('admin');
	Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.regester');
	Route::post('/admin/register/store',[AdminController::class, 'AdminRegisterStore'])->name('admin.register.store');
	/*============================= Admin Some Route ========================*/
	Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
	Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
	Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
	Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
	Route::post('/update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');
});
/*========================== End Admin Route Section ==========================*/

/*=============================== START BACKEND SECTION ===============================*/

/*=============================== START BRAND SECTION ===============================*/
Route::prefix('brand')->group(function(){

Route::get('/brand-all',[BrandController::class, 'Index'])->name('brand.all');
Route::post('/store-brand',[BrandController::class, 'store'])->name('brand.store');
Route::get('/edit-brand/{id}',[BrandController::class, 'edit'])->name('brand.edit');
Route::post('/update-brand/{id}',[BrandController::class, 'update'])->name('brand.update');
Route::get('/delete-brand/{id}',[BrandController::class, 'destroy'])->name('brand.delete');
Route::get('/active_brand/{id}',[BrandController::class, 'active'])->name('brand.active');
Route::get('/inactive_brand/{id}',[BrandController::class, 'inactive'])->name('brand.in_active');

});
/*=============================== END BRAND SECTION ===============================*/

/*=============================== START CATEGORY SECTION ===============================*/
Route::prefix('category')->group(function(){

Route::get('/all-category',[CategoryController::class,'index'])->name('category.all');
Route::post('/store-category',[CategoryController::class,'store'])->name('category.store');
Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/delete-category/{id}',[CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/active_category/{id}',[CategoryController::class,'active'])->name('category.active');
Route::get('/inactive_category/{id}',[CategoryController::class,'inactive'])->name('category.in_active');

/*=============================== START SUBCATEGORY SECTION ===============================*/
Route::get('/all-subcategory',[SubCategoryController::class,'index'])->name('subcategory.all');
Route::post('/store-subcategory',[SubCategoryController::class,'store'])->name('subcategory.store');
Route::get('/edit-subcategory/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::post('/update-subcategory/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::get('/delete-subcategory/{id}',[SubCategoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('/active_subcategory/{id}',[SubCategoryController::class,'active'])->name('subcategory.active');
Route::get('/inactive_subcategory/{id}',[SubCategoryController::class,'inactive'])->name('subcategory.in_active');
/*=============================== END SUBCATEGORY SECTION ===============================*/

/*=============================== START SUB-SUBCATEGORY SECTION ===============================*/

/*================ Start Ajax Category Click SubCategory Show ==================*/
Route::get('/category-subcategory/ajax/{category_id}',[SubCategoryController::class,'getsubcategory'])->name('subcategory.ajax');
Route::get('/subcategory-subsubcategory/ajax/{subcategory_id}',[SubCategoryController::class,'getsubsubcategory'])->name('subsubcategory.ajax');
/*================ End Ajax Category Click SubCategory Show ==================*/

Route::get('/all-subsubcategory',[SubSubCategoryController::class,'index'])->name('subsubcategory.all');
Route::post('/store-subsubcategory',[SubSubCategoryController::class,'store'])->name('subsubcategory.store');
Route::get('/edit-ssububcategory/{id}',[SubSubCategoryController::class,'edit'])->name('subsubcategory.edit');
Route::post('/update-subsubcategory/{id}',[SubSubCategoryController::class,'update'])->name('subsubcategory.update');
Route::get('/delete-subsubcategory/{id}',[SubSubCategoryController::class,'destroy'])->name('subsubcategory.delete');
Route::get('/active_subsubcategory/{id}',[SubSubCategoryController::class,'active'])->name('subsubcategory.active');
Route::get('/inactive_subsubcategory/{id}',[SubSubCategoryController::class,'inactive'])->name('subsubcategory.in_active');
/*=============================== END SUB-SUBCATEGORY SECTION ===============================*/
});
/*=============================== END CATEGORY SECTION ===============================*/

/*=============================== START PRODUCT SECTION =============================*/
Route::prefix('product')->group(function(){

Route::get('/add-product',[ProductController::class, 'index'])->name('product.add');
Route::post('/store-product',[ProductController::class, 'store'])->name('product.store');
Route::get('/manage-product',[ProductController::class, 'manageProduct'])->name('product.manage');
Route::get('/edit-product/{id}',[ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/data-update/',[ProductController::class, 'ProductDataUpdate'])->name('product.update');
Route::post('/product-update-image/',[ProductController::class, 'MultiImageUpdate'])->name('productupdate-image');
Route::post('/product-thumbnail-update-image/',[ProductController::class, 'ThambnailImageUpdate'])->name('thumbnailupdate-image');
Route::get('/delete-multiimg/{id}',[ProductController::class, 'MultiImageDelete'])->name('multiImg.delete');
Route::get('/delete-product/{id}',[ProductController::class, 'destroy'])->name('product.delete');
Route::get('/active_productcategory/{id}',[ProductController::class, 'active'])->name('product.active');
Route::get('/inactive_productcategory/{id}',[ProductController::class, 'inactive'])->name('product.in_active');

});

/*=============================== End PRODUCT SECTION ===============================*/

/*=============================== START SLIDER SECTION ===============================*/
Route::prefix('slider')->group(function(){

Route::get('/manage-slider',[SliderController::class, 'index'])->name('slider.manage');
Route::post('/store-slider',[SliderController::class, 'store'])->name('slider.store');
Route::get('/edit-slider/{id}',[SliderController::class, 'edit'])->name('slider.edit');
Route::post('/update-slider/',[SliderController::class, 'update'])->name('slider.update');
Route::get('/delete-slider/{id}',[SliderController::class, 'destroy'])->name('slider.delete');
Route::get('/active_slider/{id}',[SliderController::class, 'active'])->name('slider.active');
Route::get('/inactive_slider/{id}',[SliderController::class, 'inactive'])->name('slider.in_active');

});
/*=============================== END SLIDER SECTION ================================*/

/*=============================== START COUPON SECTION =============================*/
Route::prefix('coupon')->group(function(){

Route::get('/coupon-view',[CouponController::class,'CouponView'])->name('coupon.manage');
Route::post('/coupon-store',[CouponController::class,'CouponStore'])->name('coupon.store');
Route::get('/coupon-edit/{id}',[CouponController::class,'CouponEdit'])->name('coupon.edit');
Route::post('/coupon-update/{id}',[CouponController::class,'CouponUpdate'])->name('coupon.update');
Route::get('/coupon-delete/{id}',[CouponController::class,'CouponDelete'])->name('coupon.delete');
Route::get('/active_coupon/{id}',[CouponController::class,'Couponactive'])->name('coupon.active');
Route::get('/inactive_coupon/{id}',[CouponController::class,'Couponinactive'])->name('coupon.in_active');

});
/*=============================== END COUPON SECTION ================================*/

/*=============================== START SHIPPING DIVISION  SECTION =============================*/
Route::prefix('shipping')->group(function(){

Route::get('/division-view',[ShippingAreaController::class,'DivisionView'])->name('manage.division');
Route::post('/division-store',[ShippingAreaController::class,'DivisionStore'])->name('division.store');
Route::get('/division-edit/{id}',[ShippingAreaController::class,'DivisionEdit'])->name('division.edit');
Route::get('/division-delete/{id}',[ShippingAreaController::class,'DivisionDelete'])->name('division.delete');
Route::post('/division-update/{id}',[ShippingAreaController::class,'DivisionUpdate'])->name('division.update');
Route::get('/active_division/{id}',[ShippingAreaController::class,'Divisionactive'])->name('division.active');
Route::get('/inactive_division/{id}',[ShippingAreaController::class,'Divisioninactive'])->name('division.in_active');

/*=============================== END SHIPPING DIVISION  SECTION =================================*/

/*=============================== START SHIPPING DISTRICT  SECTION =============================*/
Route::get('/district-view',[ShippingAreaController::class,'DistrictView'])->name('manage.district');
Route::post('/district-store',[ShippingAreaController::class,'DistrictStore'])->name('district.store');
Route::get('/district-edit/{id}',[ShippingAreaController::class,'DistrictEdit'])->name('district.edit');
Route::post('/district-update/{id}',[ShippingAreaController::class,'DistrictUpdate'])->name('district.update');
Route::get('/district-delete/{id}',[ShippingAreaController::class,'DistrictDelete'])->name('district.delete');
Route::get('/active_district/{id}',[ShippingAreaController::class,'Districtactive'])->name('district.active');
Route::get('/inactive_district/{id}',[ShippingAreaController::class,'Districtinactive'])->name('district.in_active');
/*=============================== END  SHIPPING DISTRICT  SECTION ==============================*/

/*=============================== START SHIPPING STATE  SECTION =============================*/
Route::get('/state-view',[ShippingAreaController::class,'StateView'])->name('manage.state');
Route::post('/state-store',[ShippingAreaController::class,'StateStore'])->name('state.store');
Route::get('/state-edit/{id}',[ShippingAreaController::class,'StateEdit'])->name('state.edit');
Route::post('/state-update/{id}',[ShippingAreaController::class,'StateUpdate'])->name('state.update');
Route::get('/state-delete/{id}',[ShippingAreaController::class,'StateDelete'])->name('state.delete');
Route::get('/active_state/{id}',[ShippingAreaController::class,'Stateactive'])->name('state.active');
Route::get('/inactive_state/{id}',[ShippingAreaController::class,'Stateinactive'])->name('state.in_active');
// start ajax division with district //
Route::get('/division view - district show/ajax/{division_id}',[ShippingAreaController::class, 'Getdivision'])->name('division.ajax');
/*=============================== END SHIPPING STATE  SECTION ===============================*/
});

/*=============================== START BLOG SECTION =============================*/
Route::prefix('blog')->group(function(){

Route::get('/blog-category',[BlogController::class, 'BlogCategory'])->name('blog.category');
Route::post('/blog-category-store',[BlogController::class, 'BlogCategoryStore'])->name('blog.category.store');
Route::get('/blog-category-edit/{id}',[BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');
Route::post('/blog-category-update/{id}',[BlogController::class, 'BlogCategoryupdate'])->name('blog.category.update');
Route::get('/blog-category-delete/{id}',[BlogController::class, 'BlogCategorydestroy'])->name('blog.category.delete');
Route::get('/blog-active/{id}',[BlogController::class,'BlogCategoryActive'])->name('blog.category.active');
Route::get('/blog-inactive/{id}',[BlogController::class,'BlogCategoryInActive'])->name('blog.category.in_active');
// =============================== ADMIN VIEW BLOG POST ROUTES  =============================== //
Route::get('/view-post',[BlogController::class, 'ViewBlogPost'])->name('view.post');
Route::post('/view-post-store',[BlogController::class, 'BlogPostStore'])->name('blog.post.store');
Route::get('/view-post-list',[BlogController::class, 'BlogPostlist'])->name('view.post.list');
Route::get('/view-post-edit/{id}',[BlogController::class, 'BlogPostEdit'])->name('blog.post.edit');
Route::post('/view-post-update/',[BlogController::class, 'BlogPostUpdate'])->name('blog.post.update');
Route::get('/view-post-delete/{id}',[BlogController::class, 'BlogPostDelete'])->name('blog.post.delete');
Route::get('/active_blogpost/{id}',[BlogController::class, 'BlogPostActive'])->name('blog.post.active');
Route::get('/inactive_blogpost/{id}',[BlogController::class, 'BlogPostInActive'])->name('blog.post.in_active');

});
/*=============================== END BLOG SECTION ================================*/

/*=============================== START SITE SETTING SECTION =============================*/
Route::prefix('setting')->group(function(){

Route::get('/site-setting',[SiteSettingController::class,'SiteSetting'])->name('site.setting');
Route::post('/site-update',[SiteSettingController::class,'SiteSettingUpdate'])->name('update.sitesetting');

});
/*=============================== END SITE SETTING SECTION ================================*/

/*=============================== START SEO SETTING SECTION =============================*/
Route::prefix('seo')->group(function(){

Route::get('/seo-setting',[SiteSettingController::class,'SeoSetting'])->name('seo.setting');
Route::get('/seo-setting',[SiteSettingController::class,'SeoSetting'])->name('orders.setting');
Route::post('/seo-update',[SiteSettingController::class,'SeoSettingUpdate'])->name('update.seosetting');

});

/*=============================== END SEO SETTING SECTION ================================*/

/* =============================== START ADMIN  MANAGE REVIEW   SECTION =============================== */
Route::prefix('review')->group(function(){

Route::get('/pending-review',[ReviewController::class,'PendingReview'])->name('pending.review');
Route::get('/admin-approve/{id}',[ReviewController::class,'ReviewApprove'])->name('review.approve');
Route::get('/publish-review',[ReviewController::class,'PublishReview'])->name('publish.review');
Route::get('/delete-review/{id}',[ReviewController::class,'DeleteReview'])->name('delete.review');

});



/* =============================== END ADMIN  MANAGE REVIEW  SECTION =============================== */

/* =============================== START ADMIN ORDERS  SECTION =============================== */
Route::prefix('orders')->group(function(){

Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending.orders');
Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed.orders');
Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing.orders');
Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered.orders');
Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel.orders');

/* =============================== START Order Traking Route  =============================== */
Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

/* ==================================== Update Status ======================================== */
Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending.confirm');
Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
Route::get('/processing/delivered/{order_id}', [OrderController::class, 'ProcessingToDelivered'])->name('processing.delivered');
Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');



});

/* =============================== END ADMIN ORDERS SECTION =============================== */


/* ==================================== Start Admin Reports Routes  ============================== */
Route::prefix('reports')->group(function(){

Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');


});
/* ==================================== End Admin Reports Routes  ============================== */

/*=============================== END BACKEND SECTION ===============================*/


Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
