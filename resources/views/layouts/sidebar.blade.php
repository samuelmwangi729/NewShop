<nav id="mainnav-container">
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
                            <a href="#">
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
                            <span class="menu-title">Pages</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="pages-faq.html"><i class="fa fa-caret-right"></i> FAQ </a></li>
                                <li><a href="pages-gallery.html"><i class="fa fa-caret-right"></i> Gallery </a></li>
                                <li><a href="pages-directory.html"><i class="fa fa-caret-right"></i> Directory </a></li>
                                <li><a href="pages-profile.html"><i class="fa fa-caret-right"></i> User Profile </a></li>
                                <li><a href="pages-invoice.html"><i class="fa fa-caret-right"></i> Invoice </a></li>
                                <li><a href="pages-login.html"><i class="fa fa-caret-right"></i> Login </a></li>
                                <li><a href="pages-register.html"><i class="fa fa-caret-right"></i> Register </a></li>
                                <li><a href="pages-password-reminder.html"><i class="fa fa-caret-right"></i> Password Reminder </a></li>
                                <li><a href="pages-lock-screen.html"><i class="fa fa-caret-right"></i> Lock Screen </a></li>
                                <li><a href="pages-404.html"><i class="fa fa-caret-right"></i> 404 Error </a></li>
                                <li><a href="pages-500.html"><i class="fa fa-caret-right"></i> 500 Error </a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-table"></i>
                            <span class="menu-title">Tables</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="table-static.html"><i class="fa fa-caret-right"></i> Static Table <span class="label label-info pull-right">New</span></a></li>
                                <li><a href="table-datatable.html"><i class="fa fa-caret-right"></i> Datatable Table </a></li>
                                <li><a href="table-footable.html"><i class="fa fa-caret-right"></i> Footable Table </a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-edit"></i>
                            <span class="menu-title">Forms</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="forms-layout.html"><i class="fa fa-caret-right"></i> Form Layout </a></li>
                                <li><a href="forms-switchery.html"><i class="fa fa-caret-right"></i> Form Switchery </a></li>
                                <li><a href="forms-components.html"><i class="fa fa-caret-right"></i> Form Components </a></li>
                                <li><a href="forms-validation.html"><i class="fa fa-caret-right"></i> Form Validation </a></li>
                                <li><a href="forms-wizard.html"><i class="fa fa-caret-right"></i> Form Wizard </a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-line-chart"></i>
                            <span class="menu-title">Charts</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="charts-flot.html"><i class="fa fa-caret-right"></i> Flot Chart </a></li>
                                <li><a href="charts-morris.html"><i class="fa fa-caret-right"></i> Morris Chart </a></li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Extra</li>
                        <!--Menu list item-->
                        <li>
                            <a href="calendar.html">
                            <i class="fa fa-calendar"></i>
                            <span class="menu-title">
                            Calendar
                            </span>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="ui-widgets.html">
                            <i class="fa fa-flask"></i>
                            <span class="menu-title">
                            <strong>Widgets</strong>
                            <span class="label label-pink pull-right">New</span>
                            </span>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="menu-title">Mail</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="mail-inbox.html"><i class="fa fa-caret-right"></i> Inbox </a></li>
                                <li><a href="mail-compose.html"><i class="fa fa-caret-right"></i> Compose </a></li>
                                <li><a href="mail-mailview.html"><i class="fa fa-caret-right"></i> Mail View </a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <span class="menu-title">
                            Maps
                            <span class="label label-mint pull-right">New</span>
                            </span>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="maps-gmap.html">Google Maps</a></li>
                                <li><a href="maps-vectormap.html">Vector Maps</a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                            <i class="fa fa-plus-square"></i>
                            <span class="menu-title">Menu Level</span>
                            <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                <li class="list-divider"></li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>
                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>
                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li class="list-divider"></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--Widget-->
                    <!--================================-->
                    <div class="mainnav-widget">
                        <!-- Show the button on collapsed navigation -->
                        <div class="show-small">
                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                            <i class="fa fa-desktop"></i>
                            </a>
                        </div>
                        <!-- Hide the content on collapsed navigation -->
                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                            <ul class="list-group">
                                <li class="list-header pad-no pad-ver">Server Status</li>
                                <li class="mar-btm">
                                    <span class="label label-primary pull-right">15%</span>
                                    <p>CPU Usage</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                            <span class="sr-only">15%</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <span class="label label-purple pull-right">75%</span>
                                    <p>Bandwidth</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                            <span class="sr-only">75%</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End widget-->
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->
    </div>
</nav>
