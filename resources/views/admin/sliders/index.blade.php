@extends('admin.layouts.app')
@section('title', 'Sliders')
@section('page-title', 'Sliders')
@section('page-subtitle', 'Manage homepage slider images')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-sliders me-2 text-dark"></i>All Sliders</h6>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Slider
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Image</th><th>Title</th><th>Order</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($sliders as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}"
                                 style="width:80px;height:45px;object-fit:cover;border-radius:7px;border:1px solid #e2e8f0;">
                        @else
                            <div style="width:80px;height:45px;background:#f1f5f9;border-radius:7px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:13.5px;">{{ Str::limit($item->title ?? 'No Title', 35) }}</div>
                        @if($item->subtitle)
                            <div style="font-size:12px;color:#94a3b8;">{{ Str::limit($item->subtitle, 40) }}</div>
                        @endif
                    </td>
                    <td>
                        <span class="badge" style="background:#f8fafc;color:#475569;border:1px solid #e2e8f0;">
                            {{ $item->sort_order ?? 0 }}
                        </span>
                    </td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.sliders.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-images" style="font-size:32px;display:block;margin-bottom:8px;"></i>No sliders found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
