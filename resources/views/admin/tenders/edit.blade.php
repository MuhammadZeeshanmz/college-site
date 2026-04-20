@extends('admin.layouts.app')
@section('title', 'Edit Tender')
@section('page-title', 'Edit Tender')
@section('page-subtitle', 'Update tender details')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-pencil me-2 text-info"></i>Edit Tender</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.tenders.update', $tender->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $tender->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $tender->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Date</label>
                        <input type="date" name="last_date" class="form-control"
                               value="{{ old('last_date', $tender->last_date) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PDF File</label>
                        @if($tender->pdf)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$tender->pdf) }}" target="_blank"
                                   class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-file-pdf me-1"></i>Current PDF
                                </a>
                            </div>
                        @endif
                        <input type="file" name="pdf" class="form-control" accept=".pdf">
                        <div class="form-text text-muted">Leave empty to keep current file.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ $tender->status=='active'?'selected':'' }}>Active</option>
                            <option value="inactive" {{ $tender->status=='inactive'?'selected':'' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Update</button>
                        <a href="{{ route('admin.tenders.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection