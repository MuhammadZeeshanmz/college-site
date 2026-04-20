@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">

        <!-- LEFT SIDE (Main Content) -->
        <div class="col-md-8">

            <h4 class="mb-3">List of Important Official Websites</h4>

            <div class="list-group">

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Higher Education Commission of Pakistan
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Higher Education Commission Digital Library for UoH
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Government of Khyber Pakhtunkhwa Official Website
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Government of Pakistan Official Website
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Federal Public Service Commission of Pakistan
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Khyber Pakhtunkhwa Public Service Commission
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ Centre of Excellence for CPEC (China-Pakistan Economic Corridor)
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    ➤ National Computing Education Accreditation Council (NCEAC)
                </a>

            </div>

        </div>

        <!-- RIGHT SIDE (Sidebar) -->
        <div class="col-md-4">

            <!-- IMPORTANT LINKS -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white text-center">
                    IMPORTANT LINKS
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">QEC</li>
                    <li class="list-group-item">ORIC</li>
                    <li class="list-group-item">Career Development Center</li>
                    <li class="list-group-item">University Advancement Cell</li>
                    <li class="list-group-item">Central Research Laboratory</li>
                    <li class="list-group-item">Journal of Management</li>
                    <li class="list-group-item">Journal of Islamic & Religious Studies</li>
                    <li class="list-group-item">Haripur Journal of Educational Research</li>
                </ul>
            </div>

            <!-- NEWS & EVENTS -->
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    NEWS & EVENTS
                </div>

                <div class="card-body p-2">

                    <p class="mb-2">
                        ▶ Revised fee Schedule for Semester Fee of Spring 2026
                        <span class="badge bg-warning text-dark">New</span><br>
                        <small class="text-muted">27 Feb 2026</small>
                    </p>

                    <hr>

                    <p class="mb-2">
                        ▶ Cohort II Announces Top 10 Startups from 23 Promising Applications
                        <span class="badge bg-warning text-dark">New</span><br>
                        <small class="text-muted">19 Feb 2026</small>
                    </p>

                    <hr>

                    <p class="mb-0">
                        ▶ The University of Haripur Conducted One-Day Training on Effective Meeting Practices
                        <span class="badge bg-warning text-dark">New</span><br>
                        <small class="text-muted">15 Feb 2026</small>
                    </p>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection