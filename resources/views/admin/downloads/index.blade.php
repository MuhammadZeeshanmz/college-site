@extends('admin.layouts.app')
@section('title', 'Downloads')
@section('page-title', 'Downloads')
@section('page-subtitle', 'Manage downloadable files')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-download me-2" style="color:#0891b2;"></i>All Downloads</h6>
        <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Download
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Title</th><th>Category</th><th>File</th><th>Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($downloads as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-weight:600;font-size:13.5px;">{{ Str::limit($item->title, 40) }}</td>
                    <td>
                        @if($item->category)
                            <span class="badge" style="background:#f0f9ff;color:#0891b2;">{{ $item->category }}</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if($item->file)
                            <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download me-1"></i>Download
                            </a>
                        @else
                            <span class="text-muted" style="font-size:12px;">No file</span>
                        @endif
                    </td>
                    <td style="font-size:12.5px;">{{ $item->created_at->format('d M Y') }}</td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.downloads.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.downloads.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-5 text-muted">
                    <i class="bi bi-file-earmark-arrow-down" style="font-size:32px;display:block;margin-bottom:8px;"></i>No downloads found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
