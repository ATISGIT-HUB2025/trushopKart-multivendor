<?php
use App\Http\Controllers\Backend\AbountController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\AnnouncementController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogCommentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\LicensingAgreementController;
use App\Http\Controllers\Backend\AwardsController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\PressReleaseController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CenterController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\ComplaintController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\ExamCenterListController;
use App\Http\Controllers\Backend\DistrictListController;
use App\Http\Controllers\Backend\DivisionListController;
use App\Http\Controllers\Backend\StateListController;
use App\Http\Controllers\Backend\TalukaListController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\EventParticipationController;
use App\Http\Controllers\Backend\ExamCategoryController;
use App\Http\Controllers\Backend\ExamController;
use App\Http\Controllers\Backend\CenterHadController;
use App\Http\Controllers\Backend\StandardController;
use App\Http\Controllers\Backend\PackagePriceController;
use App\Http\Controllers\Backend\ExamQuestionController;
use App\Http\Controllers\Backend\ExamQuestionSectionController;
use App\Http\Controllers\Backend\ExamResultController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\GrandChildCategoryController;
use App\Http\Controllers\Backend\HelpInquiryController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OnlineTestController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RazorpaySettingController;
use App\Http\Controllers\Backend\ResultController;
use App\Http\Controllers\Backend\AdminResultController;
use App\Http\Controllers\Backend\MeritLIstRankController;
use App\Http\Controllers\Backend\SchoolInfoController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\StudentAccountController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
use App\Http\Controllers\Frontend\AdmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminAccessManagementController;
use App\HTTP\Controllers\Backend\MasterInfoController;
use App\HTTP\Controllers\Backend\PartnerRequestController;


/** Admin Routes */

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');
Route::get('mpoints-purchase', [AdminController::class, 'mpoint_purchase'])->name('pruchasepoints');
Route::post('updatempoint-detail', [AdminController::class, 'updatempointdetail'])->name('updatempointdetail');
Route::get('mreward/transaction/{id}', [AdminController::class, 'mreward_transaction'])->name('mreward.transaction');
Route::get('mreward_approve/{id}', [AdminController::class, 'mreward_approve'])->name('mreward.approve');
Route::get('mreward_reject/{id}', [AdminController::class, 'mreward_reject'])->name('mreward.reject');

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

/** Slider Route */
Route::resource('slider', SliderController::class);


Route::get('exam-results', [ExamResultController::class, 'index'])->name('exam-results.index');
Route::get('exam-results/export', [ExamResultController::class, 'export'])->name('exam-results.export');


// exam category  


// Add this inside your admin route group
Route::resource('exam-category', ExamCategoryController::class);

Route::resource('exam', ExamController::class);
Route::resource('center-had', CenterHadController::class);
Route::resource('standard', StandardController::class);
Route::resource('package-price', PackagePriceController::class);
Route::resource('exam-question', ExamQuestionController::class);
Route::resource('exam-section', ExamQuestionSectionController::class);

Route::get('exam/{id}/preview', [ExamController::class, 'preview'])->name('exam.preview');


Route::put('announcements/change-status', [AnnouncementController::class, 'changeStatus'])->name('announcements.change-status');
Route::resource('announcements', AnnouncementController::class);


/** Category Route */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);
/** Sub Category Route */
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);
/** Child Category Route */
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** Grand Child Category Route */
Route::put('grand-child-category/change-status', [GrandChildCategoryController::class, 'changeStatus'])->name('grand-child-category.change-status');
Route::get('get-child-categories', [GrandChildCategoryController::class, 'getChildCategories'])->name('get-child-categories');
Route::resource('grand-child-category', GrandChildCategoryController::class);


/** Brand routes */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** Vendor Profile routes */
Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Products routes */
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');

Route::match(['get', 'post'], 'products/keys/{id}', [ProductController::class, 'productKeys'])->name('product.get-keys');
Route::match(['get', 'post'], 'product-key-edit/{id}', [ProductController::class, 'product_key_edit'])->name('product_key_edit');
Route::match(['get', 'post'], 'product-key-delete/{id}', [ProductController::class, 'product_key_delete'])->name('product_key_delete');


Route::resource('products', ProductController::class);


/** Products image gallery route */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/** Products variant route */
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/** Products variant item route */
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');

Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [ProductVariantItemController::class, 'chageStatus'])->name('products-variant-item.chages-status');

/** reviews routes */
Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
Route::put('reviews/change-status', [AdminReviewController::class, 'changeStatus'])->name('reviews.change-status');

/** Seller product routes */
Route::get('seller-products', [SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');

/** Flash Sale Routes */
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'chageShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destory'])->name('flash-sale.destory');

/** Coupon Routes */
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);




/** Coupon Routes */
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/** Order routes */
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');

Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');

Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');
Route::resource('order', OrderController::class);

/** Order Transaction route */
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');


/** settings routes */
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('generale-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('generale-setting-update');
Route::put('email-setting-update', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting-update');
Route::put('logo-setting-update', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting-update');



/** home page setting route */
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');

Route::put('product-slider-section-one', [HomePageSettingController::class, 'updateProductSliderSectionOn'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

/** Blog routes */
Route::put('blog-category/status-change', [BlogCategoryController::class, 'changeStatus'])->name('blog-category.status-change');
Route::resource('blog-category', BlogCategoryController::class);

Route::put('events/change-status', [EventController::class, 'changeStatus'])->name('events.change-status');
Route::resource('events', EventController::class);


Route::put('blog/status-change', [BlogController::class, 'changeStatus'])->name('blog.status-change');
Route::post('awards/change-status', [AwardsController::class, 'changeStatus'])->name('awards.change-status');
Route::post('certificate/change-status', [CertificateController::class, 'changeStatus'])->name('certificate.change-status');
Route::post('pressrelease/change-status', [PressReleaseController::class, 'changeStatus'])->name('pressrelease.change-status');
Route::post('photogallery/change-status', [PhotoGalleryController::class, 'changeStatus'])->name('photogallery.change-status');
Route::post('licensingagreements/change-status', [LicensingAgreementController::class, 'changeStatus'])->name('licensingagreements.change-status');

Route::resource('blog', BlogController::class);
Route::resource('awards', AwardsController::class);
Route::resource('certificates', CertificateController::class);
Route::resource('pressrelease', PressReleaseController::class);
Route::resource('photo-gallery', PhotoGalleryController::class);
Route::resource('licensingagreements', LicensingAgreementController::class);

Route::get('blog-comments', [BlogCommentController::class, 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destory', [BlogCommentController::class, 'destory'])->name('blog-comments.destory');


/** Subscribers route */
Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index');
Route::delete('subscribers/{id}', [SubscribersController::class, 'destory'])->name('subscribers.destory');
Route::post('subscribers-send-mail', [SubscribersController::class, 'sendMail'])->name('subscribers-send-mail');

// online test

Route::resource('online-test', OnlineTestController::class);

/** Advertisement Routes */
Route::get('advertisement', [AdvertisementController::class, 'index'])->name('advertisement.index');
Route::put('advertisement/homepage-banner-secion-one', [AdvertisementController::class, 'homepageBannerSecionOne'])->name('homepage-banner-secion-one');
Route::put('advertisement/homepage-banner-secion-two', [AdvertisementController::class, 'homepageBannerSecionTwo'])->name('homepage-banner-secion-two');
Route::put('advertisement/homepage-banner-secion-three', [AdvertisementController::class, 'homepageBannerSecionThree'])->name('homepage-banner-secion-three');
Route::put('advertisement/homepage-banner-secion-four', [AdvertisementController::class, 'homepageBannerSecionFour'])->name('homepage-banner-secion-four');
Route::put('advertisement/productpage-banner', [AdvertisementController::class, 'productPageBanner'])->name('productpage-banner');
Route::put('advertisement/cartpage-banner', [AdvertisementController::class, 'cartPageBanner'])->name('cartpage-banner');

/** Vendor request routes */
Route::get('vendor-requests', [VendorRequestController::class, 'index'])->name('vendor-requests.index');
Route::get('vendor-requests/{id}/show', [VendorRequestController::class, 'show'])->name('vendor-requests.show');
Route::put('vendor-requests/{id}/change-status', [VendorRequestController::class, 'changeStatus'])->name('vendor-requests.change-status');
//partner request
Route::get('partner-requests', [PartnerRequestController::class, 'index'])->name('partner-requests.index');
Route::post('/request-access/update-status/{id}', [PartnerRequestController::class, 'updateStatus']);


Route::get('help-inquiries', [HelpInquiryController::class, 'index'])->name('help-inquiries.index');
Route::get('help-inquiries/{helpInquiry}', [HelpInquiryController::class, 'show'])->name('help-inquiries.show');

Route::get('students-account', [StudentAccountController::class, 'index'])->name('students-account.index');
Route::get('students-account/{bankAccount}', [StudentAccountController::class, 'show'])->name('student-accounts.show');

Route::get('all-student', [StudentAccountController::class, 'allStudent'])->name('all-student');



Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints.index');
Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
Route::put('complaints/{complaint}/update-status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');


// Event participation routes
Route::get('event-participations', [EventParticipationController::class, 'index'])->name('event-participations.index');
Route::get('event-participations/{eventParticipation}', [EventParticipationController::class, 'show'])->name('event-participations.show');
Route::put('event-participations/{eventParticipation}/update-status', [EventParticipationController::class, 'updateStatus'])->name('event-participations.update-status');


/** coustomer list routes */
Route::get('customer', [CustomerListController::class, 'index'])->name('customer.index');
Route::put('customer/status-change', [CustomerListController::class, 'changeStatus'])->name('customer.status-change');

/** exam center */
Route::get('exam-center', [ExamCenterListController::class, 'index'])->name('exam.center.index');
Route::post('exam-center/status-change', [ExamCenterListController::class, 'changeStatus'])->name('exam.center.status-change');

/** district */
Route::get('district', [DistrictListController::class, 'index'])->name('district.index');
Route::post('district/status-change', [DistrictListController::class, 'changeStatus'])->name('district.status-change');

/** division */
Route::get('division', [DivisionListController::class, 'index'])->name('division.index');
Route::post('division/status-change', [DivisionListController::class, 'changeStatus'])->name('division.status-change');

/** state */
Route::get('state', [StateListController::class, 'index'])->name('state.index');
Route::post('state/status-change', [StateListController::class, 'changeStatus'])->name('state.status-change');

/** taluka */
Route::get('taluka', [TalukaListController::class, 'index'])->name('taluka.index');
Route::post('taluka/status-change', [TalukaListController::class, 'changeStatus'])->name('taluka.status-change');

/** coustomer list routes */
Route::get('admin-list', [AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change', [AdminListController::class, 'changeStatus'])->name('admin-list.status-change');
Route::delete('admin-list/{id}', [AdminListController::class, 'destory'])->name('admin-list.destory');


/** manage user routes */
Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user', [ManageUserController::class, 'create'])->name('manage-user.create');

Route::prefix('vendor/transactions/{vendor}')->group(function () {
    Route::post('/list', [VendorListController::class, 'fetch_transactions']);
    Route::post('/add', [VendorListController::class, 'store_transaction']);
});

Route::get('vendor-list', [VendorListController::class, 'index'])->name('vendor-list.index');
Route::get('vendor-view/{vendorid}', [VendorListController::class, 'viewVendorInfo'])->name('vendor-list.show');

Route::post('vendor/{vendor}/sales-overview', [VendorListController::class, 'vendorSalesOverview']);

Route::put('vendor-list/status-change', [VendorListController::class, 'changeStatus'])->name('vendor-list.status-change');

Route::get('vendor-condition', [VendorConditionController::class, 'index'])->name('vendor-condition.index');
Route::put('vendor-condition/update', [VendorConditionController::class, 'update'])->name('vendor-condition.update');

/** about routes */
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::get('shop-story', [AboutController::class, 'shop_story'])->name('shop.story');
Route::put('shopstory/update', [AboutController::class, 'shop_story_update'])->name('shop.story.update');
Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
/** terms and conditons routes */
Route::get('terms-and-conditions', [TermsAndConditionController::class, 'index'])->name('terms-and-conditions.index');
Route::put('terms-and-conditions/update', [TermsAndConditionController::class, 'update'])->name('terms-and-conditions.update');
Route::get('privacy-policy', [TermsAndConditionController::class, 'privacypolicy'])->name('privacypolicy');
Route::put('privacy-policy/update', [TermsAndConditionController::class, 'privacypolicyupdate'])->name('privacypolicyupdate.update');



/** footer routes */
Route::resource('footer-info', FooterInfoController::class);
Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');
Route::resource('footer-socials', FooterSocialController::class);

Route::put('footer-grid-two/change-status', [FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title', [FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
Route::resource('footer-grid-two', FooterGridTwoController::class);

Route::put('footer-grid-three/change-status', [FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title', [FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
Route::resource('footer-grid-three', FooterGridThreeController::class);

// center 
Route::resource('center', CenterController::class);
Route::resource('result', ResultController::class);
Route::resource('admin-result', AdminResultController::class);
Route::resource('merit-list-rank', MeritLIstRankController::class);
Route::post('admin-result-upload', [AdminResultController::class, 'uploadExcel'])->name('admin-result-upload');

// Make sure this is inside your admin route group
Route::get('merit-list', [ResultController::class, 'meritList'])->name('merit-list');
Route::get('admin-merit-list', [AdminResultController::class, 'meritList'])->name('admin-merit-list');
// Inside your admin route group

Route::post('generate-merit-list', [ResultController::class, 'generateMeritList'])->name('generate-merit-list');
Route::post('admin-generate-merit-list', [AdminResultController::class, 'generateMeritList'])->name('admin-generate-merit-list');


// Add these routes inside your admin route group
Route::get('merit-list/download/pdf', [ResultController::class, 'downloadMeritListPdf'])->name('merit-list.download.pdf');
Route::get('merit-list/download/excel', [ResultController::class, 'downloadMeritListExcel'])->name('merit-list.download.excel');
Route::get('merit-list/download/csv', [ResultController::class, 'downloadMeritListCsv'])->name('merit-list.download.csv');

//Admin Add these routes inside your admin route group
Route::get('admin-merit-list/download/pdf', [AdminResultController::class, 'downloadMeritListPdf'])->name('admin-merit-list.download.pdf');
Route::get('admin-merit-list/download/excel', [AdminResultController::class, 'downloadMeritListExcel'])->name('admin-merit-list.download.excel');
Route::get('admin-merit-list/download/csv', [AdminResultController::class, 'downloadMeritListCsv'])->name('admin-merit-list.download.csv');

// Add these routes inside your admin route group
Route::post('result/toggle-certificate-button', [ResultController::class, 'toggleCertificateButton'])->name('result.toggle-certificate-button');
Route::post('result/toggle-marksheet-button', [ResultController::class, 'toggleMarksheetButton'])->name('result.toggle-marksheet-button');

// Admin Add these routes inside your admin route group
Route::post('admin-result/toggle-certificate-button', [AdminResultController::class, 'toggleCertificateButton'])->name('admin-result.toggle-certificate-button');
Route::post('admin-result/toggle-marksheet-button', [AdminResultController::class, 'toggleMarksheetButton'])->name('admin-result.toggle-marksheet-button');


Route::delete('delete-all-result', [ResultController::class, 'deleteAll']);

Route::delete('admin-delete-all-result', [AdminResultController::class, 'deleteAll']);

Route::get('download-center-certificates/{center}', [ResultController::class, 'downloadCenterCertificates'])
    ->name('result.download-center');

Route::get('admin-download-certificates/{id}', [AdminResultController::class, 'downloadCenterCertificates'])
    ->name('result.download');


Route::resource('school-info', SchoolInfoController::class);
Route::delete('delete-all-schoolinfo', [SchoolInfoController::class, 'deleteAll']);
//Route::resource('master-info', MasterInfoController::class);
Route::get('master-info', [MasterInfoController::class, 'index'])->name('master-info');
Route::post('master-info-update', [MasterInfoController::class, 'update'])->name('master-info.update');

// admission 

Route::get('admissions/pending', [AdmissionController::class, 'pending'])->name('admission.pending');
Route::get('admissions/approved', [AdmissionController::class, 'approved'])->name('admission.approved');
Route::get('admissions/rejected', [AdmissionController::class, 'rejected'])->name('admission.rejected');
Route::get('admissions/{id}', [AdmissionController::class, 'show'])->name('admission.show');
Route::post('admissions/{id}/change-status', [AdmissionController::class, 'changeStatus'])->name('admission.change-status');

/** Payment settings routes */
Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
Route::resource('paypal-setting', PaypalSettingController::class);
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
Route::put('razorpay-setting/{id}', [RazorpaySettingController::class, 'update'])->name('razorpay-setting.update');
Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');

Route::prefix('access-management')->group(function () {
    Route::get('/', [AdminAccessManagementController::class, 'index'])->name('accessmanagement.index');
    Route::get('/create', [AdminAccessManagementController::class, 'create'])->name('accessmanagement.create');
    Route::post('/store', [AdminAccessManagementController::class, 'store'])->name('accessmanagement.store');
    Route::get('/edit/{id}', [AdminAccessManagementController::class, 'edit'])->name('accessmanagement.edit');
    Route::put('/update/{id}', [AdminAccessManagementController::class, 'update'])->name('accessmanagement.update');
    Route::delete('/destroy/{id}', [AdminAccessManagementController::class, 'destroy'])->name('accessmanagement.destroy');
});
 Route::get('school-for-visiting-get', [AdminController::class, 'schoolForVisitingGet'])->name('school-for-visiting.index');