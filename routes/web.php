<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UrlController;
use App\Models\Qr;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    if (Auth::user()) {
        $count = Url::where("user_id", Auth::user()->id)->count();
        return view('user.الرئيسية', compact('count'));
    }
    return view('user.الرئيسية');
});
Route::get('الرئيسية', [HomeController::class, 'home']);


//// Admin side
Route::middleware('isAdmin')->group(function () {
    // Site
    Route::controller(SiteController::class)->group(function () {
        // Site
        Route::get('admin/site', 'index')->name("site");
        // Add site name
        Route::post('admin/storeName', 'store')->name("storeName");
        // Update site name
        Route::put('admin/updateName/{id}', 'update')->name("updateName");
    });

    // Pages
    Route::controller(PageController::class)->group(function () {
        // All pages
        Route::get('admin/pages', 'index')->name('pages');
        // How to display Page
        Route::get('admin/showPages', 'show')->name('showPages');
        // Create page
        Route::get('admin/addPage', 'create')->name('addPage');
        // Add page
        Route::post('admin/storePage', 'store')->name('storePage');
        // Edit page
        Route::get('admin/edit/{page}', 'edit')->name('edit');
        // Update page name
        Route::post('admin/rename/{page}', 'update')->name('rename');
        // Delete page name
        Route::post('admin/deletePage/{page}', 'destroy')->name('deletePage');
        // Hide page
        Route::get('admin/hidePage/{page}', 'hidePage')->name('hidePage');
        // Show page
        Route::get('admin/showPage/{page}', 'showPage')->name('showPage');
    });

    // Users
    Route::controller(UserController::class)->group(function () {
        // All users
        Route::get("admin/users", "index")->name("users");
        // Show user
        Route::get("admin/showUser/{id}", "show")->name("showUser");
        // Edit page
        Route::get("admin/editUser/{id}", "edit")->name("editUser");
        // Update
        Route::put("admin/updateUser/{id}", "update")->name("updateUser");
        // Delete
        Route::delete("admin/deleteUser/{id}", "destroy")->name("deleteUser");

        /// Message
        // All messages
        Route::get("admin/messages", "messages")->name("messages");
        // Show message
        Route::get("admin/showMessage/{id}", "showMessage")->name("showMessage");
        // Delete message
        Route::delete("admin/deleteMessage/{id}", "deleteMessage")->name("deleteMessage");
    });

    // Ads
    Route::controller(AdsController::class)->group(function() {
        // All ads
        Route::get("admin/ads","index")->name("ads");
        // Add ads page
        Route::get("admin/addAds","create")->name("addAds");
        // Add ads
        Route::post("admin/storeAds","store")->name("storeAds");
        // Edit ads
        Route::get("admin/editAds/{id}","edit")->name("editAds");
        // Update ads
        Route::put("admin/updateAds/{id}","update")->name("updateAds");
        // Delete ads
        Route::delete("admin/deleteAds/{id}","destroy")->name("deleteAds");
    });
});


//// User side

// Url
Route::post('/shorten', [UrlController::class, 'store']);
Route::get('show/{shortUrl}', [UrlController::class, 'show']);

// QR
Route::get('codeQr', [QrCodeController::class, 'create'])->name('codeQr');
Route::post('generateQr', [QrCodeController::class, 'generate'])->name('generateQr');


// Pages
Route::get('عن الشركة', function () {
    return view("user.pages.عن الشركة");
});
Route::get('من نحن', function () {
    return view("user.pages.من نحن");
});
Route::get('السياسة و الخصوصية', function () {
    return view("user.pages.السياسة و الخصوصية");
});
Route::controller(ContactusController::class)->group(function() {
    // Show page
    Route::get('تواصل معنا','index')->name('تواصل معنا');
    // Send message
    Route::post('contactUs','store')->name('contactUs');
});


Route::get('/dashboard', function () {
    // $url = Url::where("user_id",Auth::user()->id)->get();
    // $Qr  = Qr::where("user_id",Auth::user()->id)->get();
    // return view('dashboard',compact("url","Qr"));
    return redirect()->back();
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
// Add dynamic Route
Route::get('/اختبار', function() {
        return view('user.pages.اختبار');
        });

Route::get('/مصطفى', function() {
        return view('user.pages.مصطفى');
        });
