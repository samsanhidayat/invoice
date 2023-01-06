<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/user') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>
        @if (Auth::user()->role == '1')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false"
                    aria-controls="report">
                    <i class="mdi mdi-apps menu-icon"></i>
                    <span class="menu-title">Report</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="report">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/order') }}"> Order </a></li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-apps menu-icon"></i>
                    <span class="menu-title">Product</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/product') }}"> Product </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/slide') }}">
                    <i class="mdi mdi-arrange-send-backward menu-icon"></i>
                    <span class="menu-title">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false"
                    aria-controls="report">
                    <i class="mdi mdi-apps menu-icon"></i>
                    <span class="menu-title">Report</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="report">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/order') }}"> Order </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/setting') }}">
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Setting</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
