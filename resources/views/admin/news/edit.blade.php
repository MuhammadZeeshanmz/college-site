@extends('admin.layouts.app')

@section('title', 'Edit News')
@section('page-title', 'Edit News')
@section('page-subtitle', 'Update news article')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6><i class="bi bi-pencil me-2 text-primary"></i>Edit News</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $news->title) }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description', $news->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if($news->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$news->image) }}"
                                     style="height:80px;border-radius:8px;border:1px solid #e2e8f0;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Leave empty to keep current image.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PDF File</label>
                        @if($news->pdf)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$news->pdf) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-file-pdf me-1"></i>Current PDF
                                </a>
                            </div>
                        @endif
                        <input type="file" name="pdf" class="form-control" accept=".pdf">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ $news->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $news->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Update News
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
