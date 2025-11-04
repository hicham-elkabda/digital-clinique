<style>
/* 🌐 NAVBAR PC */
.navbar-custom {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 60px;
    background-color: #1f2937;
    border-bottom: 1px solid #111827;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    z-index: 100;
}

.nav-left {
    display: flex;
    align-items: center;
}

.brand-title {
    margin: 0;
    font-weight: 600;
    text-transform: uppercase;
    line-height: 1.2;
    letter-spacing: 0.5px;
    color: #f9fafb;
    font-size: 11px;
}

.brand-title .brand-accent {
    color: #29abe2;
    display: block;
    font-size: 13px;
}

.brand-title .brand-name {
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
}

/* NAV RIGHT PC */
.navbar-custom .nav-right {
    display: flex;
    align-items: center;
    gap: 20px;
    position: relative;
}

.navbar-custom .nav-right span,
.navbar-custom .nav-right i {
    color: #f9fafb;
}

.navbar-custom img.profile-pic {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid #ddd;
}

/* SIDEBAR PC */
.sidebar {
    width: 250px;
    background-color: #1f2937;
    position: fixed;
    top: 60px;
    left: 0;
    height: calc(100vh - 60px);
    transition: width 0.3s ease;
    display: flex;
    flex-direction: column;
    z-index: 90;
}

.sidebar.collapsed {
    width: 70px;
}

.sidebar .toggle-btn {
    background: none;
    border: none;
    color: #f9fafb;
    font-size: 1.5rem;
    cursor: pointer;
    right: 6px !important;
    padding: 10px;
    text-align: right;
}

.sidebar .nav a {
    color: #f9fafb;
    font-size: 15px;
    border-radius: 8px;
    margin: 5px 10px;
    transition: background 0.3s;
    display: flex;
    align-items: center;
    padding: 10px;
    text-decoration: none;
}

.sidebar .nav a:hover,
.sidebar .nav a.active {
    background-color: #374151;
}

.sidebar.collapsed .hide-on-collapse {
    display: none;
}

.sidebar img.Logo {
    height: 100px;
    transition: height 0.3s ease;
}

.sidebar.collapsed img.Logo {
    height: 60px;
}

/* DROPDOWN PC */
.dropdown-menu {
    position: fixed;
    top: 60px;
    right: 2px;
    min-width: 220px;
    border-radius: 6px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    background-color: #f3f4f6;
    padding: 5px 0;
    z-index: 105;
    display: none;
}

.dropdown-menu.show {
    display: block;
}

.dropdown-item {
    color: #111827;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    transition: background 0.2s;
    border-radius: 4px;
    text-decoration: none;
}

.dropdown-item:hover {
    background-color: #e5e7eb;
}

.dropdown-divider {
    border-top: 1px solid #d1d5db;
    margin: 5px 0;
}

/* CONTENU PRINCIPAL */
.content {
    margin-left: 250px;
    margin-top: 60px;
    padding: 20px;
    transition: margin-left 0.3s ease;
}

.sidebar.collapsed~.content {
    margin-left: 70px;
}

/* 🌐 MOBILE */
.mobile-menu {
    display: none; /* cacher sur PC */
}

@media (max-width:768px) {
    .sidebar {
        display: none;
    }

    .content {
        margin-left: 0;
    }

    /* Hamburger mobile */
    .navbar-custom .hamburger {
        display: flex;
        cursor: pointer;
        font-size: 1.5rem;
        color: #f9fafb;
    }

    /* Masquer dropdown PC */
    .navbar-custom .nav-right > .dropdown {
        display: none;
    }

    /* Menu mobile */
    .mobile-menu {
        display: flex;
        flex-direction: column;
        background-color: #1f2937;
        position: fixed;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100vh;
        z-index: 110;
        padding-top: 60px;
        transition: left 0.3s ease;
    }
    .mobile-menu.show {
        left: 0;
    }

    .mobile-menu .logo-container {
        text-align: center;
        padding: 15px;
        border-bottom: 1px solid #374151;
        position: relative;
    }
    .mobile-menu .logo-container img {
        height: 120px;
    }

    .mobile-menu .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 1.8rem;
        color: #f9fafb;
        cursor: pointer;
    }

    .mobile-menu a {
        color: #f9fafb;
        text-decoration: none;
        padding: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid #374151;
    }
    .mobile-menu a:hover {
        background-color: #374151;
    }

    .mobile-menu .user-name {
        font-weight: bold;
        padding: 15px;
        color: #f9fafb;
        border-bottom: 1px solid #374151;
    }
}
</style>

<div class="d-flex">
    <!-- SIDEBAR PC -->
    <nav class="sidebar" id="sidebar">
        <button class="toggle-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
        <div class="p-4 text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="Logo">
        </div>
        <div class="nav flex-column">
            <a href="#" class="sidebar-link active"><i class="bi bi-house-door me-3"></i><span class="hide-on-collapse">Accueil</span></a>
            <a href="#"><i class="bi bi-calendar-event me-3"></i><span class="hide-on-collapse">Rendez-vous</span></a>
            <a href="#"><i class="bi bi-people me-3"></i><span class="hide-on-collapse">Patients</span></a>
        </div>
    </nav>

    <!-- NAVBAR -->
    <nav class="navbar-custom d-flex justify-content-between align-items-center">
        <div class="nav-left">
            <h4 class="brand-title">
                <span class="brand-accent">Digital</span>
                <span class="brand-name">Majda Bouzalmad</span>
                <span class="brand-accent">Cabinet Dentaire</span>
            </h4>
        </div>

        <!-- Hamburger mobile -->
        <div class="hamburger d-md-none" onclick="toggleMobileMenu()">
            <i class="bi bi-list"></i>
        </div>

        <!-- Dropdown PC -->
        <div class="nav-right d-none d-md-flex">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none" id="userDropdown" onclick="toggleDropdown(event)">
                    <img src="{{ asset('images/imageUser.jpg') }}" alt="User" class="profile-pic me-2">
                    <span class="fw-semibold">
                        @auth
                        {{ strtoupper(Auth::user()->nom) . ' ' . ucfirst(strtolower(Auth::user()->prenom)) }}
                        @endauth
                    </span>
                    <i class="bi bi-caret-down-fill ms-1"></i>
                </a>

                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2" style="color: black;font-size:18px;"></i> Mon profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2" style="color: black;font-size:18px;" ></i> Paramètres du compte</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-2"style="color: red;font-size:18px;"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MENU MOBILE -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <span class="close-btn" onclick="toggleMobileMenu()">&times;</span>
        </div>
        <div class="user-name">
            @auth
            {{ strtoupper(Auth::user()->nom) . ' ' . ucfirst(strtolower(Auth::user()->prenom)) }}
            @endauth
        </div>
        <a href="#"><i class="bi bi-house-door"></i> Accueil</a>
        <a href="#"><i class="bi bi-calendar-event"></i> Rendez-vous</a>
        <a href="#"><i class="bi bi-people"></i> Patients</a>
        <hr class="dropdown-divider">
        <a href="#"><i class="bi bi-person"></i> Mon profil</a>
        <a href="#"><i class="bi bi-gear"></i> Paramètres du compte</a>
        <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>

    <!-- CONTENU PRINCIPAL -->
    @yield('content')
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
}

function toggleDropdown(e) {
    e.preventDefault();
    document.getElementById('dropdownMenu').classList.toggle('show');
}

function toggleMobileMenu() {
    document.getElementById('mobileMenu').classList.toggle('show');
}

document.addEventListener('click', function(e){
    const dropdown = document.getElementById('dropdownMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    if(!e.target.closest('.dropdown') && !e.target.closest('.hamburger') && !e.target.closest('#mobileMenu') && !e.target.closest('.close-btn')){
        dropdown.classList.remove('show');
        mobileMenu.classList.remove('show');
    }
});
</script>
