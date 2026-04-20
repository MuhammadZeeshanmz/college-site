@extends('admin.layouts.app')
@section('title', 'Edit Download')
@section('page-title', 'Edit Download')
@section('page-subtitle', 'Update download file')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-pencil me-2" style="color:#0891b2;"></i>Edit Download</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.downloads.update', $download->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $download->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control"
                               value="{{ old('category', $download->category) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $download->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File</label>
                        @if($download->file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$download->file) }}" target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download me-1"></i>Current File
                                </a>
                            </div>
                        @endif
                        <input type="file" name="file" class="form-control">
                        <div class="form-text text-muted">Leave empty to keep current file.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ $download->status=='active'?'selected':'' }}>Active</option>
                            <option value="inactive" {{ $download->status=='inactive'?'selected':'' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Update</button>
                        <a href="{{ route('admin.downloads.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
