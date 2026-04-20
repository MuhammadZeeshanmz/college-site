@extends('admin.layouts.app')
@section('title', 'Gallery')
@section('page-title', 'Gallery')
@section('page-subtitle', 'Manage gallery images')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-images me-2 text-success"></i>All Gallery Items</h6>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Image
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Image</th><th>Title</th><th>Category</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($gallery as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}"
                                 style="width:55px;height:42px;object-fit:cover;border-radius:7px;">
                        @else
                            <div style="width:55px;height:42px;background:#f1f5f9;border-radius:7px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight:600;font-size:13.5px;">{{ Str::limit($item->title, 35) }}</td>
                    <td><span class="badge" style="background:#eff6ff;color:#2563eb;">{{ $item->category ?? 'General' }}</span></td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-images" style="font-size:32px;display:block;margin-bottom:8px;"></i>No gallery items found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection