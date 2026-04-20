@extends('admin.layouts.app')
@section('title', 'Add Slider')
@section('page-title', 'Add Slider')
@section('page-subtitle', 'Add a new homepage slider image')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-plus-circle me-2 text-dark"></i>Slider Details</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title') }}" placeholder="Slider heading text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control"
                               value="{{ old('subtitle') }}" placeholder="Slider sub-heading">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control"
                               value="{{ old('button_text') }}" placeholder="e.g. Learn More">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control"
                               value="{{ old('button_link') }}" placeholder="https://...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                               accept="image/*" required onchange="previewSlider(this)">
                        <div class="form-text text-muted">Recommended size: 1920×600px. Max 5MB.</div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="mt-2" id="sliderPreview" style="display:none;">
                            <img id="sliderSrc" style="width:100%;max-height:160px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', 0) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Save</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewSlider(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('sliderSrc').src = e.target.result;
            document.getElementById('sliderPreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
