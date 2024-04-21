<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mb-4">
            <a href="index.html"><img src="{{ asset('img/clinic_logo.png') }}" alt="logo" height="70"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ $type_menu == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i
                        class="fas fa-chart-simple"></i></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ $type_menu == 'user' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
            </li>
            <li class="nav-item {{ $type_menu == 'doctor' ? 'active' : '' }}">
                <a href="{{ route('doctors.index') }}" class="nav-link"><i
                        class="fas fa-user-doctor"></i><span>Dokter</span></a>
            </li>
            <li class="nav-item {{ $type_menu == 'schedule' ? 'active' : '' }}">
                <a href="{{ route('schedules.index') }}" class="nav-link"><i
                        class="fas fa-calendar-day"></i><span>Jadwal
                        Praktik</span></a>
            </li>
            <li class="nav-item {{ $type_menu == 'patient' ? 'active' : '' }}">
                <a href="{{ route('patients.index') }}" class="nav-link">
                    <i class="fas fa-hospital-user"></i>
                    <span>Pasien</span>
                </a>
            </li>
            <li class="nav-item {{ $type_menu == 'clinic_service' ? 'active' : '' }}">
                <a href="{{ route('clinic-services.index') }}" class="nav-link">
                    <i class="fas fa-hospital-alt"></i>
                    <span>Layanan Klinik</span>
                </a>
            </li>
    </aside>
</div>
