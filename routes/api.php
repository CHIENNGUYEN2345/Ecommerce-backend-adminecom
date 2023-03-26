<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FavouriteController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\ResetController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/getvisitor', [VisitorController::class, 'GetVisitorDetails']);

//all category
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);

//product list
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'ProductListByRemark']);

//
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'ProductListByCategory']);

Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'ProductListBySubCategory']);

Route::get('/allslider', [SliderController::class, 'AllSlider']);

//product details
Route::get('/productdetails/{id}', [ProductDetailsController::class, 'ProductDetails']);

//visitor
Route::get('/getvisitor', [VisitorController::class, 'GetVisitorDetails']);

Route::post('/postcontact', [ContactController::class, 'PostContactDetails']);

//site info
Route::get('/allsiteinfo', [SiteInfoController::class, 'AllSiteInfo']);

//noti
Route::get('/notification', [NotificationController::class, 'NotificationHistory']);

//search
Route::get('/search/{key}', [ProductListController::class, 'ProductBySearch']);

//Login routes
Route::post('/login',[AuthController::class,'Login']);

//Register
Route::post('/register',[AuthController::class,'Register']);

//Forget Pass
Route::post('/forgetpassword',[ForgetController::class,'ForgetPassword']);

//Reset Pass
Route::post('/resetpassword',[ResetController::class,'ResetPassword']);

//Current user controller
Route::get('/user',[UserController::class,'User'])->middleware('auth:api');

//similar product
Route::get('/similar/{subcategory}',[ProductListController::class,'SimilarProduct']);

// //review
// Route::get('/reviewlist/{id}',[ProductReviewController::class,'ReviewList']);

//add to cart activity
Route::post('/addtocart',[ProductCartController::class,'addToCart']);

//cart count
Route::get('/cartcount/{product_code}',[ProductCartController::class,'CartCount']);
//fav
Route::get('/favourite/{product_code}/{email}',[FavouriteController::class,'AddFavourite']);

//fav list
Route::get('/favouritelist/{email}',[FavouriteController::class,'FavouriteList']);
//fav delete
Route::get('/favouriteremove/{product_code}/{email}',[FavouriteController::class,'FavouriteRemove']);
//cart list
Route::get('/cartlist/{email}',[ProductCartController::class,'CartList']);
//remove cart item in list
Route::get('/removecartlist/{id}',[ProductCartController::class,'RemoveCartList']);
//plus-minus in cart
Route::get('/cartitemplus/{id}/{quantity}/{price}',[ProductCartController::class,'CartItemPlus']);
Route::get('/cartitemminus/{id}/{quantity}/{price}',[ProductCartController::class,'CartItemMinus']);

//cart order route
Route::post('/cartorder',[ProductCartController::class,'CartOrder']);
//order list by user
Route::get('/orderlistbyuser/{email}',[ProductCartController::class,'OrderListByUser']);

//post product review route
Route::post('/postreview',[ProductReviewController::class,'PostReview']);

//review product route
Route::get('/reviewlist/{product_code}',[ProductReviewController::class,'ReviewList']);