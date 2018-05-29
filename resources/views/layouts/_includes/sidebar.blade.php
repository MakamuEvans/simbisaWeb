<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.php">
            Simbisa
        </a>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-home"></span><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.php">Dashboard style 1</a></li>
                        <li><a href="index2.php">Dashboard style 2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-user-circle"></span><span class="mtext">Users</span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ $cramp1 == "Users" ? 'active': '' }}"><a href="{{route('user.index')}}">All Users</a></li>
                        <li><a href="{{route('user.create')}}">Create User</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-user-circle"></span><span class="mtext">Vendors</span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ $cramp1 == "Users" ? 'active': '' }}"><a href="{{route('vendor.index')}}">All Vendors</a></li>
                        <li><a href="{{route('vendor.create')}}">New Vendor</a></li>
                        <li><a href="{{route('vendor-location.create')}}">New Vendor Location</a></li>
                        <li><a href="{{route('vendor-menu.create')}}">New Vendor Menu</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-user-circle"></span><span class="mtext">Clients</span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ $cramp1 == "Users" ? 'active': '' }}"><a href="{{route('client.index')}}">All Clients</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-user-circle"></span><span class="mtext">Orders</span>
                    </a>
                    <ul class="submenu">
                        <li class="{{ $cramp1 == "Users" ? 'active': '' }}"><a href="{{route('orders.index')}}">All Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="sitemap.php" class="dropdown-toggle no-arrow">
                        <span class="fa fa-sitemap"></span><span class="mtext">Sitemap</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>