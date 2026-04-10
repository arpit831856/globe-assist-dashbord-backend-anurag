<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\admin\ManageAdminController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\AddLinkController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\User\AuthController as UserAuth;
use App\Http\Controllers\Partner\AuthController as PartnerAuth;
use App\Http\Controllers\Partner\PartnerDashboardController as PartnerDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Website\SupportController;

// web routes

Route::get('/', function () {
    return view('web.home');
});

Route::get('/how-it-works', function () {
    return view('web.how-it-works');
})->name('web.how-it-works');

Route::get('/about', function () {
    return view('web.about');
})->name('web.about');

Route::get('/services', function () {
    return view('web.services');
})->name('web.services');

Route::get('/help&support', function () {
    return view('admin.helpsupport');
})->name('web.helpsupport');

Route::get('/paymentstatus', function () {
    return view('admin.paymentstatus');
})->name('web.paymentstatus');

Route::get('/paymenthistory', function () {
    return view('admin.paymenthistory');
})->name('web.paymenthistory');

Route::get('/complaints', function () {
    return view('admin.complaints');
})->name('web.complaints');

Route::get('/enquiry', function () {
    return view('admin.enquiry');
})->name('web.enquiry');

Route::get('/websupport', [SupportController::class, 'index'])
    ->name('web.support');


Route::get('/support', [SupportController::class, 'index'])
    ->name('website.support');


Route::get('/partner-page', function () {
    return view('web.partner');
})->name('partner.create');

Route::get('/user-page', function () {
    return view('web.user');
})->name('user.create');


Route::get('/privacy-policy', function () {
    return view('web.privacy-policy');
})->name('web.privacy-policy');

Route::get('/terms-and-conditions', function () {
    return view('web.terms&condition');
})->name('web.terms&condition');


Route::post('/contact/store', [ContactController::class, 'store'])->name('web.contact.store');
// Admin: View contact submissions
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');





Route::prefix('admin')->group(function () {

    Route::middleware(['auth:admin'])->group(function () {

        // Change Password Routes
        Route::post('/change-password', [AdminAuthController::class, 'changePassword'])->name('admin.change.password');

        Route::get('/dashboard', [DashboardController::class, 'apiDashboard'])->name('dashboard');
        // Users API routes
        Route::get('/users', [UserController::class, 'getallusers']);
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::put('/users/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/logout', function () {
            Auth::guard('admin')->logout();
            // return redirect('/admin/login');
        })->name('admin.logout');

        // Route::post('admin/logout', [AdminAuth::class, 'logout'])->name('admin.logout');


        //partner route
        Route::get('/partner', [PartnerController::class, 'index'])->name('partner.index');
        Route::get('/partner/{partner}', [PartnerController::class, 'show']);
        Route::put('/admin/partners/update', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::delete('/partner/{partner}', [PartnerController::class, 'destroy'])->name('partner.destroy');


        // Manage Admin Routes
        Route::get('/manage-admin', [ManageAdminController::class, 'index'])->name('manage_admin.index');
        Route::get('/manage-admin/create', [ManageAdminController::class, 'create'])->name('manage_admin.create');
        Route::post('/manage-admin/store', [ManageAdminController::class, 'store'])->name('manage_admin.store');
        Route::get('/manage-admin/edit/{id}', [ManageAdminController::class, 'edit'])->name('manage_admin.edit');
        Route::put('/manage-admin/update/{id}', [ManageAdminController::class, 'update'])->name('manage_admin.update');

        Route::delete('/manage-admin/delete/{id}', [ManageAdminController::class, 'destroy'])->name('manage_admin.destroy');
        Route::post('/manage-admin/export', [ManageAdminController::class, 'export'])->name('manage_admin.export');

        Route::get('/add-links', [AddLinkController::class, 'index'])->name('add_links.index');
        Route::post('/add-links/store', [AddLinkController::class, 'store'])->name('add_links.store');
        Route::post('/add-links/update/{addLink}', [AddLinkController::class, 'update'])->name('add_links.update');
        Route::delete('/add-links/delete/{addLink}', [AddLinkController::class, 'destroy'])->name('add_links.delete');
    });

    // Role Management Routes
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('/{id}', [RoleController::class, 'show'])->name('show'); // For AJAX
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
        Route::get('/export', [RoleController::class, 'export'])->name('export');
    });

    // FAQ List Page
    Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
    // Store new FAQ
    Route::post('faqs/store', [FaqController::class, 'store'])->name('faqs.store');
    // Edit form 
    Route::get('faqs/edit/{faq}', [FaqController::class, 'edit'])->name('faqs.edit');
    // Update existing FAQ
    Route::post('faqs/update/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    // Delete FAQ
    Route::delete('faqs/delete/{faq}', [FaqController::class, 'destroy'])->name('faqs.delete');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/store', [NotificationController::class, 'store'])->name('notifications.store');
    Route::post('/admin/notifications/store', [NotificationController::class, 'nstore'])->name('admin.notifications.store');
    Route::get('/notifications/resend/{id}', [NotificationController::class, 'resend'])->name('notifications.resend');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::post('/manage-customer/export', [NotificationController::class, 'export'])->name('manage_customer.export');

});

Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');

Route::get('/admin/export', [UserController::class, 'export'])->name('users.export');

Route::get('/admin/partners/export', [PartnerController::class, 'export'])->name('partner.export');


Route::get('/admin/get-recipients/{type}', [NotificationController::class, 'getRecipients']);



// User Routes
Route::prefix('user')->name('user.')->group(function () {
    Route::post('/users/store', [UserController::class, 'registerstore'])->name('store');

});

Route::post('partner/logout', [PartnerAuth::class, 'logout'])->name('partner.logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/web/user_home', [UserDashboardController::class, 'index'])->name('user_home');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'apiDashboard'])->name('admin.dashboard');
});

Route::middleware('auth:user')->group(function () {
});

    Route::get('/home', [UserDashboardController::class, 'index'])->name('user.home');

Route::middleware('auth:partner')->group(function () {
    Route::get('/partner/home', [PartnerDashboard::class, 'index'])->name('partner.home');
    Route::get('/partner/dashboard', [PartnerDashboard::class, 'dashboard'])->name('partner.dashboard');
    Route::get('/partner/show-links', [PartnerDashboard::class, 'showLinks'])->name('partner.show-links');
    Route::get('/partner/my-service', [PartnerDashboard::class, 'services'])->name('partner.services');
    Route::get('/partner/timeSlot', [PartnerDashboard::class, 'timeSlot'])->name('partner.timeSlot');
    Route::get('/partner/notifications', [PartnerDashboard::class, 'notifications'])->name('partner.notifications');
    Route::get('/partner/complaints', [PartnerDashboard::class, 'complaints'])->name('partner.complaints');
    Route::get('/partner/services-history', [PartnerDashboard::class, 'serviceHistory'])->name('partner.serviceHistory');
    Route::get('/partner/payments', [PartnerDashboard::class, 'payments'])->name('partner.payments');
    Route::get('/partner/help', [PartnerDashboard::class, 'help'])->name('partner.help');

});
