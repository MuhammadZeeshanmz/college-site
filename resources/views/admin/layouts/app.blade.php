<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 272px;
            --topbar-height: 68px;

            /* Sidebar */
            --sb-bg: #080e1a;
            --sb-surface: #0d1526;
            --sb-border: rgba(255,255,255,0.05);
            --sb-text: #6b7fa3;
            --sb-text-active: #ffffff;
            --sb-hover: rgba(255,255,255,0.04);
            --sb-active-bg: rgba(99,179,237,0.12);
            --sb-active-bar: #63b3ed;

            /* Top/Body */
            --topbar-bg: rgba(255,255,255,0.95);
            --body-bg: #f0f4fb;
            --card-bg: #ffffff;

            /* Accent system */
            --accent: #3b82f6;
            --accent-2: #8b5cf6;
            --accent-3: #06b6d4;
            --accent-glow: rgba(59,130,246,0.25);

            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;

            --shadow-sm: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.04), 0 10px 30px rgba(0,0,0,0.08);
            --shadow-glow: 0 0 20px rgba(59,130,246,0.15);

            --radius: 14px;
            --radius-sm: 9px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--body-bg);
            color: #1a2540;
            overflow-x: hidden;
        }

        /* ═══════════════════════════════════
           SIDEBAR
        ═══════════════════════════════════ */
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sb-bg);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .35s cubic-bezier(.4,0,.2,1);
            overflow: hidden;
        }

        /* Decorative gradient orb in sidebar */
        #sidebar::before {
            content: '';
            position: absolute;
            top: -80px; left: -80px;
            width: 260px; height: 260px;
            background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%);
            pointer-events: none;
            border-radius: 50%;
        }
        #sidebar::after {
            content: '';
            position: absolute;
            bottom: 60px; right: -60px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(139,92,246,0.12) 0%, transparent 70%);
            pointer-events: none;
            border-radius: 50%;
        }

        .sidebar-inner {
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            z-index: 1;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar-inner::-webkit-scrollbar { display: none; }

        /* Brand */
        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--sb-border);
        }

        .brand-lockup {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 19px; color: #fff;
            box-shadow: 0 4px 14px rgba(59,130,246,0.4);
            flex-shrink: 0;
            position: relative;
        }

        .brand-icon::after {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: 13px;
            background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
            pointer-events: none;
        }

        .brand-text h5 {
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: -.2px;
            line-height: 1.2;
        }

        .brand-text small {
            color: #3a4f6e;
            font-size: 11px;
            font-weight: 500;
            font-family: 'DM Mono', monospace;
            letter-spacing: .5px;
        }

        /* Nav */
        .sidebar-nav {
            padding: 16px 0;
            flex: 1;
        }

        .nav-section-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #243352;
            padding: 18px 20px 6px;
            font-family: 'DM Mono', monospace;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 20px;
            color: var(--sb-text);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all .2s ease;
            position: relative;
            margin: 1px 10px;
            border-radius: 10px;
        }

        .nav-item a:hover {
            background: var(--sb-hover);
            color: #c5d4ef;
        }

        .nav-item a.active {
            background: var(--sb-active-bg);
            color: var(--sb-text-active);
        }

        .nav-item a.active::before {
            content: '';
            position: absolute;
            left: -10px; top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 22px;
            background: linear-gradient(180deg, #63b3ed, #8b5cf6);
            border-radius: 0 3px 3px 0;
        }

        .nav-item a i {
            font-size: 15.5px;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
            opacity: .8;
        }

        .nav-item a.active i { opacity: 1; color: #63b3ed; }

        .nav-pill-count {
            margin-left: auto;
            background: rgba(99,179,237,0.15);
            color: #63b3ed;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            font-family: 'DM Mono', monospace;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--sb-border);
        }

        .admin-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            background: rgba(255,255,255,0.04);
            border-radius: 12px;
            border: 1px solid var(--sb-border);
        }

        .admin-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; color: #fff; font-weight: 700;
            flex-shrink: 0;
        }

        .admin-name {
            font-size: 12.5px;
            font-weight: 600;
            color: #c8d8f0;
            line-height: 1.3;
        }

        .admin-role {
            font-size: 10.5px;
            color: #3a4f6e;
            font-family: 'DM Mono', monospace;
            letter-spacing: .3px;
        }

        .admin-online-dot {
            width: 8px; height: 8px;
            background: var(--success);
            border-radius: 50%;
            margin-left: auto;
            box-shadow: 0 0 6px rgba(16,185,129,.6);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: .4; }
        }

        /* ═══════════════════════════════════
           TOPBAR
        ═══════════════════════════════════ */
        #topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: var(--topbar-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226,232,240,0.8);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 999;
            box-shadow: 0 1px 0 rgba(0,0,0,0.04), 0 4px 20px rgba(0,0,0,0.03);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        #sidebarToggle {
            background: none;
            border: none;
            font-size: 20px;
            color: #64748b;
            cursor: pointer;
            padding: 4px;
            display: none;
        }

        .page-breadcrumb h6 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
            color: #0f172a;
            letter-spacing: -.3px;
        }

        .page-breadcrumb .breadcrumb-trail {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11.5px;
            color: #94a3b8;
            margin-top: 1px;
        }

        .breadcrumb-trail i { font-size: 9px; }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .topbar-btn {
            width: 38px; height: 38px;
            border: 1.5px solid #e8eef6;
            background: #fff;
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            color: #64748b;
            font-size: 15px;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
            position: relative;
        }

        .topbar-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
            transform: translateY(-1px);
        }

        .topbar-logout {
            border-color: #fee2e2;
            background: #fff5f5;
            color: #ef4444;
        }

        .topbar-logout:hover {
            border-color: #ef4444;
            background: #fee2e2;
            box-shadow: 0 0 0 3px rgba(239,68,68,0.1);
        }

        .notif-dot {
            position: absolute;
            top: 6px; right: 6px;
            width: 7px; height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #fff;
        }

        /* ═══════════════════════════════════
           MAIN CONTENT
        ═══════════════════════════════════ */
        #main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 30px;
            min-height: calc(100vh - var(--topbar-height));
            animation: fadeUp .4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ═══════════════════════════════════
           CARDS
        ═══════════════════════════════════ */
        .card {
            border: 1px solid #e8eef6;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            background: var(--card-bg);
            transition: box-shadow .2s, transform .2s;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            border-radius: var(--radius) var(--radius) 0 0 !important;
            padding: 16px 20px;
        }

        .card-header h5, .card-header h6 {
            margin: 0;
            font-weight: 700;
            font-size: 14px;
            color: #0f172a;
        }

        /* ═══════════════════════════════════
           TABLE
        ═══════════════════════════════════ */
        .table th {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            border-bottom: 1px solid #f1f5f9 !important;
            padding: 12px 16px;
            font-family: 'DM Mono', monospace;
        }

        .table td {
            font-size: 13.5px;
            vertical-align: middle;
            padding: 13px 16px;
            border-color: #f8fafc;
            color: #334155;
        }

        .table tbody tr {
            transition: background .15s;
        }
        .table tbody tr:hover { background: #f8fbff; }

        /* ═══════════════════════════════════
           BUTTONS
        ═══════════════════════════════════ */
        .btn {
            font-size: 13px;
            font-weight: 600;
            border-radius: var(--radius-sm);
            transition: all .2s;
            letter-spacing: -.1px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), #2563eb);
            border: none;
            box-shadow: 0 2px 8px rgba(59,130,246,.3);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(59,130,246,.4);
        }

        .btn-sm { padding: 5px 13px; font-size: 12px; }

        /* ═══════════════════════════════════
           ALERTS
        ═══════════════════════════════════ */
        .alert {
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            border: none;
            padding: 14px 18px;
        }
        .alert-success {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #065f46;
            border-left: 4px solid var(--success);
        }
        .alert-danger {
            background: linear-gradient(135deg, #fff5f5, #fee2e2);
            color: #7f1d1d;
            border-left: 4px solid var(--danger);
        }

        /* ═══════════════════════════════════
           BADGES
        ═══════════════════════════════════ */
        .badge {
            font-size: 10.5px;
            font-weight: 600;
            border-radius: 6px;
            padding: 4px 9px;
            letter-spacing: .2px;
        }
        .badge-active {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }
        .badge-inactive {
            background: #fff5f5;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        /* ═══════════════════════════════════
           FORMS
        ═══════════════════════════════════ */
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            padding: 9px 14px;
            color: #0f172a;
            font-family: 'Outfit', sans-serif;
            transition: border .2s, box-shadow .2s;
            background: #fafbfd;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59,130,246,.12);
            background: #fff;
        }

        /* ═══════════════════════════════════
           RESPONSIVE
        ═══════════════════════════════════ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.6);
            backdrop-filter: blur(4px);
            z-index: 999;
        }
        .sidebar-overlay.show { display: block; }

        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.show { transform: translateX(0); }
            #topbar { left: 0; }
            #main-content { margin-left: 0; padding: 20px 16px; }
            #sidebarToggle { display: flex !important; }
        }
    </style>
    @stack('styles')
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- SIDEBAR -->
<div id="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-brand">
            <div class="brand-lockup">
                <div class="brand-icon"><i class="bi bi-buildings-fill"></i></div>
                <div class="brand-text">
                    <h5>Admin Panel</h5>
                    <small>v2.0 · CMS</small>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Main</div>
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-squares"></i> Dashboard
                </a>
            </div>

            <div class="nav-section-label">Content</div>
            <div class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> News
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                    <i class="bi bi-megaphone-fill"></i> Announcements
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Gallery
                </a>
            </div>

            <div class="nav-section-label">Documents</div>
            <div class="nav-item">
                <a href="{{ route('admin.tenders.index') }}" class="{{ request()->routeIs('admin.tenders.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text-fill"></i> Tenders
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.downloads.index') }}" class="{{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                    <i class="bi bi-cloud-arrow-down-fill"></i> Downloads
                </a>
            </div>

            <div class="nav-section-label">People & Media</div>
            <div class="nav-item">
                <a href="{{ route('admin.faculty.index') }}" class="{{ request()->routeIs('admin.faculty.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Faculty
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.sliders.index') }}" class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="bi bi-collection-play-fill"></i> Sliders
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="admin-card">
                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                <div>
                    <div class="admin-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="admin-role">Administrator</div>
                </div>
                <div class="admin-online-dot" title="Online"></div>
            </div>
        </div>
    </div>
</div>

<!-- TOPBAR -->
<div id="topbar">
    <div class="topbar-left">
        <button id="sidebarToggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>
        <div class="page-breadcrumb">
            <h6>@yield('page-title', 'Dashboard')</h6>
            <div class="breadcrumb-trail">
                <span>Admin</span>
                <i class="bi bi-chevron-right"></i>
                <span style="color:#64748b;">@yield('page-subtitle', 'Overview')</span>
            </div>
        </div>
    </div>
    <div class="topbar-right">
        <a href="{{ route('admin.dashboard') }}" class="topbar-btn" title="Home">
            <i class="bi bi-house-fill"></i>
        </a>
        <button class="topbar-btn" title="Notifications" style="position:relative;">
            <i class="bi bi-bell-fill"></i>
            <span class="notif-dot"></span>
        </button>
        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="topbar-btn topbar-logout" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

<!-- MAIN CONTENT -->
<div id="main-content">
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
        document.getElementById('sidebarOverlay').classList.toggle('show');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('show');
        document.getElementById('sidebarOverlay').classList.remove('show');
    }
</script>
@stack('scripts')
</body>
</html>