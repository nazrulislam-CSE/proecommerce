<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackEnd\AdminProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ShippingAreaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminUserController;
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


// =============================== START FRONTEND SECTION =============================== //
Route::get('/',[FrontEndController::class, 'index'])->name('index');


// =============================== START USER ALL ROUTE =============================== //
Route::get('/user/logout',[FrontEndController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[FrontEndController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[FrontEndController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[FrontEndController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update',[FrontEndController::class, 'UserPasswordUpdate'])->name('user.password.update');
// user active/inactive //
Route::get('/user/all-user',[AdminProfileController::class,'AllUsers'])->name('all.user');
// =============================== END USER ALL ROUTE =============================== //


// =============================== START MULTI LANGUAGE SECTION =============================== //
Route::get('/language/bangla','LanguageController@bangla')->name('bangla.language');
Route::get('/language/english','LanguageController@english')->name('english.language');

// =============================== START PRODUCTS DETAILS SECTION =============================== //
Route::get('/product-details/{id}/{slug}','FrontEndController@productDetails')->name('product.details');
Route::get('/product-tag/{tag}','FrontEndController@TagWiseProduct')->name('product-tag');
Route::get('/subcategory-product/{id}/{slug}','FrontEndController@SubcatWiseProduct')->name('product-subcategory');
Route::get('/subsubcategory-product/{id}/{slug}','FrontEndController@SubSubcatWiseProduct')->name('product-subsubcategory');

// =============================== START PRODUCT VIEW MODAL WITH AJAX =============================== //
Route::get('/product/view/modal/{id}','FrontEndController@ProductViewAjax');
// =============================== START ADD TO CART STORE DATA WITH AJAX =============================== //
Route::post('/cart/data/store/{id}','CartController@AddToCart');
// =============================== GET DATA FORM MINICART =============================== //
Route::get('/product/mini/cart','CartController@AddMiniCart');
// ===============================  REMOVE MINICART =============================== //
Route::get('/minicart/product-remove/{rowId}','CartController@RemoveMiniCart');
// =============================== START ADD TO WISHLIST WITH AJAX =============================== //
Route::post('/add-to-wishlist/{product_id}','CartController@AddToWishlist');
// ===============================  REMOVE MINICART =============================== //
Route::get('/minicart/product-remove/{rowId}','CartController@RemoveMiniCart');

/////////////////////  User Must Login  ////
// Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
// });

   

/////////////////////  User Must Be Login  ////////////////////////
 Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

    // =============================== START WISHLIST PAGE =============================== //
    Route::get('/wishlist',[WishlistController::class, 'ViewWishlist'])->name('wishlist');
    // =============================== START WISHLIST PAGE =============================== //
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    // =============================== START WISHLIST PAGE =============================== //
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);


    // =============================== START MY CARY PAGE =============================== //
    Route::get('/mycart', [CartPageController::class, 'Mycart'])->name('mycart');
    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

    // =============================== START MY CARY INCREMENT/DECREMENT =============================== //
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

  });


// ============================== START COUPON OPTIONS ================================ //
Route::post('/coupon-apply',[CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
// ============================== END COUPON OPTIONS ================================ //
// ============================== START CHECKOUT ROUTE ================================ //
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
// ====================== division select =======================//
Route::get('/division-get/ajax/{division_id}',[CheckoutController::class, 'DistrictGetAjax']);
// ====================== district select =======================//
Route::get('/district-view/state-view/ajax/{district_id}',[CheckoutController::class, 'StateGetAjax']);
// ====================== checkout store =======================//
Route::post('/checkout/store',[CheckoutController::class,'CheckoutStore'])->name('checkout.store');

// ============================== START BLOG POST SECTION ================================ //

// ============================== END BLOG POST SECTION ================================ //
Route::get('/single-post/{id}/{slug}',[FrontEndController::class, 'SinglePost'])->name('single-post');
// ============================== END PRODUCT REVIEW  SECTION ================================ //
Route::post('/review-store',[ReviewController::class, 'ReviewStore'])->name('review.store');
// =============================== END FRONTEND SECTION ========================================== //



// =============================== START ADMIN SECTION =============================== //
Route::group(['prefix'=> 'admin','middleware' => ['admin:admin']], function(){

    Route::get('/login',[AdminController::class, 'loginForm']);
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');

});
// admin guard //
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

// user guard //
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    // $id = Auth::user()->id;
    // $user = User::find($id);
    return view('dashboard');
})->name('dashboard');


// user guard //
// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
//     return view('/dashboard');
// })->name('dashboard');
// =============================== END ADMIN SECTION =============================== //




// ====================== START  ADMIN SECTION ALL ROUTE ========================== //
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');
// ====================== END  ADMIN SECTION ALL ROUTE ========================== //



// =============================== START BACKEND SECTION =============================== //

// =============================== START BRAND SECTION =============================== //
Route::prefix('brand')->group(function(){

Route::get('/all-brand',[BrandController::class, 'index'])->name('brand.all');
Route::post('/store-brand','BrandController@store')->name('brand.store');
Route::get('/trash-brand/{id}','BrandController@destroy')->name('brand.trash');
Route::get('/edit-brand/{id}','BrandController@edit')->name('brand.edit');
Route::post('/update-brand/{id}','BrandController@update')->name('brand.update');
Route::get('/trashed-brand/','BrandController@trashed')->name('brand.trashed');
Route::get('/restore-brand/{id}','BrandController@restore')->name('brand.restore');
Route::get('/kill-brand/{id}','BrandController@kill')->name('brand.kill');
Route::get('/active_brand/{id}','BrandController@active')->name('brand.active');
Route::get('/inactive_brand/{id}','BrandController@inactive')->name('brand.in_active');

});
// =============================== END BRAND SECTION =============================== //
// =============================== START CATEGORY SECTION =============================== //
Route::prefix('category')->group(function(){

Route::get('/all-category','CategoryController@index')->name('category.all');
Route::post('/store-category','CategoryController@store')->name('category.store');
Route::get('/trash-category/{id}','CategoryController@destroy')->name('category.trash');
Route::get('/edit-category/{id}','CategoryController@edit')->name('category.edit');
Route::post('/update-category/{id}','CategoryController@update')->name('category.update');
Route::get('/trashed-category/','CategoryController@trashed')->name('category.trashed');
Route::get('/restore-category/{id}','CategoryController@restore')->name('category.restore');
Route::get('/kill-category/{id}','CategoryController@kill')->name('category.kill');
Route::get('/active_category/{id}','CategoryController@active')->name('category.active');
Route::get('/inactive_category/{id}','CategoryController@inactive')->name('category.in_active');

// =============================== END CATEGORY SECTION =============================== //
// =============================== START SUBCATEGORY SECTION =============================== //


Route::get('/all-subcategory','SubCategoryController@index')->name('subcategory.all');
Route::post('/store-subcategory','SubCategoryController@store')->name('subcategory.store');
Route::get('/trash-subcategory/{id}','SubCategoryController@destroy')->name('subcategory.trash');
Route::get('/edit-subcategory/{id}','SubCategoryController@edit')->name('subcategory.edit');
Route::post('/update-subcategory/{id}','SubCategoryController@update')->name('subcategory.update');
Route::get('/trashed-subcategory/','SubCategoryController@trashed')->name('subcategory.trashed');
Route::get('/restore-subcategory/{id}','SubCategoryController@restore')->name('subcategory.restore');
Route::get('/kill-subcategory/{id}','SubCategoryController@kill')->name('subcategory.kill');
Route::get('/active_subcategory/{id}','SubCategoryController@active')->name('subcategory.active');
Route::get('/inactive_subcategory/{id}','SubCategoryController@inactive')->name('subcategory.in_active');

// =============================== END SUBCATEGORY SECTION =============================== //
// =============================== START SUBSUBCATEGORY SECTION =============================== //
Route::get('/all-subsubcategory','SubSubCategoryController@index')->name('subsubcategory.all');
// start first ajax //
Route::get('/all-category/all-subcategory/ajax/{category_id}','SubCategoryController@getsubcategory')->name('subcategory.ajax');
// end ajax //

// start second ajax //
Route::get('/all-subcategory/all-subsubcategory/ajax/{subcategory_id}','SubCategoryController@getsubsubcategory')->name('subsubcategory.ajax');
// end ajax //
Route::post('/store-subsubcategory','SubSubCategoryController@store')->name('subsubcategory.store');
Route::get('/trash-ssububcategory/{id}','SubSubCategoryController@destroy')->name('subsubcategory.trash');
Route::get('/edit-ssububcategory/{id}','SubSubCategoryController@edit')->name('subsubcategory.edit');
Route::post('/update-subsubcategory/{id}','SubSubCategoryController@update')->name('subsubcategory.update');
Route::get('/trashed-subsubcategory/','SubSubCategoryController@trashed')->name('subsubcategory.trashed');
Route::get('/restore-subsubcategory/{id}','SubSubCategoryController@restore')->name('subsubcategory.restore');
Route::get('/kill-subsubcategory/{id}','SubSubCategoryController@kill')->name('subsubcategory.kill');
Route::get('/active_subsubcategory/{id}','SubSubCategoryController@active')->name('subsubcategory.active');
Route::get('/inactive_subsubcategory/{id}','SubSubCategoryController@inactive')->name('subsubcategory.in_active');
// =============================== END SUBSUBCATEGORY SECTION =============================== //

});
// =============================== START PRODUCT SECTION =============================== //
Route::prefix('product')->group(function(){

Route::get('/add-product','ProductController@index')->name('product.add');
Route::post('/store-product','ProductController@store')->name('product.store');
Route::get('/manage-product','ProductController@manageProduct')->name('product.manage');
Route::get('/edit-product/{id}','ProductController@editProduct')->name('product.edit');
Route::post('/data-update/','ProductController@ProductDataUpdate')->name('product.update');
Route::post('/product-update-image/','ProductController@MultiImageUpdate')->name('productupdate-image');
Route::post('/product-thumbnail-update-image/','ProductController@ThambnailImageUpdate')->name('thumbnailupdate-image');
Route::get('/delete-multiimg/{id}','ProductController@MultiImageDelete')->name('multiImg.delete');
Route::get('/trash-product/{id}','ProductController@destroy')->name('product.trash');
Route::get('/trashed-product','ProductController@trashed')->name('product.trashed');
Route::get('/restore-product/{id}','ProductController@restore')->name('product.restore');
Route::get('/kill-product/{id}','ProductController@kill')->name('product.kill');
Route::get('/active_productcategory/{id}','ProductController@active')->name('product.active');
Route::get('/inactive_productcategory/{id}','ProductController@inactive')->name('product.in_active');

});
// =============================== END PRODUCT SECTION =============================== //

// =============================== START SLIDER SECTION =============================== //
Route::prefix('slider')->group(function(){

Route::get('/manage-slider','SliderController@index')->name('manage.slider');
Route::post('/store-slider','SliderController@store')->name('slider.store');
Route::get('/edit-slider/{id}','SliderController@edit')->name('slider.edit');
Route::post('/update-slider/{id}','SliderController@update')->name('slider.update');
Route::get('/trash-slider/{id}','SliderController@destroy')->name('slider.trash');
Route::get('/trashed-slider/','SliderController@trashed')->name('slider.trashed');
Route::get('/restore-slider/{id}','SliderController@restore')->name('slider.restore');
Route::get('/kill-slider/{id}','SliderController@kill')->name('slider.kill');
Route::get('/active_slider/{id}','SliderController@active')->name('slider.active');
Route::get('/inactive_slider/{id}','SliderController@inactive')->name('slider.in_active');

// =============================== END SLIDER SECTION =============================== //
});

// =============================== START COUPON SECTION =============================== //
Route::prefix('coupon')->group(function(){

Route::get('/coupon-view',[CouponController::class,'CouponView'])->name('manage.coupon');
Route::post('/coupon-store',[CouponController::class,'CouponStore'])->name('coupon.store');
Route::get('/coupon-edit/{id}',[CouponController::class,'CouponEdit'])->name('coupon.edit');
Route::post('/coupon-update/{id}',[CouponController::class,'CouponUpdate'])->name('coupon.update');
Route::get('/coupon-delete/{id}',[CouponController::class,'CouponDelete'])->name('coupon.delete');
Route::get('/active_coupon/{id}',[CouponController::class,'Couponactive'])->name('coupon.active');
Route::get('/inactive_coupon/{id}',[CouponController::class,'Couponinactive'])->name('coupon.in_active');

});

// =============================== END COUPON SECTION =============================== //


// =============================== START SHIPPING DIVISION  SECTION =============================== //
Route::prefix('shipping')->group(function(){

Route::get('/division-view',[ShippingAreaController::class,'DivisionView'])->name('manage.division');
Route::post('/division-store',[ShippingAreaController::class,'DivisionStore'])->name('division.store');
Route::get('/division-edit/{id}',[ShippingAreaController::class,'DivisionEdit'])->name('division.edit');
Route::get('/division-delete/{id}',[ShippingAreaController::class,'DivisionDelete'])->name('division.delete');
Route::post('/division-update/{id}',[ShippingAreaController::class,'DivisionUpdate'])->name('division.update');
Route::get('/active_division/{id}',[ShippingAreaController::class,'Divisionactive'])->name('division.active');
Route::get('/inactive_division/{id}',[ShippingAreaController::class,'Divisioninactive'])->name('division.in_active');

// =============================== END SHIPPING DIVISION  SECTION =============================== //

// =============================== START SHIPPING DISTRICT  SECTION =============================== //
Route::get('/district-view',[ShippingAreaController::class,'DistrictView'])->name('manage.district');
Route::post('/district-store',[ShippingAreaController::class,'DistrictStore'])->name('district.store');
Route::get('/district-edit/{id}',[ShippingAreaController::class,'DistrictEdit'])->name('district.edit');
Route::post('/district-update/{id}',[ShippingAreaController::class,'DistrictUpdate'])->name('district.update');
Route::get('/district-delete/{id}',[ShippingAreaController::class,'DistrictDelete'])->name('district.delete');
Route::get('/active_district/{id}',[ShippingAreaController::class,'Districtactive'])->name('district.active');
Route::get('/inactive_district/{id}',[ShippingAreaController::class,'Districtinactive'])->name('district.in_active');
// =============================== END SHIPPING DISTRICT  SECTION =============================== //

// =============================== START SHIPPING STATE  SECTION =============================== //
Route::get('/state-view',[ShippingAreaController::class,'StateView'])->name('manage.state');
Route::post('/state-store',[ShippingAreaController::class,'StateStore'])->name('state.store');
Route::get('/state-edit/{id}',[ShippingAreaController::class,'StateEdit'])->name('state.edit');
Route::post('/state-update/{id}',[ShippingAreaController::class,'StateUpdate'])->name('state.update');
Route::get('/state-delete/{id}',[ShippingAreaController::class,'StateDelete'])->name('state.delete');
Route::get('/active_state/{id}',[ShippingAreaController::class,'Stateactive'])->name('state.active');
Route::get('/inactive_state/{id}',[ShippingAreaController::class,'Stateinactive'])->name('state.in_active');
// start ajax division with district //
Route::get('/division-view/district-view/ajax/{division_id}',[ShippingAreaController::class, 'Getdivision'])->name('division.ajax');

});
// end ajax division with district //
// =============================== END SHIPPING STATE  SECTION =============================== //

// =============================== START BLOG  SECTION =============================== //
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
Route::post('/view-post-update/{id}',[BlogController::class, 'BlogPostUpdate'])->name('blog.post.update');
Route::get('/view-post-delete/{id}',[BlogController::class, 'BlogPostDelete'])->name('blog.post.delete');
Route::get('/active_blogpost/{id}',[BlogController::class, 'BlogPostActive'])->name('blog.post.active');
Route::get('/inactive_blogpost/{id}',[BlogController::class, 'BlogPostInActive'])->name('blog.post.in_active');

});
// =============================== END BLOG SECTION =============================== //

// =============================== START SITE SETTING  SECTION =============================== //
Route::prefix('blog')->group(function(){

Route::get('/site-setting',[SiteSettingController::class,'SiteSetting'])->name('site.setting');
Route::post('/site-update',[SiteSettingController::class,'SiteSettingUpdate'])->name('update.sitesetting');

});

// =============================== END SITE SETTING SECTION =============================== //

// =============================== START SEO   SECTION =============================== //
Route::prefix('setting')->group(function(){

Route::get('/seo-setting',[SiteSettingController::class,'SeoSetting'])->name('seo.setting');
Route::post('/seo-update',[SiteSettingController::class,'SeoSettingUpdate'])->name('update.seosetting');

});
// =============================== END SEO  SECTION =============================== //

// =============================== START ADMIN  MANAGE REVIEW   SECTION =============================== //
Route::prefix('review')->group(function(){

Route::get('/pending-review',[ReviewController::class,'PendingReview'])->name('pending.review');
Route::get('/admin-approve/{id}',[ReviewController::class,'ReviewApprove'])->name('review.approve');
Route::get('/publish-review',[ReviewController::class,'PublishReview'])->name('publish.review');
Route::get('/delete-review/{id}',[ReviewController::class,'DeleteReview'])->name('delete.review');

});

// =============================== END ADMIN  MANAGE REVIEW  SECTION =============================== //

// =============================== START ALL ADMIN  USER ROLE  SECTION =============================== //
Route::prefix('adminuserrole')->group(function(){

Route::get('/all-adminuserrole',[AdminUserController::class,'AllAdminRole'])->name('all.admin.user');
Route::get('/add-adminuser', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
Route::post('/add-adminuser-store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
Route::get('/add-adminuser-edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
Route::post('/add-adminuser-update/{id}', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.update');

});

// =============================== END ALL ADMIN  USER ROLE  SECTION =============================== //



// =============================== END BACKEND SECTION =============================== //


