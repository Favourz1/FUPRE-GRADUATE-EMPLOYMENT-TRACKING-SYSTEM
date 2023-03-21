<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h5 class="logo-text">{{ config('app.short_name') }}</h5>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard.profile') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.job-profile') }}">
                <div class="parent-icon"><i class='bx bx-briefcase'></i></div>
                <div class="menu-title">Job Profile</div>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.job-referee') }}">
                <div class="parent-icon"><i class='bx bx-plus'></i></div>
                <div class="menu-title">Job Referee</div>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.change-password') }}">
                <div class="parent-icon"><i class='bx bx-lock'></i></div>
                <div class="menu-title">Change Password</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->