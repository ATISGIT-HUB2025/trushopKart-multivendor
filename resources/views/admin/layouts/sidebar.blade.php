<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">{{ $settings->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">||</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashbaord') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="menu-header">Ecommerce</li>

            {{-- <li><a class="{{ setActive(['admin.accessmanagement.*']) }}" href="{{ route('admin.accessmanagement.index') }}"><i class="fas fa-users"></i> Access Management</a></li> --}}

            <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <!--<li class="{{ setActive(['admin.child-category.*']) }}"> <a class="nav-link"-->
                    <!--        href="{{ route('admin.child-category.index') }}">Child Category</a></li>-->
                    <!--<li class="{{ setActive(['admin.grand-child-category.*']) }}"> <a class="nav-link"-->
                    <!--        href="{{ route('admin.grand-child-category.index') }}">Grand Child Category</a></li>-->

                </ul>
            </li>


           

            <li
                class="dropdown {{ setActive([
                'admin.brand.*',
                'admin.products.*',
                'admin.products-image-gallery.*',
                'admin.products-variant.*',
                'admin.products-variant-item.*',
                'admin.seller-products.*',
                'admin.seller-pending-products.*',
            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li
                        class="{{ setActive([
                        'admin.products.*',
                        'admin.products-image-gallery.*',
                        'admin.products-variant.*',
                        'admin.products-variant-item.*',
                        'admin.reviews.*',
                    ]) }}">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                    </li>
                    <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                    <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

                    <li class="{{ setActive(['admin.reviews.*']) }}"><a class="nav-link"
                            href="{{ route('admin.reviews.index') }}">Product Reviews</a></li>

                </ul>
            </li>



            <li
                class="dropdown {{ setActive([

                    'admin.order.*',
                    'admin.pending-orders',
                    'admin.processed-orders',
                    'admin.dropped-off-orders',
                    'admin.shipped-orders',
                    'admin.out-for-delivery-orders',
                    'admin.delivered-orders',
                    'admin.canceled-orders',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"
                            href="{{ route('admin.order.index') }}">All Orders</a></li>
                    <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
                    <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.processed-orders') }}">All processed Orders</a></li>
                    <li class="{{ setActive(['admin.dropped-off']) }}"><a class="nav-link"
                            href="{{ route('admin.dropped-off-orders') }}">All Dropped Off Orders</a></li>

                    <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
                    <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.out-for-delivery-orders') }}">All Out For Delivery Orders</a></li>


                    <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.delivered-orders') }}">All Delivered Orders</a></li>

                    <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.canceled-orders') }}">All Canceled Orders</a></li>

                </ul>
            </li>

            <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                    href="{{ route('admin.transaction') }}"><i class="fas fa-money-bill-alt"></i> <span>Transactions</span></a>
            </li>

              <li class="{{ setActive(['admin.pruchasepoints']) }}"><a class="nav-link"
                    href="{{ route('admin.pruchasepoints') }}"><i class="fas fa-money-bill-alt"></i> <span>Mpoint Voucher</span></a>
            </li>

            <li
                class="dropdown {{ setActive([
                    'admin.vendor-profile.*',
                    'admin.coupons.*',
                    'admin.shipping-rule.*',
                    'admin.payment-settings.*',
                ]) }} d-none">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                    <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                    <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Payment Settings</a></li>

                </ul>
            </li>

            <li
                class="dropdown {{ setActive([
                    'admin.slider.*',
                    'admin.vendor-condition.index',
                    'admin.about.index',
                    'admin.terms-and-conditions.index',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                   <li class="{{ setActive(['admin.slider.index']) }}">
    <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
</li>

<li class="{{ setActive(['admin.home-page-setting']) }}">
    <a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a>
</li>

<li class="{{ setActive(['admin.vendor-condition.index']) }}">
    <a class="nav-link" href="{{ route('admin.vendor-condition.index') }}">Vendor Condition</a>
</li>

<li class="{{ setActive(['admin.about.index']) }}">
    <a class="nav-link" href="{{ route('admin.about.index') }}">About Page</a>
</li>

<li class="{{ setActive(['admin.shop.story']) }}">
    <a class="nav-link" href="{{ route('admin.shop.story') }}">Shop Story Page</a>
</li>

<li class="{{ setActive(['admin.terms-and-conditions.index']) }}">
    <a class="nav-link" href="{{ route('admin.terms-and-conditions.index') }}">Terms Page</a>
</li>

<li class="{{ setActive(['admin.privacypolicy']) }}">
    <a class="nav-link" href="{{ route('admin.privacypolicy') }}">Privacy Policy</a>
</li>


                </ul>
            </li>

            {{-- <li><a class="nav-link {{ setActive(['admin.advertisement.*']) }}"
                    href="{{ route('admin.advertisement.index') }}"><i class="fas fa-ad"></i>
                    <span>Advertisement</span></a></li> --}}

            <li
                class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i> <span>Manage Blog</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                    <li class="{{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blogs</a></li>
                    <li class="{{ setActive(['admin.blog-comments.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-comments.index') }}">Blog Comments</a></li>
                </ul>
            </li>


            <li
    class="dropdown {{ setActive(['admin.awards.*']) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-award"></i> <span>Manage Awards</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.awards.index']) }}">
            <a class="nav-link" href="{{ route('admin.awards.index') }}">Awards</a>
        </li>
    </ul>
</li>


<!-- Certificates Navigation -->
<li class="dropdown {{ setActive(['admin.certificates.*']) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-certificate"></i> <span>Manage Certificates</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.certificates.index']) }}">
            <a class="nav-link" href="{{ route('admin.certificates.index') }}">Certificates</a>
        </li>
    </ul>
</li>



<!-- Photo Gallery Navigation -->
<li class="dropdown {{ setActive(['admin.photo-gallery.*']) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-image"></i> <span>Photo Gallery</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.photo-gallery.index']) }}">
            <a class="nav-link" href="{{ route('admin.photo-gallery.index') }}">All Photos</a>
        </li>
        <li class="{{ setActive(['admin.photo-gallery.create']) }}">
            <a class="nav-link" href="{{ route('admin.photo-gallery.create') }}">Add New Photo</a>
        </li>
    </ul>
</li>

<!-- Licensing Agreement Navigation -->
<li class="dropdown {{ setActive(['admin.licensingagreements.*']) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-file-signature"></i> <span>Licensing Agreement</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.licensingagreements.index']) }}">
            <a class="nav-link" href="{{ route('admin.licensingagreements.index') }}">All Agreements</a>
        </li>
        <li class="{{ setActive(['admin.licensingagreements.create']) }}">
            <a class="nav-link" href="{{ route('admin.licensingagreements.create') }}">Add New Agreement</a>
        </li>
    </ul>
</li>

            {{-- <li class="menu-header">Admission</li>

            <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                    href="{{ route('admin.center-had.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Center Had</span></a>
            </li>

            <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                    href="{{ route('admin.school-for-visiting.index') }}"><i class="fas fa-money-bill-alt"></i> <span>School For Visiting</span></a>
            </li>

            <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                    href="{{ route('admin.standard.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Standard</span></a>
            </li>

            <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                    href="{{ route('admin.package-price.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Package</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.admission.pending', 'admin.admission.approved', 'admin.admission.rejected']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-ad"></i> <span>Manage Admission</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.admission.pending']) }}"><a class="nav-link" href="{{ route('admin.admission.pending') }}">Pending Admission</a></li>
                    <li class="{{ setActive(['admin.admission.approved']) }}"><a class="nav-link" href="{{ route('admin.admission.approved') }}">Approved Admission</a></li>
                    <li class="{{ setActive(['admin.admission.rejected']) }}"><a class="nav-link" href="{{ route('admin.admission.rejected') }}">Rejected Admission</a></li>
                    <li class="{{ setActive(['admin.center.index']) }}"><a class="nav-link" href="{{ route('admin.center.index') }}">Exam Center</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.exam-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-book-open"></i>
                    <span>Exam Categories</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.exam-category.index']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-category.index') }}">All Categories</a>
                    </li>
                    <li class="{{ setActive(['admin.exam-category.create']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-category.create') }}">Add Category</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setActive(['admin.exam.*', 'admin.exam-question.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-edit"></i>
                    <span>Manage Exam</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.exam.*']) }}">
                        <a class="nav-link" href="{{ route('admin.exam.index') }}">All Exams</a>
                    </li>
                    <li class="{{ setActive(['admin.exam-section.*']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-section.index') }}">Exam Sections</a>
                    </li>

                    <li class="{{ setActive(['admin.exam-question.*']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-question.index') }}">Exam Questions</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="dropdown {{ setActive(['admin.exam.*', 'admin.exam-question.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Exam Results</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.exam-results.*']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-results.index') }}">Results</a>
                    </li>


                </ul>

            </li>
            <li class="dropdown {{ setActive(['admin.announcements.*', 'admin.announcements.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-bullhorn"></i>
                    <span>Announcement</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.announcements.*']) }}">
                        <a class="nav-link" href="{{ route('admin.announcements.index') }}">Announce</a>
                    </li>

                </ul>
            </li>
 --}}


            {{-- <li class="menu-header">Online Class</li>

            <li class="dropdown {{ setActive(['admin.exam-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Manage Class</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.exam-category.index']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-category.index') }}">Create Class</a>
                    </li>
                    <li class="{{ setActive(['admin.exam-category.create']) }}">
                        <a class="nav-link" href="{{ route('admin.exam-category.create') }}">All Class</a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="menu-header">Ofline Results</li>

            <li class="dropdown {{ setActive(['admin.exam-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-file-alt"></i>
                    <span>Offline Results</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.exam-category.index']) }}">
                        <a class="nav-link" href="{{ route('admin.result.index') }}">Result</a>
                    </li>

                    <li class="{{ setActive(['admin.result-category.index']) }}">
                        <a class="nav-link" href="{{ route('admin.admin-result.index') }}">Admin Result</a>
                    </li>

                    <li class="{{ setActive(['admin.merit-list.*']) }}">
                        <a class="nav-link" href="{{ route('admin.merit-list') }}">Merit List</a>
                    </li>

                    <li class="{{ setActive(['admin.merit-list.*']) }}">
                        <a class="nav-link" href="{{ route('admin.merit-list-rank.index') }}">Merit List Rank</a>
                    </li>

                    <li class="{{ setActive(['admin..exam.center.index.*']) }}">
                        <a class="nav-link" href="{{ route('admin.exam.center.index') }}">Exam Center(on/off)</a>
                    </li>

                    <li class="{{ setActive(['admin.district.index.*']) }}">
                        <a class="nav-link" href="{{ route('admin.district.index') }}">District(on/off)</a>
                    </li>

                    <li class="{{ setActive(['admin.division.index.*']) }}">
                        <a class="nav-link" href="{{ route('admin.division.index') }}">Division(on/off)</a>
                    </li>

                    <li class="{{ setActive(['admin.state.index.*']) }}">
                        <a class="nav-link" href="{{ route('admin.state.index') }}">State(on/off)</a>
                    </li>

                    <li class="{{ setActive(['admin.taluka.index.*']) }}">
                        <a class="nav-link" href="{{ route('admin.taluka.index') }}">Taluka(on/off)</a>
                    </li>


                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.school-info.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-file-alt"></i>
                    <span>School Info</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.school-info.index']) }}">
                        <a class="nav-link" href="{{ route('admin.school-info.index') }}">Info</a>
                    </li>
                </ul>
            </li> --}}


            <!--<li class="dropdown {{ setActive(['admin.master-info.*']) }}">-->
            <!--    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">-->
            <!--        <i class="fas fa-file-alt"></i>-->
            <!--        <span>Master Info</span>-->
            <!--    </a>-->
            <!--    <ul class="dropdown-menu">-->
            <!--        <li class="{{ setActive(['admin.master-info']) }}">-->
            <!--            <a class="nav-link" href="{{ route('admin.master-info') }}">Master</a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->


            <li class="menu-header">Settings & More</li>


            <li
                class="dropdown {{ setActive([
                    'admin.footer-info.index',
                    'admin.footer-socials.*',
                    'admin.footer-grid-two.*',
                    'admin.footer-grid-three.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i><span>Footer</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.footer-info.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>

                    <li class="{{ setActive(['admin.footer-socials.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-socials.index') }}">Footer Socials</a></li>

                    <li class="{{ setActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>

                    <li class="{{ setActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>

                </ul>
            </li>
            {{-- <li
                class="dropdown {{ setActive([
                    'admin.vendor-requests.index',
                    'admin.customer.index',
                    'admin.vendor-list.index',
                    'admin.manage-user.index',
                    'admin-list.index',
                    'admin.partner-requests.index',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.customer.index']) }}"><a class="nav-link"
                            href="{{ route('admin.customer.index') }}">Customer list</a></li>
                    <li class="{{ setActive(['admin.vendor-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-list.index') }}">Vendor list</a></li>

                    <li class="{{ setActive(['admin.vendor-requests.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-requests.index') }}">Pending vendors</a></li>

                    <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.admin-list.index') }}">Admin Lists</a></li>

                    <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link"
                            href="{{ route('admin.manage-user.index') }}">Manage user</a></li>
                     <li class="{{ setActive(['admin.partner-requests.index']) }}"><a class="nav-link"
                            href="{{ route('admin.partner-requests.index') }}">Partner Requests</a></li>        

                </ul>
            </li> --}}

            {{-- <li><a class="nav-link {{ setActive(['admin.subscribers.*']) }}"
                    href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user-friends"></i>
                    <span>Subscribers</span></a></li>

            <li><a class="nav-link {{ setActive(['admin.help-inquiries.*']) }}"
                    href="{{ route('admin.help-inquiries.index') }}"><i class="fas fa-question-circle"></i>
                    <span>Help Inquery</span></a></li>

            <li><a class="nav-link {{ setActive(['admin.complaints.*']) }}"
                    href="{{ route('admin.complaints.index') }}"><i class="fas fa-exclamation-circle"></i>
                    <span>Student Complain</span></a></li>

            <li><a class="nav-link {{ setActive(['admin.event-Participations.*']) }}"
                    href="{{ route('admin.event-participations.index') }}"><i class="fas fa-calendar-check"></i>
                    <span>Event Participations </span></a></li>

            <li><a class="nav-link {{ setActive(['admin.students-account.*']) }}"
                    href="{{ route('admin.all-student') }}"><i class="fas fa-user-graduate"></i>
                    <span>All Student</span></a></li>

            <li><a class="nav-link {{ setActive(['admin.students-account.*']) }}"
            href="{{ route('admin.students-account.index') }}"><i class="fas fa-user-graduate"></i>
            <span>Student Account</span></a></li> --}}

            {{-- <li><a class="nav-link {{ setActive(['admin.events.*']) }}"
                    href="{{ route('admin.events.index') }}"><i class="fas fa-calendar-alt"></i>
                    <span>Events</span></a></li>

            <li><a class="nav-link {{ setActive(['admin.online-test.*']) }}"
                    href="{{ route('admin.online-test.index') }}"><i class="fas fa-clipboard-list"></i>
                    <span>Online Test</span></a></li>
 --}}
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-wrench"></i>
                    <span>Settings</span></a></li>

        </ul>

    </aside>
</div>