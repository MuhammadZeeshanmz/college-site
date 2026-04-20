@extends('admin.layouts.app')
@section('title', 'Faculty')
@section('page-title', 'Faculty')
@section('page-subtitle', 'Manage faculty members')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-people me-2" style="color:#9333ea;"></i>All Faculty Members</h6>
        <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Faculty
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Photo</th><th>Name</th><th>Designation</th><th>Department</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($faculty as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->photo)
                            <img src="{{ asset('storage/'.$item->photo) }}"
                                 style="width:40px;height:40px;object-fit:cover;border-radius:50%;border:2px solid #e2e8f0;">
                        @else
                            <div style="width:40px;height:40px;background:#f3e8ff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:#9333ea;font-size:14px;">
                                {{ strtoupper(substr($item->name, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:13.5px;">{{ $item->name }}</div>
                        @if($item->email)
                            <div style="font-size:12px;color:#94a3b8;">{{ $item->email }}</div>
                        @endif
                    </td>
                    <td style="font-size:13px;">{{ $item->designation ?? '—' }}</td>
                    <td>
                        @if($item->department)
                            <span class="badge" style="background:#fdf4ff;color:#9333ea;">{{ $item->department }}</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.faculty.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.faculty.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-5 text-muted">
                    <i class="bi bi-people" style="font-size:32px;display:block;margin-bottom:8px;"></i>No faculty members found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
