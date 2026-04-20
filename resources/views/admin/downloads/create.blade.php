@extends('admin.layouts.app')
@section('title', 'Add Download')
@section('page-title', 'Add Download')
@section('page-subtitle', 'Upload a new downloadable file')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-plus-circle me-2" style="color:#0891b2;"></i>Download Details</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control"
                               value="{{ old('category') }}" placeholder="e.g. Forms, Syllabus, Results">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="Brief description...">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                        <div class="form-text text-muted">Accepted: PDF, DOC, DOCX, XLS, XLSX, ZIP. Max 10MB.</div>
                        @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Save</button>
                        <a href="{{ route('admin.downloads.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
