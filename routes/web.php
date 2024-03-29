<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();
// facebook Login
Route::get('auth/facebook', [App\Http\Controllers\FacebookLoginController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [App\Http\Controllers\FacebookLoginController::class, 'loginWithFacebook']);
// google Login
Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);

//============================      frontend routes      ================================/

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('home.index');
// basic pages
Route::get('/about-us', [App\Http\Controllers\Frontend\FrontendController::class, 'aboutUs']);
Route::get('/privacy-policy', [App\Http\Controllers\Frontend\FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [App\Http\Controllers\Frontend\FrontendController::class, 'termsCondition']);
// product details
Route::get('/products/{slug}/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetails']);
Route::get('/track-order', [App\Http\Controllers\Frontend\FrontendController::class, 'trackCustomerOrder']);
// product shop routes
Route::get('/product-search', [App\Http\Controllers\Frontend\ProductShopController::class, 'searchProduct']);
Route::get('/shop', [App\Http\Controllers\Frontend\ProductShopController::class, 'index'])->name('shop');
Route::get('/11-offer', [App\Http\Controllers\Frontend\ProductShopController::class, 'offer11Store'])->name('11-offer');
Route::get('/22-offer', [App\Http\Controllers\Frontend\ProductShopController::class, 'offer22Store'])->name('22-offer');
Route::get('/category/{slug}/{id}', [App\Http\Controllers\Frontend\ProductShopController::class, 'categoryWishProduct']);
Route::get('/sub-category/{slug}/{id}', [App\Http\Controllers\Frontend\ProductShopController::class, 'subCategoryWishProduct']);
Route::get('/re-sub-category/{slug}/{id}', [App\Http\Controllers\Frontend\ProductShopController::class, 'reSubCategoryWishProduct']);

//filter product
Route::get('/filter-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filterShop']);
Route::get('/filter-11-offer-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filter11OfferShop']);
Route::get('/filter-22-offer-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filter22OfferShop']);
Route::get('/filter-category-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filterCategoryShop']);
Route::get('/filter-sub-category-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filterSubCategoryShop']);
Route::get('/filter-re-sub-category-shop', [App\Http\Controllers\Frontend\FilterProductController::class, 'filterReSubCategoryShop']);
//wishlist related routes
Route::get('/add-to-wishlist', [App\Http\Controllers\Frontend\WishListController::class, 'store']);
Route::get('/wishlist', [App\Http\Controllers\Frontend\WishListController::class, 'index']);
Route::get('/delete-wishlist/item/{rowId}', [App\Http\Controllers\Frontend\WishListController::class, 'destroy']);

//cart related routes
Route::get('/addtocart', [App\Http\Controllers\Frontend\CartController::class, 'addToCart']);
Route::get('/getcart', [App\Http\Controllers\Frontend\CartController::class, 'getCartItem']);
Route::get('/getflyingcart', [App\Http\Controllers\Frontend\CartController::class, 'getFlyingCartItem']);
Route::get('/getcartData', [App\Http\Controllers\Frontend\CartController::class, 'getcartData']);
Route::get('/main/getcart/page', [App\Http\Controllers\Frontend\CartController::class, 'getMainCartItem']);
Route::get('/getcartQuantity', [App\Http\Controllers\Frontend\CartController::class, 'getCartQuantity']);
Route::get('/deletecart/item/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'removeFrommainCart']);
Route::get('/products/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart']);
Route::get('/increase/item/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'qtyIncrease']);
Route::get('/increaseByOne/item/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'qtyIncreaseByOne']);
Route::get('/decreaseByOne/item/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'qtyDecreaseByOne']);
//checkout
Route::get('/products/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkout']);
Route::get('/main/checkout/page', [App\Http\Controllers\Frontend\CheckoutController::class, 'getCheckoutCartItem']);
Route::post('/checkout/save', [App\Http\Controllers\Frontend\CheckoutController::class, 'save'])->name('checkout.save');
Route::get('/checkout/payment/{order_id}', [App\Http\Controllers\Frontend\CheckoutController::class, 'paymentMethods']);
Route::post('/pay', [App\Http\Controllers\Frontend\CheckoutController::class, 'pay'])->name('pay');
// subscription store page
Route::post('/subcription/store', [App\Http\Controllers\Frontend\SubcriptionController::class, 'store'])->name('subcription.store');

// blog routes
Route::get('/blogs', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogs');
Route::get('/blogs-view/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blogs-view');

Route::get('/get/shop/type/{shop_id}', [App\Http\Controllers\Api\ApiController::class, 'getShop']);
Route::get('/get/product/details/{product_id}', [App\Http\Controllers\Api\ApiController::class, 'getProductdetails']);

Route::get('/register', [App\Http\Controllers\Frontend\LoginController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Frontend\LoginController::class, 'registerStore'])->name('register');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Frontend\LoginController::class, 'emailverify']);
Route::post('/email/verify/submit', [App\Http\Controllers\Frontend\LoginController::class, 'emailverifySubmit'])->name('email.verify');

// login controller
Route::get('/login', [App\Http\Controllers\Frontend\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Frontend\LoginController::class, 'loginSubmit'])->name('login');
// forget password
Route::get('/forget-password', [App\Http\Controllers\Frontend\LoginController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password', [App\Http\Controllers\Frontend\LoginController::class, 'forgetPasswordSubmit'])->name('forgetPassword');

Route::get('forget-password/verify/{id}/{verify_id}', [App\Http\Controllers\Frontend\LoginController::class, 'forgetCodeVerify']);
Route::post('forget-password/verify/store', [App\Http\Controllers\Frontend\LoginController::class, 'forgetCodeVerifyStore']);

// customer Dashboard
Route::get('/logout', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/dashboard/order', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'customerOrder'])->name('customer.order');
Route::get('/dashboard/order/view/{id}', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'customerOrderView'])->name('customer.order-view');

Route::get('/dashboard/order/invoice/{id}', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'printInvoice'])->name('customer.order-invoice');
//
Route::get('/profile', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'profile'])->name('customer.profile');
Route::post('/profile', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'profileUpdate'])->name('customer.profile');

Route::get('/password-change', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'passwordChange'])->name('customer.passwordChange');
Route::post('/password-change', [App\Http\Controllers\Frontend\CustomerDashboardController::class, 'passwordChangeStore'])->name('customer.passwordChange');
// vendor create

Route::get('/vendor', [App\Http\Controllers\Frontend\VendorController::class, 'create'])->name('vendor.create');
Route::post('/vendor', [App\Http\Controllers\Frontend\VendorController::class, 'store'])->name('vendor.create');
// vendor update
Route::get('/vendor/edit', [App\Http\Controllers\Frontend\VendorController::class, 'edit'])->name('vendor.edit');
Route::post('/vendor/edit', [App\Http\Controllers\Frontend\VendorController::class, 'editUpdate'])->name('vendor.edit');

Route::get('/vendor/dashboard', [App\Http\Controllers\Frontend\VendorController::class, 'vendorDashboard'])->name('vendor.dashboard');
Route::get('/vendor/order', [App\Http\Controllers\Frontend\VendorController::class, 'orderList'])->name('vendor.order');
Route::get('/vendor/order/view/{id}', [App\Http\Controllers\Frontend\VendorController::class, 'invoicevendorOrder']);

Route::get('/vendor/myorder', [App\Http\Controllers\Frontend\VendorController::class, 'myorder']);

// shop
Route::get('/vendor/shop', [App\Http\Controllers\Frontend\ShopController::class, 'index'])->name('vendor.shop');
Route::post('/vendor/shop', [App\Http\Controllers\Frontend\ShopController::class, 'store'])->name('vendor.shop');
Route::get('vendor/shop/edit/{id}', [App\Http\Controllers\Frontend\ShopController::class, 'edit']);
Route::post('vendor/shop/update', [App\Http\Controllers\Frontend\ShopController::class, 'update']);
Route::get('vendor/shop/delete/{id}', [App\Http\Controllers\Frontend\ShopController::class, 'delete']);

// add product
Route::get('/vendor/product', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('vendor.product');
Route::post('/vendor/product', [App\Http\Controllers\Frontend\ProductController::class, 'store'])->name('vendor.product');
Route::get('/vendor/get/shop/edit/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'edit']);

Route::post('/vendor/product/update', [App\Http\Controllers\Frontend\ProductController::class, 'update'])->name('update.vendor.product');
// api controller
Route::get('/get/subcategory/all/{cate_id}', [App\Http\Controllers\Api\ApiController::class, 'getSubcategory']);
Route::get('/get/resubcategory/all/{subcate_id}', [App\Http\Controllers\Api\ApiController::class, 'getReSubcategory']);

Route::get('/get/reresubcategory/all/{resubcate_id}', [App\Http\Controllers\Api\ApiController::class, 'getReReSubcategory']);

Route::get('/get/rereresubcategory/all/{resubcate_id}', [App\Http\Controllers\Api\ApiController::class, 'getreReReSubcategory']);
Route::get('/get/district/all/{division_id}', [App\Http\Controllers\Api\ApiController::class, 'getDistrict']);
// api controller
//============================      backend routes      ================================/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
Route::get('/admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfileUpdate'])->name('admin.ProfileUpdate');
Route::post('/admin/profile-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfileUpdateSubmit'])->name('admin.ProfileUpdate');

Route::post('/admin/admin-update-password', [App\Http\Controllers\Admin\DashboardController::class, 'adminUpdatePassword'])->name('admin.adminUpdatePassword');

Route::post('/admin/email-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminEmailUpdate'])->name('admin.email.update');

Route::get('/admin/logout', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('admin.logout');
// login controller
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'loginSubmit'])->name('admin.login');
// settings controller
Route::get('/admin/company-information', [App\Http\Controllers\Admin\SettingsController::class, 'companyInformation'])->name('admin.companyInformation');
Route::post('/admin/company-information', [App\Http\Controllers\Admin\SettingsController::class, 'companyInformationSubmit'])->name('admin.companyInformation');

Route::get('/admin/seo-information', [App\Http\Controllers\Admin\SettingsController::class, 'seoInformation'])->name('admin.seoInformation');
Route::post('/admin/seo-information', [App\Http\Controllers\Admin\SettingsController::class, 'seoInformationSubmit'])->name('admin.seoInformation');

Route::get('/admin/social-information', [App\Http\Controllers\Admin\SettingsController::class, 'socialInformation'])->name('admin.socialInformation');
Route::post('/admin/social-information', [App\Http\Controllers\Admin\SettingsController::class, 'socialInformationSubmit'])->name('admin.socialInformation');
// slider Create
Route::get('/admin/slider/create', [App\Http\Controllers\Admin\SliderController::class, 'create'])->name('admin.slider.create');
Route::post('/admin/slider/store', [App\Http\Controllers\Admin\SliderController::class, 'store'])->name('admin.slider.create');
Route::post('/admin/slider/update', [App\Http\Controllers\Admin\SliderController::class, 'update'])->name('admin.slider.update');
Route::get('/admin/slider/index', [App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.slider.index');

Route::get('/admin/slider/active/{id}', [App\Http\Controllers\Admin\SliderController::class, 'active']);
Route::get('/admin/slider/deactive/{id}', [App\Http\Controllers\Admin\SliderController::class, 'deactive']);
Route::get('/admin/slider/edit/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
Route::get('/admin/slider/delete/{id}', [App\Http\Controllers\Admin\SliderController::class, 'delete']);
// Banner Section
Route::get('/admin/banner/create', [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('admin.banner.create');
Route::post('/admin/banner/store', [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('admin.banner.create');
Route::post('/admin/banner/update', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('admin.banner.update');
Route::get('/admin/banner/index', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('admin.banner.index');

Route::get('/admin/banner/active/{id}', [App\Http\Controllers\Admin\BannerController::class, 'active']);
Route::get('/admin/banner/deactive/{id}', [App\Http\Controllers\Admin\BannerController::class, 'deactive']);
Route::get('/admin/banner/edit/{id}', [App\Http\Controllers\Admin\BannerController::class, 'edit']);
Route::get('/admin/banner/delete/{id}', [App\Http\Controllers\Admin\BannerController::class, 'delete']);

//shopping charge
Route::get('/admin/shopping-charge/index', [App\Http\Controllers\Admin\ShoppingChargeController::class, 'index'])->name('admin.shopping-charge.index');
Route::get('/admin/shopping-charge/edit/{id}', [App\Http\Controllers\Admin\ShoppingChargeController::class, 'edit'])->name('admin.shopping-charge.edit');
Route::put('/admin/shopping-charge/update/{id}', [App\Http\Controllers\Admin\ShoppingChargeController::class, 'update'])->name('admin.shopping-charge.update');

// about us
Route::get('/admin/about-us/update', [App\Http\Controllers\Admin\AboutUsController::class, 'update'])->name('admin.about-us.update');
Route::post('/admin/about-us/update', [App\Http\Controllers\Admin\AboutUsController::class, 'updateSubmit'])->name('admin.about-us.update');

// privacy policy
Route::get('/admin/privacy-policy/update', [App\Http\Controllers\Admin\AboutUsController::class, 'privacyPolicy'])->name('admin.privacy-policy.update');
// terms and conditions
Route::get('/admin/terms-conditions/update', [App\Http\Controllers\Admin\AboutUsController::class, 'termsCondition'])->name('admin.terms-conditions.update');

// category
Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.create');
Route::post('/admin/category/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/index', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/active/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'active']);
Route::get('/admin/category/deactive/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deactive']);
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

// Sub category
Route::get('/admin/subcategory/create', [App\Http\Controllers\Admin\SubCategoryController::class, 'create'])->name('admin.subcategory.create');
Route::post('/admin/subcategory/create', [App\Http\Controllers\Admin\SubCategoryController::class, 'store'])->name('admin.subcategory.create');
Route::post('/admin/subcategory/update', [App\Http\Controllers\Admin\SubCategoryController::class, 'update'])->name('admin.subcategory.update');
Route::get('/admin/subcategory/index', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('admin.subcategory.index');
Route::get('/admin/subcategory/active/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'active']);
Route::get('/admin/subcategory/deactive/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'deactive']);
Route::get('/admin/subcategory/edit/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
Route::get('/admin/subcategory/delete/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'delete']);

// Re Sub category
Route::get('/admin/resubcategory/create', [App\Http\Controllers\Admin\ResubCategoryController::class, 'create'])->name('admin.resubcategory.create');
Route::post('/admin/resubcategory/create', [App\Http\Controllers\Admin\ResubCategoryController::class, 'store'])->name('admin.resubcategory.create');
Route::post('/admin/resubcategory/update', [App\Http\Controllers\Admin\ResubCategoryController::class, 'update'])->name('admin.resubcategory.update');
Route::get('/admin/resubcategory/index', [App\Http\Controllers\Admin\ResubCategoryController::class, 'index'])->name('admin.resubcategory.index');
Route::get('/admin/resubcategory/active/{id}', [App\Http\Controllers\Admin\ResubCategoryController::class, 'active']);

Route::get('/admin/resubcategory/deactive/{id}', [App\Http\Controllers\Admin\ResubCategoryController::class, 'deactive']);
Route::get('/admin/resubcategory/edit/{id}', [App\Http\Controllers\Admin\ResubCategoryController::class, 'edit']);
Route::get('/admin/resubcategory/delete/{id}', [App\Http\Controllers\Admin\ResubCategoryController::class, 'delete']);
// Re Re Sub category
Route::get('/admin/re-resubcategory/create', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'create'])->name('admin.re-resubcategory.create');
Route::post('/admin/re-resubcategory/create', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'store'])->name('admin.re-resubcategory.create');
Route::post('/admin/re-resubcategory/update', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'update'])->name('admin.re-resubcategory.update');
Route::get('/admin/re-resubcategory/index', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'index'])->name('admin.re-resubcategory.index');
Route::get('/admin/re-resubcategory/active/{id}', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'active']);
Route::get('/admin/re-resubcategory/deactive/{id}', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'deactive']);
Route::get('/admin/re-resubcategory/edit/{id}', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'edit']);
Route::get('/admin/re-resubcategory/delete/{id}', [App\Http\Controllers\Admin\ReResubCategoryController::class, 'delete']);
// re re re subcategory
Route::get('/admin/re-re-resubcategory/create', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'create'])->name('admin.re-re-resubcategory.create');
Route::post('/admin/re-re-resubcategory/create', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'store'])->name('admin.re-re-resubcategory.create');
Route::post('/admin/re-re-resubcategory/update', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'update'])->name('admin.re-re-resubcategory.update');
Route::get('/admin/re-re-resubcategory/index', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'index'])->name('admin.re-re-resubcategory.index');
Route::get('/admin/re-re-resubcategory/active/{id}', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'active']);
Route::get('/admin/re-re-resubcategory/deactive/{id}', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'deactive']);
Route::get('/admin/re-re-resubcategory/edit/{id}', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'edit']);
Route::get('/admin/re-re-resubcategory/delete/{id}', [App\Http\Controllers\Admin\ReReResubCategoryController::class, 'delete']);

// brand
Route::get('/admin/brand/create', [App\Http\Controllers\Admin\BrandController::class, 'create'])->name('admin.brand.create');
Route::post('/admin/brand/create', [App\Http\Controllers\Admin\BrandController::class, 'store'])->name('admin.brand.create');
Route::post('/admin/brand/update', [App\Http\Controllers\Admin\BrandController::class, 'update'])->name('admin.brand.update');
Route::get('/admin/brand/index', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('admin.brand.index');
Route::get('/admin/brand/active/{id}', [App\Http\Controllers\Admin\BrandController::class, 'active']);
Route::get('/admin/brand/deactive/{id}', [App\Http\Controllers\Admin\BrandController::class, 'deactive']);
Route::get('/admin/brand/edit/{id}', [App\Http\Controllers\Admin\BrandController::class, 'edit']);
Route::get('/admin/brand/delete/{id}', [App\Http\Controllers\Admin\BrandController::class, 'delete']);

//blog routes
Route::get('/admin/blog/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');
Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
Route::get('/admin/blog/index', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog.index');
Route::post('/admin/blog/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.store');
Route::post('/admin/blog/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');
Route::get('/admin/blog/active/{id}', [App\Http\Controllers\Admin\BlogController::class, 'active']);
Route::get('/admin/blog/deactive/{id}', [App\Http\Controllers\Admin\BlogController::class, 'deactive']);
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete']);
// approve product
Route::get('/admin/approve/product', [App\Http\Controllers\Admin\ApproveProductController::class, 'index'])->name('admin.approve.product');
Route::get('/admin/allreject/product', [App\Http\Controllers\Admin\ApproveProductController::class, 'rejectproduct'])->name('admin.reject.product');
Route::get('/admin/product/approve/{id}', [App\Http\Controllers\Admin\ApproveProductController::class, 'approve']);
Route::get('/admin/reject/product/{id}', [App\Http\Controllers\Admin\ApproveProductController::class, 'reject']);
Route::get('/admin/product/edit/{id}', [App\Http\Controllers\Admin\ApproveProductController::class, 'edit']);
Route::post('/admin/product/update', [App\Http\Controllers\Admin\ApproveProductController::class, 'update'])->name('admin.product.update');
Route::get('admin/delete/product/{id}', [App\Http\Controllers\Admin\ApproveProductController::class, 'delete']);

Route::get('/admin/neworder/list', [App\Http\Controllers\Admin\OrderController::class, 'allneworder'])->name('admin.order.new');
Route::get('/admin/processing/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'Processingstatus']);
Route::get('admin/order/deliver/{id}', [App\Http\Controllers\Admin\OrderController::class, 'deleverorder']);
Route::get('/admin/reject/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'rehjectorder']);
Route::get('admin/order/return/{id}', [App\Http\Controllers\Admin\OrderController::class, 'returnorder']);

Route::get('/admin/rejectorder/list', [App\Http\Controllers\Admin\OrderController::class, 'allrejectorder'])->name('admin.order.reject');
Route::get('/admin/alldeleverorder/list', [App\Http\Controllers\Admin\OrderController::class, 'alldeleverorder'])->name('admin.order.alldeleverorder');

Route::get('/admin/processingorder/list', [App\Http\Controllers\Admin\OrderController::class, 'processingorder'])->name('admin.order.new');

Route::get('admin/invoice/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'invoiceOrder']);

Route::get('admin/update/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'updateOrder']);

Route::post('admin/update/order', [App\Http\Controllers\Admin\OrderController::class, 'updateOrderSubmit']);

//Report Routes
Route::get('/admin/orderreport', [App\Http\Controllers\Admin\ReportController::class, 'orderReport'])->name('admin.orderreport');
Route::post('/admin/orderreport', [App\Http\Controllers\Admin\ReportController::class, 'Report'])->name('admin.orderreport');
Route::get('/admin/productreport', [App\Http\Controllers\Admin\ReportController::class, 'productReport'])->name('admin.productreport');
Route::post('/admin/productreport', [App\Http\Controllers\Admin\ReportController::class, 'productWiseReport'])->name('admin.productreport');
