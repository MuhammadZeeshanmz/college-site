@extends('admin.layouts.app')
@section('title', 'Edit Slider')
@section('page-title', 'Edit Slider')
@section('page-subtitle', 'Update slider image')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-pencil me-2 text-dark"></i>Edit Slider</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $slider->title) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control"
                               value="{{ old('subtitle', $slider->subtitle) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control"
                               value="{{ old('button_text', $slider->button_text) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control"
                               value="{{ old('button_link', $slider->button_link) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if($slider->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$slider->image) }}"
                                     style="width:100%;max-height:120px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Leave empty to keep current image.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', $slider->sort_order ?? 0) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ $slider->status=='active'?'selected':'' }}>Active</option>
                                <option value="inactive" {{ $slider->status=='inactive'?'selected':'' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Update</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
