@extends('admin.layouts.app')

@section('title', 'News Management')
@section('page-title', 'News')
@section('page-subtitle', 'Manage all news articles')

@section('content')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-newspaper me-2 text-primary"></i>All News</h6>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add News
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight:600; font-size:13.5px;">{{ Str::limit($item->title, 40) }}</div>
                        <div style="font-size:12px; color:#94a3b8;">{{ Str::limit(strip_tags($item->description), 50) }}</div>
                    </td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}"
                                 style="width:45px;height:35px;object-fit:cover;border-radius:6px;">
                        @else
                            <span class="text-muted" style="font-size:12px;">No image</span>
                        @endif
                    </td>
                    <td style="font-size:12.5px;">{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <span class="badge badge-{{ $item->status == 'active' ? 'active' : 'inactive' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item->id) }}"
                           class="btn btn-sm btn-outline-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.news.destroy', $item->id) }}"
                              style="display:inline"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox" style="font-size:32px;display:block;margin-bottom:8px;"></i>
                        No news found. <a href="{{ route('admin.news.create') }}">Add one now</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($news, 'links'))
    <div class="card-footer d-flex justify-content-end" style="border-top:1px solid #f1f5f9;">
        {{ $news->links() }}
    </div>
    @endif
</div>

@endsection
