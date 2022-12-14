<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Các method thường được sử dụng trong router và đặt tên theo phương thức name()
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/add', [HomeController::class, 'add'])->name('add');
Route::post('/store', [HomeController::class, 'store'])->name('store.store')->middleware('auth.admin');
Route::put('/store', [HomeController::class, 'edit'])->name('store.edit');
Route::delete('/store', [HomeController::class, 'delete'])->name('store.delete');

// Chỉ định tới route nào đó
Route::redirect('/show-add', 'add');

// Nhóm các route lại với nhau
Route::middleware('auth.admin')->prefix('/admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    // Route có truyền id vào
    Route::get('/post/{id}', function ($id) {
        return "Post co id la: " . $id;
    });

    // Route không bắt buộc có truyền id vào
    Route::get('/food/{id?}', [HomeController::class, 'food']);

    // Lấy id và slug theo điều kiện where và biểu thức chính quy
    // Ví dụ: http://127.0.0.1:8000/admin/news/tin-tuc-moi-235.html
    // id la: 235
    // slug la: tin-tuc-moi
    Route::get('/news/{slug}-{id}.html', function ($slug = null, $id = null) {
        $content = 'id la: ' . $id . '<br>';
        $content .= 'slug la: ' . $slug;
        return $content;
    })->where(
        [
            'slug' => '[a-z-]+',
            'id' => '[0-9]+'
        ]
    )->name('admin.news');

    Route::middleware('auth.admin.product')->get('/products', function () {
        return 'product admin';
    });

    Route::get('/categories', function () {
        return 'categories admin';
    });
});

// Respone trả lại một đoạn json
Route::get('demo-response', function () {
    $contentArr = [
        'name' => 'NKH',
        'intern' => 'Dsoft',
        'academy' => 'BKDN'
    ];

    return $contentArr;
})->name('demoResponse');

Route::get('demo-response-2', function () {
    $title = 'Demo response';
    $number = 2;
    $response = response()
        ->view('home', compact('title', 'number'));
    return $response;
})->name('demoResponse.2');
