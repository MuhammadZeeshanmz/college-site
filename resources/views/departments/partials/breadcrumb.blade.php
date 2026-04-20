{{-- resources/views/departments/partials/breadcrumb.blade.php --}}
<div class="dept-breadcrumb">
    <div class="wrap">
        <a href="{{ url('/') }}">Home</a><span class="sep">›</span>
        <a href="#">Departments</a><span class="sep">›</span>
        <a href="{{ route('department.show', $dept['slug']) }}">{{ $dept['name'] }}</a><span class="sep">›</span>
        <span style="color:#fff;">{{ $pageTitle }}</span>
    </div>
</div>