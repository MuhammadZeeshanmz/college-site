@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview')

@push('styles')
<style>
    /* ── STAT CARDS ── */
    .stat-card {
        position: relative;
        border-radius: 16px;
        padding: 22px;
        border: 1px solid #e8eef6;
        background: #fff;
        overflow: hidden;
        transition: transform .25s, box-shadow .25s;
        cursor: default;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 36px rgba(0,0,0,0.1);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 110px; height: 110px;
        border-radius: 50%;
        opacity: .07;
    }

    .stat-card.blue::after   { background: #3b82f6; }
    .stat-card.amber::after  { background: #f59e0b; }
    .stat-card.green::after  { background: #10b981; }
    .stat-card.purple::after { background: #8b5cf6; }

    .stat-card-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .stat-icon-wrap {
        width: 48px; height: 48px;
        border-radius: 13px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .stat-card.blue   .stat-icon-wrap { background: #eff6ff; color: #3b82f6; }
    .stat-card.amber  .stat-icon-wrap { background: #fffbeb; color: #d97706; }
    .stat-card.green  .stat-icon-wrap { background: #ecfdf5; color: #10b981; }
    .stat-card.purple .stat-icon-wrap { background: #faf5ff; color: #8b5cf6; }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 4px 8px;
        border-radius: 20px;
    }
    .stat-trend.up   { background: #ecfdf5; color: #059669; }
    .stat-trend.flat { background: #f1f5f9; color: #64748b; }

    .stat-number {
        font-size: 32px;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -1px;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .stat-label {
        font-size: 12.5px;
        font-weight: 600;
        color: #94a3b8;
        letter-spacing: .2px;
    }

    .stat-bar {
        height: 4px;
        border-radius: 10px;
        background: #f1f5f9;
        margin-top: 16px;
        overflow: hidden;
    }
    .stat-bar-fill {
        height: 100%;
        border-radius: 10px;
        animation: growBar .8s ease both;
        animation-delay: .3s;
    }
    @keyframes growBar {
        from { width: 0 !important; }
    }

    .stat-card.blue   .stat-bar-fill { background: linear-gradient(90deg, #93c5fd, #3b82f6); }
    .stat-card.amber  .stat-bar-fill { background: linear-gradient(90deg, #fcd34d, #f59e0b); }
    .stat-card.green  .stat-bar-fill { background: linear-gradient(90deg, #6ee7b7, #10b981); }
    .stat-card.purple .stat-bar-fill { background: linear-gradient(90deg, #c4b5fd, #8b5cf6); }

    /* ── SECTION HEADING ── */
    .section-heading {
        font-size: 13px;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-heading .dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    /* ── TABLE ROW AVATAR ── */
    .item-icon {
        width: 30px; height: 30px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    /* ── QUICK ACTION CARDS ── */
    .quick-action {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 20px 14px;
        border: 1.5px solid #e8eef6;
        border-radius: 14px;
        background: #fff;
        text-decoration: none;
        color: #374151;
        font-size: 12.5px;
        font-weight: 600;
        transition: all .22s;
        text-align: center;
        cursor: pointer;
    }

    .quick-action:hover {
        border-color: var(--accent, #3b82f6);
        color: var(--accent, #3b82f6);
        box-shadow: 0 4px 20px rgba(59,130,246,.12);
        transform: translateY(-3px);
    }

    .quick-action .qa-icon {
        width: 44px; height: 44px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 19px;
        transition: transform .22s;
    }

    .quick-action:hover .qa-icon {
        transform: scale(1.1);
    }

    /* ── ACTIVITY LIST ── */
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #f8fafc;
    }
    .activity-item:last-child { border-bottom: none; }

    .activity-dot {
        width: 9px; height: 9px;
        border-radius: 50%;
        margin-top: 5px;
        flex-shrink: 0;
    }

    .activity-text {
        font-size: 13px;
        color: #334155;
        line-height: 1.5;
    }
    .activity-time {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 2px;
        font-family: 'DM Mono', monospace;
    }

    /* ── PROGRESS SUMMARY ── */
    .progress-item {
        margin-bottom: 14px;
    }
    .progress-item:last-child { margin-bottom: 0; }
    .progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 12.5px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 7px;
    }
    .progress-label span:last-child { color: #94a3b8; font-weight: 500; }

    .progress-bar-wrap {
        height: 7px;
        border-radius: 10px;
        background: #f1f5f9;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        border-radius: 10px;
        animation: growBar .9s ease both;
    }

    /* ── ANIMATIONS ── */
    .stat-card { animation: fadeUp .4s ease both; }
    .stat-card:nth-child(1) { animation-delay: .05s; }
    .stat-card:nth-child(2) { animation-delay: .1s; }
    .stat-card:nth-child(3) { animation-delay: .15s; }
    .stat-card:nth-child(4) { animation-delay: .2s; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── WELCOME BANNER ── */
    .welcome-banner {
        background: linear-gradient(135deg, #1e3a5f 0%, #0f172a 60%, #1a1040 100%);
        border-radius: 18px;
        padding: 28px 32px;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-bottom: 28px;
        border: 1px solid rgba(255,255,255,0.05);
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -60px; right: -40px;
        width: 220px; height: 220px;
        background: radial-gradient(circle, rgba(99,179,237,0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        bottom: -50px; left: 160px;
        width: 180px; height: 180px;
        background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .welcome-banner h4 {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 6px;
        letter-spacing: -.4px;
    }

    .welcome-banner p {
        font-size: 13.5px;
        color: rgba(255,255,255,0.55);
        margin: 0;
        max-width: 420px;
    }

    .welcome-date {
        position: absolute;
        right: 32px;
        top: 50%;
        transform: translateY(-50%);
        text-align: right;
    }

    .welcome-date .date-big {
        font-size: 38px;
        font-weight: 900;
        color: rgba(255,255,255,0.15);
        line-height: 1;
        font-family: 'DM Mono', monospace;
        letter-spacing: -2px;
    }

    .welcome-date .date-small {
        font-size: 12px;
        color: rgba(255,255,255,0.4);
        font-family: 'DM Mono', monospace;
        letter-spacing: 1px;
        text-align: center;
        margin-top: 2px;
    }

    @media (max-width: 576px) {
        .welcome-date { display: none; }
        .welcome-banner { padding: 22px 20px; }
    }
</style>
@endpush

@section('content')

<!-- WELCOME BANNER -->
<div class="welcome-banner">
    <div style="position:relative; z-index:1;">
        <h4>Welcome back, {{ auth()->user()->name ?? 'Admin' }}! 👋</h4>
        <p>Here's what's happening with your college website today. Manage content, media, and more.</p>
        <div style="margin-top:18px; display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('admin.news.create') }}"
               style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.15); color:#fff; padding:8px 16px; border-radius:9px; font-size:12.5px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px; transition:all .2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.2)'"
               onmouseout="this.style.background='rgba(255,255,255,0.12)'">
               <i class="bi bi-plus-lg"></i> New Post
            </a>
            <a href="{{ route('admin.gallery.index') }}"
               style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.1); color:rgba(255,255,255,0.7); padding:8px 16px; border-radius:9px; font-size:12.5px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px; transition:all .2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.12)'"
               onmouseout="this.style.background='rgba(255,255,255,0.07)'">
               <i class="bi bi-images"></i> View Gallery
            </a>
        </div>
    </div>
    <div class="welcome-date">
        <div class="date-big">{{ now()->format('d') }}</div>
        <div class="date-small">{{ strtoupper(now()->format('M Y')) }}</div>
    </div>
</div>

<!-- STAT CARDS -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card blue">
            <div class="stat-card-top">
                <div class="stat-icon-wrap"><i class="bi bi-newspaper"></i></div>
                <div class="stat-trend up"><i class="bi bi-arrow-up-short"></i> Active</div>
            </div>
            <div class="stat-number">{{ $newsCount ?? 0 }}</div>
            <div class="stat-label">Total News Articles</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:72%"></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card amber">
            <div class="stat-card-top">
                <div class="stat-icon-wrap"><i class="bi bi-megaphone-fill"></i></div>
                <div class="stat-trend up"><i class="bi bi-arrow-up-short"></i> New</div>
            </div>
            <div class="stat-number">{{ $announcementsCount ?? 0 }}</div>
            <div class="stat-label">Announcements</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:58%"></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card green">
            <div class="stat-card-top">
                <div class="stat-icon-wrap"><i class="bi bi-images"></i></div>
                <div class="stat-trend flat"><i class="bi bi-dash"></i> Stable</div>
            </div>
            <div class="stat-number">{{ $galleryCount ?? 0 }}</div>
            <div class="stat-label">Gallery Items</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:45%"></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card purple">
            <div class="stat-card-top">
                <div class="stat-icon-wrap"><i class="bi bi-people-fill"></i></div>
                <div class="stat-trend up"><i class="bi bi-arrow-up-short"></i> Added</div>
            </div>
            <div class="stat-number">{{ $facultyCount ?? 0 }}</div>
            <div class="stat-label">Faculty Members</div>
            <div class="stat-bar"><div class="stat-bar-fill" style="width:85%"></div></div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <!-- Recent News -->
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="section-heading">
                    <div class="dot" style="background:#3b82f6;"></div>
                    Recent News
                </div>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentNews ?? [] as $item)
                        <tr>
                            <td>
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div class="item-icon" style="background:#eff6ff; color:#3b82f6;">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    <span style="font-weight:500;">{{ Str::limit($item->title, 28) }}</span>
                                </div>
                            </td>
                            <td style="font-size:12px; color:#94a3b8; font-family:'DM Mono',monospace;">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'active' ? 'active' : 'inactive' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div style="text-align:center; padding:32px; color:#94a3b8;">
                                    <i class="bi bi-newspaper" style="font-size:28px; display:block; margin-bottom:8px; opacity:.4;"></i>
                                    <span style="font-size:13px;">No news articles yet</span>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Announcements -->
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="section-heading">
                    <div class="dot" style="background:#f59e0b;"></div>
                    Recent Announcements
                </div>
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentAnnouncements ?? [] as $item)
                        <tr>
                            <td>
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div class="item-icon" style="background:#fffbeb; color:#d97706;">
                                        <i class="bi bi-megaphone"></i>
                                    </div>
                                    <span style="font-weight:500;">{{ Str::limit($item->title, 28) }}</span>
                                </div>
                            </td>
                            <td style="font-size:12px; color:#94a3b8; font-family:'DM Mono',monospace;">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'active' ? 'active' : 'inactive' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div style="text-align:center; padding:32px; color:#94a3b8;">
                                    <i class="bi bi-megaphone" style="font-size:28px; display:block; margin-bottom:8px; opacity:.4;"></i>
                                    <span style="font-size:13px;">No announcements yet</span>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- QUICK ACTIONS + CONTENT OVERVIEW -->
<div class="row g-3">
    <!-- Quick Actions -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="section-heading">
                    <div class="dot" style="background:#8b5cf6;"></div>
                    Quick Actions
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.news.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#eff6ff; color:#3b82f6;">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            Add News
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.announcements.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#fffbeb; color:#d97706;">
                                <i class="bi bi-megaphone-fill"></i>
                            </div>
                            Announce
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.gallery.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#ecfdf5; color:#10b981;">
                                <i class="bi bi-images"></i>
                            </div>
                            Gallery
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.tenders.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#eff6ff; color:#06b6d4;">
                                <i class="bi bi-file-earmark-plus-fill"></i>
                            </div>
                            Tender
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.faculty.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#faf5ff; color:#8b5cf6;">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            Faculty
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="{{ route('admin.sliders.create') }}" class="quick-action">
                            <div class="qa-icon" style="background:#f8fafc; color:#64748b;">
                                <i class="bi bi-collection-play-fill"></i>
                            </div>
                            Slider
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Overview -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="section-heading">
                    <div class="dot" style="background:#10b981;"></div>
                    Content Overview
                </div>
            </div>
            <div class="card-body">
                <div class="progress-item">
                    <div class="progress-label">
                        <span>News Articles</span>
                        <span>{{ $newsCount ?? 0 }} total</span>
                    </div>
                    <div class="progress-bar-wrap">
                        <div class="progress-fill" style="width:72%; background:linear-gradient(90deg,#93c5fd,#3b82f6);"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Announcements</span>
                        <span>{{ $announcementsCount ?? 0 }} total</span>
                    </div>
                    <div class="progress-bar-wrap">
                        <div class="progress-fill" style="width:58%; background:linear-gradient(90deg,#fcd34d,#f59e0b);"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Gallery Items</span>
                        <span>{{ $galleryCount ?? 0 }} total</span>
                    </div>
                    <div class="progress-bar-wrap">
                        <div class="progress-fill" style="width:45%; background:linear-gradient(90deg,#6ee7b7,#10b981);"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Faculty Members</span>
                        <span>{{ $facultyCount ?? 0 }} total</span>
                    </div>
                    <div class="progress-bar-wrap">
                        <div class="progress-fill" style="width:85%; background:linear-gradient(90deg,#c4b5fd,#8b5cf6);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection