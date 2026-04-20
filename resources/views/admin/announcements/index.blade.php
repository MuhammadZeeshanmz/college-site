@extends('admin.layouts.app')
@section('title', 'Announcements')
@section('page-title', 'Announcements')
@section('page-subtitle', 'Manage all announcements')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-megaphone me-2 text-warning"></i>All Announcements</h6>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Announcement
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Title</th><th>PDF</th><th>Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($announcements as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-weight:600;font-size:13.5px;">{{ Str::limit($item->title, 50) }}</td>
                    <td>
                        @if($item->pdf)
                            <a href="{{ asset('storage/'.$item->pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-file-pdf"></i> View
                            </a>
                        @else
                            <span class="text-muted" style="font-size:12px;">No PDF</span>
                        @endif
                    </td>
                    <td style="font-size:12.5px;">{{ $item->created_at->format('d M Y') }}</td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.announcements.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.announcements.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-inbox" style="font-size:32px;display:block;margin-bottom:8px;"></i>No announcements found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection