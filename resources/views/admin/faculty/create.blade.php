@extends('admin.layouts.app')
@section('title', 'Add Faculty')
@section('page-title', 'Add Faculty')
@section('page-subtitle', 'Add a new faculty member')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-plus-circle me-2" style="color:#9333ea;"></i>Faculty Details</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.faculty.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control"
                                   value="{{ old('designation') }}" placeholder="e.g. Professor, Lecturer">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control"
                                   value="{{ old('department') }}" placeholder="e.g. Computer Science">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email') }}" placeholder="faculty@example.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text" name="qualification" class="form-control"
                                   value="{{ old('qualification') }}" placeholder="e.g. PhD, M.Phil">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Bio / Description</label>
                            <textarea name="description" class="form-control" rows="3"
                                      placeholder="Brief bio...">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*"
                                   onchange="previewPhoto(this)">
                            <div class="mt-2" id="photoPreview" style="display:none;">
                                <img id="photoSrc" style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:2px solid #e2e8f0;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', 0) }}" min="0">
                            <div class="form-text text-muted">Lower number = appears first.</div>
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Save</button>
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoSrc').src = e.target.result;
            document.getElementById('photoPreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
