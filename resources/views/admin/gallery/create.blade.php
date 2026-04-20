@extends('admin.layouts.app')
@section('title', 'Add Gallery Image')
@section('page-title', 'Add Gallery Image')
@section('page-subtitle', 'Upload a new gallery image')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-plus-circle me-2 text-success"></i>Image Details</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
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
                               value="{{ old('category') }}" placeholder="e.g. Events, Campus, Sports">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                               accept="image/*" required id="imgInput" onchange="previewImg(this)">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="mt-2" id="imgPreview" style="display:none;">
                            <img id="previewSrc" style="max-height:120px;border-radius:8px;border:1px solid #e2e8f0;">
                        </div>
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
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewSrc').src = e.target.result;
            document.getElementById('imgPreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush