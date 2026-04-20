@extends('admin.layouts.app')
@section('title', 'Tenders')
@section('page-title', 'Tenders')
@section('page-subtitle', 'Manage tender documents')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6><i class="bi bi-file-earmark-text me-2 text-info"></i>All Tenders</h6>
        <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Tender
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>#</th><th>Title</th><th>Last Date</th><th>PDF</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($tenders as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight:600;font-size:13.5px;">{{ Str::limit($item->title, 45) }}</div>
                        @if($item->description)
                            <div style="font-size:12px;color:#94a3b8;">{{ Str::limit($item->description, 50) }}</div>
                        @endif
                    </td>
                    <td style="font-size:12.5px;">
                        @if($item->last_date)
                            <span class="{{ \Carbon\Carbon::parse($item->last_date)->isPast() ? 'text-danger' : 'text-success' }}">
                                {{ \Carbon\Carbon::parse($item->last_date)->format('d M Y') }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if($item->pdf)
                            <a href="{{ asset('storage/'.$item->pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-file-pdf"></i> View
                            </a>
                        @else
                            <span class="text-muted" style="font-size:12px;">No PDF</span>
                        @endif
                    </td>
                    <td><span class="badge badge-{{ $item->status=='active'?'active':'inactive' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.tenders.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.tenders.destroy', $item->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-file-earmark" style="font-size:32px;display:block;margin-bottom:8px;"></i>No tenders found.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection