<nav id="mainnav-container" class="noprint" style="overflow-y: scroll !important">
    <div id="mainnav">
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">
                        <!--Category name-->
                        <li class="list-header">Navigation</li>
                        <!--Menu list item-->
                        <li>
                            <a href="{{ url('/home') }}">
                            <i class="fa fa-tachometer"></i>
                            Dashboard
                            <i class="arrow"></i>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-users"></i>
                                Sellers
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                        </li>
                        <li>
                            <a href="{{ route('shop.index') }}">
                            <i class="fa fa-building"></i>
                                Shops
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                        </li>
                        <li>
                            <a href="{{ route('visitors.index') }}">
                            <i class="fa fa-user-secret"></i>
                                Visitors
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                        </li>
                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Products</li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-briefcase"></i>
                            <span class="menu-title">
                            <strong>Categories</strong>
                            </span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('categories.create') }}">Add Categories</a></li>
                                <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-list"></i>
                            <span class="menu-title">Sub Categories</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('subcategories.create') }}">Add S.categories</a></li>
                                <li><a href="ui-panel.html">Manage S.Categories </a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-dashcube"></i>
                            <span class="menu-title">Brands</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('brand.create') }}">Add Brands</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fa fa-dashcube"></i>
                            <span class="menu-title">Labels</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('labels.create') }}">Add Product Labels</a></li>
                            </ul>
                        </li>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-dashcube"></i>
                        <span class="menu-title">Collections</span>
                        <i class="arrow"></i>
                        </a>
                        <!--Submenu-->
                        <ul class="collapse">
                            <li><a href="{{ route('collection.create') }}">Add Collections</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <span class="menu-title">Add Locations</span>
                        <i class="arrow"></i>
                        </a>
                        <!--Submenu-->
                        <ul class="collapse">
                            <li><a href="{{ route('locations.create') }}">Add Counties</a></li>
                            <li><a href="{{ route('towns') }}">Add Towns</a></li>
                            <li><a href="{{ route('pickup.index') }}">Pickup Station</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span class="menu-title">My Shop</span>
                        <i class="arrow"></i>
                        </a>
                        <!--Submenu-->
                        <ul class="collapse">
                            <li><a href="{{ route('shop.create') }}">Create Shop</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-truck"></i>
                        <span class="menu-title">Products</span>
                        <i class="arrow"></i>
                        </a>
                        <!--Submenu-->
                        <ul class="collapse">
                            <li><a href="{{ route('product.create') }}">Add Products</a></li>
                            <li><a href="{{ route('product.index') }}">Add Manage</a></li>
                        </ul>
                    </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-file"></i>
                            <span class="menu-title">Settings</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{ route('terms.index') }}"><i class="fa fa-caret-right"></i> Terms & Conditions </a></li>
                                <li><a href="{{ route('privacy.index') }}"><i class="fa fa-caret-right"></i> Privacy & Policy </a></li>
                                <li><a href="{{ route('returns.index') }}"><i class="fa fa-caret-right"></i> Return Policy </a></li>
                                <li><a href="{{ route('sellers.index') }}"><i class="fa fa-caret-right"></i> Sellers Fee </a></li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li>
                            <a href="#">
                            <i class="fa fa-sign-out"></i>
                            <span class="menu-title">Logout</span>
                            </a>
                        </li>
                        <li>
                            Logout
                        </li>
                    </ul>
                    <!--Widget-->
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->
    </div>
</nav>
