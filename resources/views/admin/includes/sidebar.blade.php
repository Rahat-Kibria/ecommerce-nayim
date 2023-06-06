@php
    $adminLogo = DB::table('setiings')->first();
@endphp
<div class="sl-logo"><a href="{{ URL('/admin/dashboard') }}"><img src="{{ asset('upload/site/' . $adminLogo?->logo) }}"
            alt="" style="width:50px;"></a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">
        <a href="{{ URL('/admin/dashboard') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Categories</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('category.view') }}" class="nav-link">View Categories</a>
                </li>
                <li class="nav-item"><a href="{{ route('subcategory.view') }}" class="nav-link"> View
                        Subcategories</a></li>
                <li class="nav-item"><a href="{{ route('brand.view') }}" class="nav-link">View Brands</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('cupon.view') }}" class="nav-link">Coupons</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Other's</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('newsletter.view') }}" class="nav-link">Newsletter</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('product.add') }}" class="nav-link">Add Product</a></li>
                <li class="nav-item"><a href="{{ route('product.view') }}" class="nav-link">All Products</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Blogs</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('postcategory.view') }}" class="nav-link">Category</a></li>
                <li class="nav-item"><a href="{{ route('blog.add') }}" class="nav-link">Add Post</a></li>
                <li class="nav-item"><a href="{{ route('blog.view') }}" class="nav-link">All Posts</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.order') }}" class="nav-link">New Orders</a></li>
                <li class="nav-item"><a href="{{ route('accept.payment') }}" class="nav-link">Accepted Orders</a>
                </li>
                <li class="nav-item"><a href="{{ route('cancel.payment') }}" class="nav-link">Canceled Orders</a>
                </li>
                <li class="nav-item"><a href="{{ route('process.payment') }}" class="nav-link">Process Delivery</a>
                </li>
                <li class="nav-item"><a href="{{ route('delivared.payment') }}" class="nav-link">Delivered
                        Orders</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Reports</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('today.order') }}" class="nav-link">Today's Orders</a>
                </li>
                <li class="nav-item"><a href="{{ route('today.delivary') }}" class="nav-link">Today's
                        Delivery</a></li>
                <li class="nav-item"><a href="{{ route('this.month') }}" class="nav-link">This Month's
                        Orders</a></li>
                <li class="nav-item"><a href="{{ route('search.report') }}" class="nav-link">Search Reports</a>
                </li>

            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Return Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.return.rquest') }}" class="nav-link">Return
                        Requests</a></li>
                <li class="nav-item"><a href="{{ route('admin.return.allrequest') }}" class="nav-link">All
                        Requests</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Contact Messages</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('all.message') }}" class="nav-link">All Messages</a></li>
            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Product Stock</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('product.stock') }}" class="nav-link">View Stock</a></li>

            </ul>
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Site Settings</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('setting') }}" class="nav-link">Settings</a></li>
            </ul>
        </a><!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
