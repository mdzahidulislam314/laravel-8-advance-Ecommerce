<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\InnerCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImgController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Site\UserProfileController;


Route::group(['prefix'=> 'admin', 'middleware' => ['admin:admin']], function (){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {

    return view('admin.index');

})->name('dashboard');

Route::group(['prefix'=> 'admin', 'middleware' => ['auth:sanctum,admin', 'verified']], function (){
    //profile
    Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('admin.update');
    Route::post('update-password', [ProfileController::class, 'updatePassword'])->name('admin.updatePass');

    //brand
    Route::get('brands/data', [BrandController::class, 'data'])->name('brands.data');
    Route::post('get/brands',[BrandController::class, 'getBrands'])->name('get.brands');
    Route::resource('brands', BrandController::class);
    //category
    Route::get('categories/data', [CategoryController::class, 'data'])->name('categories.data');
    Route::resource('categories', CategoryController::class);
    //Sub category
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/inner-category/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::get('sub-categories/data', [SubCategoryController::class, 'data'])->name('subcategories.data');
    Route::resource('subcategories', SubCategoryController::class);
    //Sub category
    Route::get('inner-categories/data', [InnerCategoryController::class, 'data'])->name('innercategories.data');
    Route::get('category/menus/',[InnerCategoryController::class,'getByCategory'])->name('get.submenus');
    Route::resource('innercategories', InnerCategoryController::class);
    //product
    Route::resource('products', ProductController::class);

    Route::post('product-images', [ProductImgController::class, 'altTempPimgUp'])->name('altTempPimgUp');
    Route::post('product-images-remove', [ProductImgController::class, 'altTempPimgRemove'])->name('altTempPimgRemove');
    Route::post('product-images-delete', [ProductImgController::class, 'deleteAltImgById'])->name('deleteAltImgById');

});


//front-end
Route::get('/', [HomeController::class, 'index'])->name('home');

//user profile
Route::post('/update-profile/{id}', [UserProfileController::class, 'updateProfile'])->name('udpate.profile');
Route::post('/update-password/{id}', [UserProfileController::class, 'updatePassword'])->name('udpate.password');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $users = Auth::user();
    return view('front-end.profile.index', compact('users'));
})->name('dashboard');
