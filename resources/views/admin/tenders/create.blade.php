@extends('admin.layouts.app')
@section('title', 'Add Tender')
@section('page-title', 'Add Tender')
@section('page-subtitle', 'Create a new tender')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-plus-circle me-2 text-info"></i>Tender Details</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.tenders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Date</label>
                        <input type="date" name="last_date" class="form-control" value="{{ old('last_date') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PDF File</label>
                        <input type="file" name="pdf" class="form-control" accept=".pdf">
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
                        <a href="{{ route('admin.tenders.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection