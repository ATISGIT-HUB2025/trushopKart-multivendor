<?php

// use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DistrictHeadController;
use App\Http\Controllers\Backend\DivisionalHeadController;
use App\Http\Controllers\Backend\SubDistrictHeadController;
use App\Http\Controllers\Backend\TalukaHeadController;
use App\Http\Controllers\Backend\TalukaHeadVisitController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\CenterHedController;
use App\Http\Controllers\Backend\StateHedController;
use App\Http\Controllers\Backend\DivisionalHedController;
use App\Http\Controllers\Backend\StateHeadAccessManagementController;
use App\Http\Controllers\Backend\DivisionalHeadAccessManagementController;
use App\Http\Controllers\Backend\DistrictHeadAccessManagementController;
use App\Http\Controllers\Backend\SubDistrictHeadAccessManagementController;
use App\Http\Controllers\Frontend\AdmissionController;
use App\Http\Controllers\Frontend\AdmissionFormController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OnlineTestController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\HelpController;
use App\Http\Controllers\Frontend\MeritListController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\OnlineClassController;
use App\Http\Controllers\Frontend\Commoncontroller;
use App\Http\Controllers\Frontend\OnlineCourseController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\ResultController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\Userwalletcontroller;
use App\Http\Controllers\Frontend\UserAccountController;
use App\Http\Controllers\Frontend\UserApplycationController;
use App\Http\Controllers\Frontend\UserComplaintController;
use App\Http\Controllers\Frontend\UserEventParticipationController;
use App\Http\Controllers\Frontend\UserHallTicketController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserPaymentController;
use App\Http\Controllers\Frontend\UserResultsController;
use App\Http\Controllers\Frontend\UserVendorReqeustController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\RequestAccessController;
use App\Http\Controllers\Backend\DistrictHeadBulkImportController;
use App\Http\Controllers\Backend\StateHeadBulkImportController;
use App\Http\Controllers\Backend\DivisionHeadBulkImportController;
use App\Http\Controllers\Backend\SubDistrictHeadBulkImportController;
use App\Http\Controllers\Backend\TalukaBulkImportController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Test in a route
Route::get('/test-session', function() {
    Session::put('test', 'value');
    dd(Session::all(), Session::has('test'));
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');
Route::get('online-class', [OnlineClassController::class, 'index'])->name('online-class');
Route::get('event', [EventController::class, 'index'])->name('event');
Route::get('event/{id}/details', [EventController::class, 'details'])->name('event.details');


// --commonroutes 


Route::match(['get','post'],'send-otp-email', [Commoncontroller::class, 'send_otp_email'])->name('send_otp_email');
Route::match(['get','post'],'vendor-register', [Commoncontroller::class, 'vendor_register'])->name('vendor-register');
Route::match(['post'],'vendor-send-otp', [Commoncontroller::class, 'vendor_send_otp'])->name('vendor_send_otp');
Route::match(['post'],'vendor-verify-otp', [Commoncontroller::class, 'vendor_verify_otp'])->name('vendor_verify_otp');
Route::get('product', [Commoncontroller::class, 'products'])->name('products_front');
Route::get('online-store', [Commoncontroller::class, 'online_store'])->name('online_store_front');



    // Event participation routes
    Route::post('event/join', [EventController::class, 'joinEvent'])->name('event.join');


Route::get('help-center', [HelpController::class, 'index'])->name('help-center');
Route::post('help-inquiry', [HelpController::class, 'store'])->name('help.store');
//REQUEST ACCESS
Route::get('request-form', [RequestAccessController::class, 'showform'])->name('request_access');
Route::post('request-form-submit', [RequestAccessController::class, 'handleRequestForm'])->name('request_submit');

Route::get('result', [ResultController::class, 'index'])->name('result');
Route::get('result/pdf', [ResultController::class, 'downloadPDF'])->name('result.download');
Route::get('result/markshit', [ResultController::class, 'downloadmarkshit'])->name('result.markshit');


Route::get('merit-list', [MeritListController::class, 'index'])->name('merit-list');

Route::get('function', [OnlineClassController::class, 'index'])->name('function');
Route::get('online-class-details', [OnlineClassController::class, 'details'])->name('online-class-details');
Route::get('online-test', [OnlineTestController::class, 'index'])->name('online-test');
Route::get('/online-test-category/{category?}', [OnlineTestController::class, 'otCategory'])
    ->name('online-test-category');
Route::get('study-content', [OnlineTestController::class, 'studyContent'])->name('study-content');
Route::get('quiz-instraction', [OnlineTestController::class, 'quizInstraction'])->name('quiz-instraction');
Route::get('start-quiz', [OnlineTestController::class, 'startQuiz'])->name('start-quiz');
Route::get('quiz-instraction/{exam_id}', [OnlineTestController::class, 'quizInstraction'])->name('quiz-instraction ');
Route::get('start-quiz/{exam_id}', [OnlineTestController::class, 'startQuiz'])->name('start-quiz ');
Route::get('get-question/{question_id}', [OnlineTestController::class, 'getQuestion'])->name('get-question');
Route::post('submit-quiz', [OnlineTestController::class, 'submitQuiz'])->name('submit-quiz');
Route::get('quiz-result/{result}', [OnlineTestController::class, 'showResult'])->name('quiz-result');

Route::get('reexam-payment/{exam_id}', [PaymentController::class, 'reexamPayment'])->name('reexam.payment');
Route::post('reexam-razorpay-payment', [PaymentController::class, 'handleReexamPayment'])->name('reexam.razorpay.payment');


Route::get('test-summary', [OnlineTestController::class, 'testSummary'])->name('test-summary');

Route::get('view-quiz', [OnlineTestController::class, 'viewQuiz'])->name('view-quiz');
Route::get('category-membership', [OnlineTestController::class, 'categoryMembership'])->name('category-membership');
Route::get('membership', [OnlineTestController::class, 'membership'])->name('membership');

/** Product route */
Route::get('products', [FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}', [FrontendProductController::class, 'showProduct'])->name('product-detail');
Route::get('change-product-list-view', [FrontendProductController::class, 'chageListView'])->name('change-product-list-view');


/** Cart routes */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class, 'cartTotal'])->name('cart.sidebar-product-total');

Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');

/** Newsletter routes */

Route::post('newsletter-request', [NewsletterController::class, 'newsLetterRequset'])->name('newsletter-request');
Route::get('newsletter-verify/{token}', [NewsletterController::class, 'newsLetterEmailVarify'])->name('newsletter-verify');

/** vendor page routes */
Route::get('vendor', [HomeController::class, 'vendorPage'])->name('vendor.index');
Route::get('vendor-product/{id}', [HomeController::class, 'vendorProductsPage'])->name('vendor.products');

/** about page route */
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('shop-story', [PageController::class, 'shop_story'])->name('shop.story');
Route::get('awards', [PageController::class, 'awards'])->name('awards');
Route::get('certificates', [PageController::class, 'certificates'])->name('certificates');
Route::get('media-room', [PageController::class, 'media_room'])->name('media_room');
Route::get('privacy-policy', [PageController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('licensing-agreements', [PageController::class, 'licensing_agreements'])->name('licensing_agreements');
/** terms and conditions page route */
Route::get('terms-and-conditions', [PageController::class, 'termsAndCondition'])->name('terms-and-conditions');
Route::get('admission-conditions', [PageController::class, 'admissionCondition'])->name('admission-conditions');
Route::get('exam-category', [PageController::class, 'allExamCategoryView'])->name('exam-category');
Route::get('admission-form', [AdmissionFormController::class, 'admissionForm'])->name('admission-form');

Route::get('/get-districts/{division}', [AdmissionFormController::class, 'getDistricts']);
Route::get('/get-talukas/{district}', [AdmissionFormController::class, 'getTalukas']);
Route::get('/get-clusters/{taluka}', [AdmissionFormController::class, 'getClusters']);
Route::get('/get-schools/{cluster}', [AdmissionFormController::class, 'getSchools']);
Route::get('/get-udise/{cluster}', [AdmissionFormController::class, 'getUdise']);
Route::get('/get-village-towns/{udise}', [AdmissionFormController::class, 'getVillageTowns']);


// Route::get('type-of-admission', [PageController::class, 'typeOfExam'])->name('type-of-admission');
Route::match(['get', 'post'], 'type-of-admission', [PageController::class, 'typeOfExam'])->name('type-of-admission');
Route::post('set_discounted_total',[PageController::class, 'set_discounted_total'])->name('set_discounted_total');

/** contact route */
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('contact', [PageController::class, 'handleContactForm'])->name('handle-contact-form');
Route::get('recheck', [PageController::class, 'recheck'])->name('recheck');


Route::post('recheck-submit', [PageController::class, 'submitRecheck'])->name('recheck.submit');
Route::get('recheck-payment/handle', [PageController::class, 'handleRecheckPayment'])->name('recheck.payment.handle');
Route::get('recheck-success', [PageController::class, 'recheckSuccess'])->name('recheck.success');


Route::get('admission-success', [PageController::class, 'AdmissionSuccess'])->name('admission-success');

/** Product track route */
Route::get('product-traking', [ProductTrackController::class, 'index'])->name('product-traking.index');
Route::get('online-course', [OnlineCourseController::class, 'index'])->name('online-course.index');

/** blog routes */
Route::get('blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');

// Route::post('admission/store', [AdmissionController::class, 'store'])->name('admission.store');
Route::post('admission/store', [AdmissionController::class, 'store'])->name('admission.store');

Route::get('admission/payment', [AdmissionController::class, 'payment'])->name('admission.payment');
Route::get('admission-success', [AdmissionController::class, 'success'])->name('admission.success');

Route::post('razorpay/payment', [PaymentController::class, 'payWithRazorPay'])->name('razorpay.payment');

// Role-based dashboard routes

Route::middleware(['auth', 'role:taluka_head'])->group(function () {
    Route::resource('taluka/visits', TalukaHeadVisitController::class)->names([
        'index' => 'taluka.visit',
        'create' => 'taluka.visit.create',
        'store' => 'taluka.visit.store',
        'edit' => 'taluka.visit.edit',
        'update' => 'taluka.visit.update',
        'destroy' => 'taluka.visit.destroy',
    ]);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/divisional/dashboard', [DivisionalHeadController::class, 'index'])->middleware('role:divisional_head')->name('divisional.dashboard');

    Route::get('/district/dashboard', [DistrictHeadController::class, 'index'])->middleware('role:district_head')->name('district.dashboard');

    Route::get('/subdistrict/dashboard', [SubDistrictHeadController::class,'index'])->middleware('role:subdistrict_head')->name('subdistrict.dashboard');

    Route::get('/taluka/dashboard', [TalukaHeadController::class, 'index'])->middleware('role:taluka_head')->name('taluka.dashboard');

    Route::get('/taluka/admission', [TalukaHeadController::class, 'admission'])->middleware('role:taluka_head')->name('taluka.admission');
    Route::get('/taluka/bulkadmission', [TalukaHeadController::class, 'admissioncreate'])->middleware('role:taluka_head')->name('taluka.bulkadmission');
    Route::post('/taluka/bulkadmissionstore', [TalukaHeadController::class, 'admissionstore'])->middleware('role:taluka_head')->name('taluka.bulkadmission.store');
    Route::get('/taluka/bulkadmissionview/{id}', [TalukaHeadController::class, 'admissionview'])->middleware('role:taluka_head')->name('taluka.bulkadmission.view');
    Route::get('/taluka/bulkadmissionedit/{id}', [TalukaHeadController::class, 'admissionedit'])->middleware('role:taluka_head')->name('taluka.bulkadmission.edit');
    Route::put('/taluka/bulkadmissionupdate/{id}', [TalukaHeadController::class, 'admissionupdate'])->middleware('role:taluka_head')->name('taluka.bulkadmission.update');
    Route::delete('/taluka/bulkadmissiondelete/{id}', [TalukaHeadController::class, 'admissiondelete'])->middleware('role:taluka_head')->name('taluka.bulkadmission.delete');
});


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile'); // user.profile
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update'); // user.profile.update
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('application', [UserApplycationController::class, 'applycation'])->name('application');
    Route::get('transctions', [UserPaymentController::class, 'transctions'])->name('transctions');
    Route::get('application/download/{id}', [UserApplycationController::class, 'downloadPDF'])->name('application.download');

    // --wallet 

    Route::get('wallet', [Userwalletcontroller::class, 'wallet'])->name('wallet');
    Route::post('wallet-submit', [Userwalletcontroller::class, 'wallet_submit'])->name('wallet_submit');


    /** User Address Route */
    Route::resource('address', UserAddressController::class);
    Route::get('results/download/{id}', [UserResultsController::class, 'download'])->name('results.download');
    Route::get('hall-ticket/download/{id}', [UserHallTicketController::class, 'download'])->name('hall-ticket.download');

    // result route
    Route::get('complaints', [UserComplaintController::class, 'index'])->name('complaints.index');
    Route::post('complaints', [UserComplaintController::class, 'store'])->name('complaints.store');

    Route::get('events', [UserEventParticipationController::class, 'index'])->name('events.index');
    Route::delete('events/{id}/cancel', [UserEventParticipationController::class, 'cancel'])->name('events.cancel');

    Route::get('results', [UserResultsController::class, 'index'])->name('results.index');
    Route::get('account', [UserAccountController::class, 'index'])->name('account.index');
    Route::post('account/store', [UserAccountController::class, 'store'])->name('account.store');

    Route::get('results/certificate/{id}', [UserResultsController::class, 'downloadCertificate'])->name('results.certificate.download');

    Route::get('hall-ticket', [UserHallTicketController::class, 'index'])->name('hall-ticket.index');

    // Online test

    Route::get('online-test', [OnlineTestController::class, 'index'])->name('online-test.index');
    /** Order Routes */
    Route::get('share_earn', [UserOrderController::class, 'share_earn'])->name('share_earn');
    Route::post('send-referral', [UserOrderController::class, 'send_referral'])->name('send.referral');
    Route::get('orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/show/{id}', [UserOrderController::class, 'show'])->name('orders.show');

    /** Wishlist routes */
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('wishlist/add-product', [WishlistController::class, 'addToWishlist'])->name('wishlist.store');
    Route::get('wishlist/remove-product/{id}', [WishlistController::class, 'destory'])->name('wishlist.destory');

    Route::get('reviews', [ReviewController::class, 'index'])->name('review.index');

    /** Vendor request route */
    Route::get('vendor-request', [UserVendorReqeustController::class, 'index'])->name('vendor-request.index');
    Route::post('vendor-request', [UserVendorReqeustController::class, 'create'])->name('vendor-request.create');



    /** product review routes */
    Route::post('review', [ReviewController::class, 'create'])->name('review.create');

    /** blog comment routes */
    Route::post('blog-comment', [BlogController::class, 'comment'])->name('blog-comment');

    /** Checkout routes */
    Route::post('/store-product-session', [CheckOutController::class, 'store_product_session'])->name('store.product.session');
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');
    Route::post('checkout-redeem-preview', [CheckOutController::class, 'checkout_redeem_preview'])->name('checkout.redeem-preview');
    Route::post('checkout-redeem-referral', [CheckOutController::class, 'checkout_redeem_referral'])->name('checkout.redeem.referral');
    Route::post('saveneworder', [CheckOutController::class, 'saveneworder'])->name('checkout.saveneworder');
    Route::post('/checkout/price-preview', [CheckoutController::class, 'checkoutPricePreview'])->name('checkout.price.preview');

    /** Payment Routes */
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    /** Paypal routes */
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

    /** Stripe routes */
    Route::post('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');

    /** Razorpay routes */
    Route::post('razorpay/payment', [PaymentController::class, 'payWithRazorPay'])->name('razorpay.payment');

    /** COD routes */
    Route::get('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');

    Route::get('renew', [UserDashboardController::class, 'Renew'])->name('renew');
    Route::post('renew-data', [UserDashboardController::class, 'RenewData'])->name('renew-data');

});



Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'center_hed', 'as' => 'center_hed.'], function () {
    Route::get('dashboard', [CenterHedController::class, 'dashboard'])->name('dashbaord');
    Route::get('questions', [CenterHedController::class, 'questions'])->name('questions');
    Route::get('/exam-questions/pdf', [CenterHedController::class, 'generatePdf'])->name('exam.questions.pdf');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'state_head', 'as' => 'state_head.'], function () {
    Route::get('dashboard', [StateHedController::class, 'dashboard'])->name('dashbaord');
    Route::get('school-for-visiting-get', [StateHedController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');
    Route::get('school-for-visiting-create', [StateHedController::class, 'schoolForVisitingCreate'])->name('school-for-visiting.create');
    Route::post('school-for-visiting-store', [StateHedController::class, 'schoolForVisitingStore'])->name('school-for-visiting.store');

    Route::post('school-for-visiting-excel', [StateHedController::class, 'schoolForVisitingExcel'])->name('school-for-visiting.excel');

    Route::get('school-for-visiting-edit/{id}', [StateHedController::class, 'schoolForVisitingEdit'])->name('school-for-visiting.edit');
    Route::put('school-for-visiting-update/{id}', [StateHedController::class, 'schoolForVisitingUpdate'])->name('school-for-visiting.update');
    Route::delete('school-for-visiting-destroy/{id}', [StateHedController::class, 'schoolForVisitingDestroy'])->name('school-for-visiting.destroy');



    Route::prefix('access-management')->group(function () {
        Route::get('/', [StateHeadAccessManagementController::class, 'index'])->name('accessmanagement.index');
        Route::get('/create', [StateHeadAccessManagementController::class, 'create'])->name('accessmanagement.create');
        Route::post('/store', [StateHeadAccessManagementController::class, 'store'])->name('accessmanagement.store');
        Route::get('/edit/{id}', [StateHeadAccessManagementController::class, 'edit'])->name('accessmanagement.edit');
        Route::put('/update/{id}', [StateHeadAccessManagementController::class, 'update'])->name('accessmanagement.update');
        Route::delete('/destroy/{id}', [StateHeadAccessManagementController::class, 'destroy'])->name('accessmanagement.destroy');
    });

    Route::resource('bulk-admission', StateHeadBulkImportController::class);
    Route::get('generate-tickets', [StateHeadBulkImportController::class, 'generateTickets'])
    ->name('generate-tickets');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'divisional_head', 'as' => 'divisional_head.'], function () {
    Route::get('dashboard', [DivisionalHeadController::class, 'index'])->name('dashbaord');
    Route::get('school-for-visiting-get', [DivisionalHeadController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');
    Route::get('school-for-visiting-create', [DivisionalHeadController::class, 'schoolForVisitingCreate'])->name('school-for-visiting.create');
    Route::post('school-for-visiting-store', [DivisionalHeadController::class, 'schoolForVisitingStore'])->name('school-for-visiting.store');

    Route::post('school-for-visiting-excel', [DivisionalHeadController::class, 'schoolForVisitingExcel'])->name('school-for-visiting.excel');

    Route::get('school-for-visiting-edit/{id}', [DivisionalHeadController::class, 'schoolForVisitingEdit'])->name('school-for-visiting.edit');
    Route::put('school-for-visiting-update/{id}', [DivisionalHeadController::class, 'schoolForVisitingUpdate'])->name('school-for-visiting.update');
    Route::delete('school-for-visiting-destroy/{id}', [DivisionalHeadController::class, 'schoolForVisitingDestroy'])->name('school-for-visiting.destroy');

    
    Route::prefix('access-management')->group(function () {
        Route::get('/', [DivisionalHeadAccessManagementController::class, 'index'])->name('accessmanagement.index');
        Route::get('/create', [DivisionalHeadAccessManagementController::class, 'create'])->name('accessmanagement.create');
        Route::post('/store', [DivisionalHeadAccessManagementController::class, 'store'])->name('accessmanagement.store');
        Route::get('/edit/{id}', [DivisionalHeadAccessManagementController::class, 'edit'])->name('accessmanagement.edit');
        Route::put('/update/{id}', [DivisionalHeadAccessManagementController::class, 'update'])->name('accessmanagement.update');
        Route::delete('/destroy/{id}', [DivisionalHeadAccessManagementController::class, 'destroy'])->name('accessmanagement.destroy');
    });

    Route::resource('bulk-admission', DivisionHeadBulkImportController::class);
    Route::get('generate-tickets', [DivisionHeadBulkImportController::class, 'generateTickets'])
    ->name('generate-tickets');

});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'district', 'as' => 'district.'], function () {
    
    Route::get('school-for-visiting-get', [DistrictHeadController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');
    Route::get('school-for-visiting-create', [DistrictHeadController::class, 'schoolForVisitingCreate'])->name('school-for-visiting.create');
    Route::post('school-for-visiting-store', [DistrictHeadController::class, 'schoolForVisitingStore'])->name('school-for-visiting.store');

    Route::post('school-for-visiting-excel', [DistrictHeadController::class, 'schoolForVisitingExcel'])->name('school-for-visiting.excel');

    Route::get('school-for-visiting-edit/{id}', [DistrictHeadController::class, 'schoolForVisitingEdit'])->name('school-for-visiting.edit');
    Route::put('school-for-visiting-update/{id}', [DistrictHeadController::class, 'schoolForVisitingUpdate'])->name('school-for-visiting.update');
    Route::delete('school-for-visiting-destroy/{id}', [DistrictHeadController::class, 'schoolForVisitingDestroy'])->name('school-for-visiting.destroy');

    Route::prefix('access-management')->group(function () {
        Route::get('/', [DistrictHeadAccessManagementController::class, 'index'])->name('accessmanagement.index');
        Route::get('/create', [DistrictHeadAccessManagementController::class, 'create'])->name('accessmanagement.create');
        Route::post('/store', [DistrictHeadAccessManagementController::class, 'store'])->name('accessmanagement.store');
        Route::get('/edit/{id}', [DistrictHeadAccessManagementController::class, 'edit'])->name('accessmanagement.edit');
        Route::put('/update/{id}', [DistrictHeadAccessManagementController::class, 'update'])->name('accessmanagement.update');
        Route::delete('/destroy/{id}', [DistrictHeadAccessManagementController::class, 'destroy'])->name('accessmanagement.destroy');
    });

    Route::resource('bulk-admission', DistrictHeadBulkImportController::class);
    Route::get('generate-tickets', [DistrictHeadBulkImportController::class, 'generateTickets'])
    ->name('generate-tickets');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'subdistrict', 'as' => 'subdistrict.'], function () {
    
    Route::get('school-for-visiting-get', [SubDistrictHeadController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');
    Route::get('school-for-visiting-create', [SubDistrictHeadController::class, 'schoolForVisitingCreate'])->name('school-for-visiting.create');
    Route::post('school-for-visiting-store', [SubDistrictHeadController::class, 'schoolForVisitingStore'])->name('school-for-visiting.store');
    Route::post('school-for-visiting-excel', [SubDistrictHeadController::class, 'schoolForVisitingExcel'])->name('school-for-visiting.excel');

    Route::get('school-for-visiting-edit/{id}', [SubDistrictHeadController::class, 'schoolForVisitingEdit'])->name('school-for-visiting.edit');
    Route::put('school-for-visiting-update/{id}', [SubDistrictHeadController::class, 'schoolForVisitingUpdate'])->name('school-for-visiting.update');
    Route::delete('school-for-visiting-destroy/{id}', [SubDistrictHeadController::class, 'schoolForVisitingDestroy'])->name('school-for-visiting.destroy');

    
    Route::prefix('access-management')->group(function () {
        Route::get('/', [SubDistrictHeadAccessManagementController::class, 'index'])->name('accessmanagement.index');
        Route::get('/create', [SubDistrictHeadAccessManagementController::class, 'create'])->name('accessmanagement.create');
        Route::post('/store', [SubDistrictHeadAccessManagementController::class, 'store'])->name('accessmanagement.store');
        Route::get('/edit/{id}', [SubDistrictHeadAccessManagementController::class, 'edit'])->name('accessmanagement.edit');
        Route::put('/update/{id}', [SubDistrictHeadAccessManagementController::class, 'update'])->name('accessmanagement.update');
        Route::delete('/destroy/{id}', [SubDistrictHeadAccessManagementController::class, 'destroy'])->name('accessmanagement.destroy');
    });
    Route::resource('bulk-admission', SubDistrictHeadBulkImportController::class);
    Route::get('generate-tickets', [SubDistrictHeadBulkImportController::class, 'generateTickets'])
    ->name('generate-tickets');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'taluka', 'as' => 'taluka.'], function () {
    
    Route::get('school-for-visiting-get', [TalukaHeadController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');
    Route::get('school-for-visiting-create', [TalukaHeadController::class, 'schoolForVisitingCreate'])->name('school-for-visiting.create');
    Route::post('school-for-visiting-store', [TalukaHeadController::class, 'schoolForVisitingStore'])->name('school-for-visiting.store');
    Route::post('school-for-visiting-excel', [TalukaHeadController::class, 'schoolForVisitingExcel'])->name('school-for-visiting.excel');

    Route::get('school-for-visiting-edit/{id}', [TalukaHeadController::class, 'schoolForVisitingEdit'])->name('school-for-visiting.edit');
    Route::put('school-for-visiting-update/{id}', [TalukaHeadController::class, 'schoolForVisitingUpdate'])->name('school-for-visiting.update');
    Route::delete('school-for-visiting-destroy/{id}', [TalukaHeadController::class, 'schoolForVisitingDestroy'])->name('school-for-visiting.destroy');

    Route::resource('bulk-admission', TalukaBulkImportController::class);
    Route::get('generate-tickets', [TalukaBulkImportController::class, 'generateTickets'])
    ->name('generate-tickets');

});