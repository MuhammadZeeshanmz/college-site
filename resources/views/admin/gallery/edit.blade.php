@extends('admin.layouts.app')
@section('title', 'Edit Gallery Image')
@section('page-title', 'Edit Gallery Image')
@section('page-subtitle', 'Update gallery item')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-pencil me-2 text-success"></i>Edit Image</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $gallery->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control"
                               value="{{ old('category', $gallery->category) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if($gallery->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$gallery->image) }}"
                                     style="max-height:90px;border-radius:8px;border:1px solid #e2e8f0;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Leave empty to keep current image.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ $gallery->status=='active'?'selected':'' }}>Active</option>
                            <option value="inactive" {{ $gallery->status=='inactive'?'selected':'' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Update</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection