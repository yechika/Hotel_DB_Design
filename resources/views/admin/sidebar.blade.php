<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ url('dashboard') }}">AUREVO</a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('view_room') ? 'active' : '' }}">
                    <a href="{{ url('view_room') }}" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>View Rooms</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('create_room') ? 'active' : '' }}">
                    <a href="{{ url('create_room') }}" class="sidebar-link">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Create Room</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('bookings') ? 'active' : '' }}">
                    <a href="{{ url('bookings') }}" class="sidebar-link">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span>Bookings</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('view_gallery') ? 'active' : '' }}">
                    <a href="{{ url('view_gallery') }}" class="sidebar-link">
                        <i class="bi bi-image-fill"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('all_messages') ? 'active' : '' }}">
                    <a href="{{ url('all_messages') }}" class="sidebar-link">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>