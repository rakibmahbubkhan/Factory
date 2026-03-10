<?php

use App\Http\Controllers\Admin\ClientsFeedbackController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\HomeaboutController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\Admin\SliderController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Storage link alternative in cpanel
Route::get('/storage-link',function (){
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'storage';
    symlink($targetFolder,$linkFolder);
});


Route::get('/', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/machineries', [ProductController::class, 'index'])->name('machineries');
Route::get('/machine-detail', [ProductController::class, 'itemDetail'])->name('machine-detail');

Route::get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard')->middleware('isAdmin');

Route::get('/admin/home', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('Admin.pages.home')->middleware('isAdmin');
Route::resource('sliders', SliderController::class)->middleware('isAdmin');
Route::resource('homeabouts', HomeaboutController::class)->except(['show', 'destroy'])->middleware('isAdmin');
Route::resource('statistics', StatisticController::class)->middleware('isAdmin');

Route::resource('/products', AdminProductController::class);

Route::get('/admin/products', [AdminProductController::class, 'index'])->name('Admin.products')->middleware('isAdmin');
Route::resource('teams', TeamController::class)->middleware('isAdmin');
Route::get('/admin/teams', [TeamController::class, 'index'])->name('Admin.teams')->middleware('isAdmin');

Route::resource('clients-feedbacks', ClientsFeedbackController::class)->middleware('isAdmin');

Route::resource('/admin/about', \App\Http\Controllers\AboutController::class)->middleware('isAdmin');
Route::get('/admin/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('Admin.about')->middleware('isAdmin');

Route::resource('services', \App\Http\Controllers\ServiceController::class)->middleware('isAdmin');
Route::get('/admin/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('Admin.services')->middleware('isAdmin');

Route::resource('certificates', CertificateController::class)->middleware('isAdmin');
Route::get('/admin/certificates', [CertificateController::class, 'index'])->name('Admin.certificates')->middleware('isAdmin');


Route::resource('clients', \App\Http\Controllers\ClientController::class)->middleware('isAdmin');
Route::get('/admin/clients', [\App\Http\Controllers\ClientController::class, 'index'])->name('Admin.clients')->middleware('isAdmin');

Route::resource('news', NewsController::class);
Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/admin/news', [NewsController::class, 'index'])->name('Admin.news')->middleware('isAdmin');


//Route::resource('qualification', QualificationController::class)->except(['destroy', 'show'])->middleware('isAdmin');
Route::resource('qualification', QualificationController::class)->only([
    'create', 'edit', 'update', 'store', 'index'
])->middleware('isAdmin');

//Route::resource('setting', CompanyController::class)->middleware('isAdmin');
//Route::get('/admin/setting', [CompanyController::class, 'index'])->name('Admin.setting')->middleware('isAdmin');

Route::get('setting', [CompanyController::class, 'index'])->name('Admin.setting')->middleware('isAdmin');
Route::get('setting/create', [CompanyController::class, 'create'])->name('Admin.setting.create')->middleware('isAdmin');
Route::post('setting', [CompanyController::class, 'store'])->name('Admin.setting.store')->middleware('isAdmin');
Route::get('setting/{company}/edit', [CompanyController::class, 'edit'])->name('Admin.setting.edit')->middleware('isAdmin');
Route::put('setting/{company}', [CompanyController::class, 'update'])->name('Admin.setting.update')->middleware('isAdmin');

Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contacts', [ContactController::class, 'contact'])->name('Admin.contacts')->middleware('isAdmin');
Route::put('/admin/contacts/{contact}/status', [ContactController::class, 'updateStatus'])->name('Admin.contact.updateStatus')->middleware('isAdmin');
Route::get('/admin/contacts/{contact}/reply', [ContactController::class, 'replyForm'])->name('Admin.contact.replyForm')->middleware('isAdmin');
Route::post('/admin/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('Admin.contact.reply')->middleware('isAdmin');
Route::delete('/admin/contacts/{contact}', [ContactController::class, 'destroy'])->name('Admin.contact.destroy')->middleware('isAdmin');

Route::put('/products/{product}/description', [ProductController::class, 'updateDescription'])->name('products.update-description');














//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
