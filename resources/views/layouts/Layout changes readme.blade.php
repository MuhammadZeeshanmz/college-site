{{-- 
    CHANGE IN layouts/app.blade.php:
    Update the topbar and navbar links as shown below.
    
    Find this section in topbar:
    <div class="topbar-right">
        <a href="#">Student Portal</a>
        <a href="#">Faculty Login</a>
        <a href="#">Results</a>
        <a href="#">Downloads</a>
    </div>
    
    REPLACE WITH:
    <div class="topbar-right">
        <a href="{{ route('student-portal') }}">Student Portal</a>
        <a href="{{ route('faculty') }}">Faculty</a>
        <a href="{{ route('results') }}">Results</a>
        <a href="#">Downloads</a>
    </div>
    
    ─────────────────────────────────────────
    
    Find this section in navbar:
    <ul class="nav-links" id="nav-links">
        <li><a href="{{ url('/') }}#about">About</a></li>
        <li><a href="{{ url('/') }}#programs">Programs</a></li>
        <li><a href="{{ url('/') }}#departments">Departments</a></li>
        <li><a href="{{ url('/') }}#news">News</a></li>
        <li><a href="{{ url('/') }}#contact">Contact</a></li>
        <li><a href="#" class="btn-apply">Apply Now</a></li>
    </ul>
    
    REPLACE WITH:
    <ul class="nav-links" id="nav-links">
        <li><a href="{{ url('/') }}#about">About</a></li>
        <li><a href="{{ url('/') }}#programs">Programs</a></li>
        <li><a href="{{ url('/') }}#departments">Departments</a></li>
        <li><a href="{{ route('news') }}">News</a></li>
        <li><a href="{{ route('faculty') }}">Faculty</a></li>
        <li><a href="{{ url('/') }}#contact">Contact</a></li>
        <li><a href="#" class="btn-apply">Apply Now</a></li>
    </ul>

--}}