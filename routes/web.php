<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@welcome');
Route::post('userlogin','HomeController@userLogin')->name('user.login');
Route::post('userregister','HomeController@userRegister')->name('user.register');
Route::get('category','WelcomeController@category');
Route::get('wishlist','WelcomeController@wishlist');
Route::get('faq','WelcomeController@faq');
Route::get('about', 'PageController@about');
Route::get('blog', 'PageController@blogs');
Route::get('corporate-enquiry', 'PageController@corporateEnquiry');
Route::get('dealership-booking', 'PageController@dealershipBooking');
Route::post('saveDealershipBooking', 'PageController@saveDealershipBooking');
Route::post('saveCorporateEnquiry', 'PageController@saveCorporateEnquiry');
Route::get('privacy-policy', 'PageController@privacyPolicy');
Route::get('terms-condition', 'PageController@termsCondtion');
Route::get('return-policy', 'PageController@returnpolicy');
Route::get('shipping-policy', 'PageController@shipping_policies');
Route::post('send_contact_query','PageController@saveContactEnquiry')->name('contact.send_query');

/* products & categories */
Route::get('all_products', 'WelcomeController@all_products');
Route::get('all_products/category/{cat_id}', 'HomeController@fetch_categories');
Route::get('all_products/sub-category/{cat_id}', 'HomeController@fetch_sub_categories');
Route::get('product/{slug}', 'HomeController@productDetail');



Route::get('cart','CartController@index'); 
Route::post('add-to-cart','CartController@addToCart');
Route::post('add-to-wishlist','CartController@addToWishList');
Route::get('contact', 'PageController@contact');
Route::post('subscribeNewsLetter','WelcomeController@subscribeNewsLetter');
Route::post('saveContact','WelcomeController@saveContact');
Auth::routes();
Route::post('fetchProducts','WelcomeController@fetchProducts');
//Order
Route::post('placeOrder','PaymentController@placeOrder')->name('checkout.placeorder');
Route::post('oldPlaceOrder','PaymentController@oldPlaceOrder');
Route::get('thankyou','PaymentController@thankyou');
Route::get('checkouts','CartController@direct_checkout');
Route::post('order_success','PaymentController@order_success');
//Order
Route::post('updatecartqty','CartController@cartqtyupdate')->name('user.cart_qty');
Route::get('cart/delete_item/{cart_id}','CartController@delete_cart_item');
Route::post('orders_checkout','CartController@showCheckout')->name('order_checkout');
Route::get('checkout/{order_id}','PaymentController@get_order_details');
Route::get('delete_item/{id}','WelcomeController@deleteWishList');
Route::get('delWishlist/{id}/session_id/{session_id}','CartController@deleteWishList');
Route::get('addtocart-wishlist/{id}','CartController@addtoCartWishlist');
Route::post('applyCoupon','PaymentController@applyCoupon');
Route::get('delCoupon/{session_id}','PaymentController@removeCoupon');
Route::post('checkPincode','CartController@checkPincode');
Route::get('delPincode/{session_id}','CartController@delPincode');


Route::get('/home', 'WelcomeController@welcome')->name('home');
Route::post('checkEmail','Auth\RegisterController@checkEmail');
Route::post('checkPhone','Auth\RegisterController@checkPhone');
Route::get('admin/login','Admin\LoginController@showLoginForm');
Route::post('admin/login','Admin\LoginController@login');
Route::get('account','UserController@myprofile')->middleware('auth');
Route::post('user/updateAccount','UserController@updateAccount')->middleware('auth');
Route::post('user/updateAddress','UserController@updateAddress');
Route::post('user/updatePassword','UserController@updatePassword')->middleware('auth');
Route::get('user/order','UserController@orderDetails');
Route::get('cancel_order/{order_id}','PaymentController@cancel_order');
Route::group(['prefix'=>'admin'], function(){
	Route::middleware([SuperAdmin::class])->group(function () {
        Route::resources([
            'pincodes' => 'Admin\PincodeController',
            'customers' => 'Admin\CustomerController',
            'banners' => 'Admin\BannerController',
            'category' => 'Admin\CategoryController',
            'subcategory' => 'Admin\SubcategoryController',
            'coupons' => 'Admin\CouponsController',
            'products' => 'Admin\ProductController',
            'sizes' => 'Admin\SizeController',
            'colors' => 'Admin\ColorController',
            'flash' => 'Admin\FlashsaleController',
            'faqs' => 'Admin\FaqController',
        ]);
        Route::get('dealership-bookings','Admin\HomeController@dealershipBooking');
        Route::get('corporate-enquiry','Admin\HomeController@corporateEnquiry');
        Route::post('deleteDealership','Admin\HomeController@deleteDealership');
        Route::post('deleteCorporate','Admin\HomeController@deleteCorporate');
        Route::get('uploadPincode','Admin\PincodeController@uploadPincode');
        Route::post('bulkuploadPincode','Admin\PincodeController@bulkuploadPincode');
        Route::get('order','Admin\OrderController@orderDetail');
        Route::get('orders','Admin\OrderController@orders');
        Route::post('changeOrderStatus','Admin\OrderController@changeOrderStatus');
    	Route::get('home','Admin\HomeController@index')->name('adminHome');
    	Route::post('logout','Admin\LoginController@logout')->name('adminLogout');
        Route::get('newsletter','Admin\HomeController@newsletter');
        Route::post('deleteNewsLetter','Admin\HomeController@deleteNewsLetter');
        Route::get('contacts','Admin\HomeController@contacts');
        Route::post('deleteContacts','Admin\HomeController@deleteContacts');
		Route::get('orders/{types}','Admin\OrderController@get_order_types');
        Route::group(['prefix'=>'products'], function(){
            Route::post('addMoreImages','Admin\ProductController@addMoreImages');
            Route::post('makeFeatureImage','Admin\ProductController@makeFeatureImage');
            Route::post('delete-multiple-image','Admin\ProductController@deleteMultipleImages');
        });
	});
});
