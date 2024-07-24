<?php

use App\Models\Passedaway;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Qrcode;
use App\Models\UserQrcode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PassedawayController;
use App\Http\Controllers\UserQrcodeController;




// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', function () {
    $profile = null;
    if (isset($_GET['reference'])) {
        $qrcode = Qrcode::where('reference', $_GET['reference'])->first();
        $UserQrcode = UserQrcode::where('qrcode_id', $qrcode->id)->first();
        if ($UserQrcode) {
            $profile = Passedaway::where('user_id', $UserQrcode->user_id)->first();
            return Inertia::render('Site/Home', compact('profile'));
        }else{
            return Inertia::render('Site/Home', compact('profile'));
        }

    }
    return Inertia::render('Site/Home', compact('profile'));
})->name('home');
;
Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {
        $qrcodes = UserQrcode::with('qrcode')->where('user_id', '=', auth()->user()->id)->get();
        return Inertia::render('Site/Profile', compact('qrcodes'));
    })->name('customer.profile');


    Route::get('/qrcode_reference/{reference}', [UserQrcodeController::class, 'qrcode_reference'])->name('qrcode_reference');
    Route::post('link_qrcode', [UserQrcodeController::class, 'store'])->name('link_qrcode');



    Route::get('remember-me', [PassedawayController::class, 'index']);
    Route::post('remember-me/add', [PassedawayController::class, 'store'])->name('passedaway.profile.store');


    Route::post('/profile/update', [ProfileController::class, 'update_customer_profile'])->name('customer.profile.update');

});

Route::get('/link-qrcode', function () {
    return Inertia::render('Site/LinkQrcode');
})->name('LinkQrcode');



Route::get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/qr-code', [QrcodeController::class, 'index'])->name('qrcodes');
    Route::get('/qr-code/create', [QrcodeController::class, 'create'])->name('qrcodes.create');
    Route::post('/qr-code/store', [QrcodeController::class, 'store'])->name('qrcodes.store');
    Route::get('/qr-code/print', [QrcodeController::class, 'print_single'])->name('qrcodes.print_single');
    Route::get('/qr-code/delete/{id}', [QrcodeController::class, 'delete'])->name('qrcodes.delete');


    Route::get('/users', [Usercontroller::class, 'index'])->name('users');
    Route::get('/user/delete/{id}', [Usercontroller::class, 'delete'])->name('user.delete');

    Route::get('/userqrcode/{userid}', [UserQrcodeController::class, 'index'])->name('user.qrcode');
    Route::post('/user/assign/store', [UserQrcodeController::class, 'store'])->name('user.assign.store');
    Route::get('/userqrcode/delete/{id}', [UserQrcodeController::class, 'delete'])->name('user.qrcode.delete');



});

require __DIR__ . '/auth.php';
