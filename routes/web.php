<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SpotFotoController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/beranda');
});

Route::view('/chatbot', 'chatbot')->name('chatbot');

Route::get('/beranda', [BerandaController::class, 'index'])->name('user.beranda.index');
Route::get('/kuliner/{id}', [KulinerController::class, 'show'])->name('user.kuliner.show');
Route::get('/spot-foto/{id}', [SpotFotoController::class, 'show'])->name('user.spot-foto.show');
Route::get('/event/{id}', [EventController::class, 'show'])->name('user.event.show');
Route::get('/award/{id}', [AwardController::class, 'show'])->name('user.award.show');

Route::get('/katalog/{table}', [CatalogController::class, 'index'])->name('user.katalog.index');

Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('user.feedback.create');
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('user.feedback.store');

Route::get('/payment/arrive/arrival', [PaymentController::class, 'arrival'])->name('payment.arrival');
Route::post('/payment/arrive/makeOrder', [PaymentController::class, 'makeOrder'])->name('payment.arrive.makeOrder');
Route::get('/payment/method/methodSelect', [PaymentController::class, 'methodSelect'])->name('payment.method.methodSelect');
Route::post('/payment/method/store', [PaymentController::class, 'methodStore'])->name('payment.method.store');
Route::get('/payment/bill/payment', [PaymentController::class, 'billPayment'])->name('payment.bill.payment');
Route::post('/payment/bill/store', [PaymentController::class, 'billStore'])->name('payment.bill.store');
Route::delete('/payment/bill/delete', [PaymentController::class, 'billDelete'])->name('payment.bill.delete');
Route::get('/payment/struck', [PaymentController::class, 'struck'])->name('payment.struck');
Route::get('/payment/struck/download/{id}', [PaymentController::class, 'downloadStruk'])->name('payment.struk.download');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('user.us.index');

// API Routes
Route::post('/api/chat', [ChatbotController::class, 'chat'])->name('api.chat');

// Admin
Route::prefix('admin')->group(function () {
    
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.auth.showLoginForm');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.auth.login');
    });

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Ticket Management Routes
        Route::resource('ticket', TicketController::class, [
            'names' => [
                'index' => 'admin.ticket.index',
                'create' => 'admin.ticket.create',
                'store' => 'admin.ticket.store',
                'show' => 'admin.ticket.show',
                'edit' => 'admin.ticket.edit',
                'update' => 'admin.ticket.update',
                'destroy' => 'admin.ticket.destroy',
            ]
        ]);
        
        // Export tickets
        Route::get('/ticket/export/csv', [TicketController::class, 'export'])->name('admin.ticket.export');
    });

});