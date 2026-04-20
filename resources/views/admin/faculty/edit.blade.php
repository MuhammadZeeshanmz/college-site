@extends('admin.layouts.app')
@section('title', 'Edit Faculty')
@section('page-title', 'Edit Faculty')
@section('page-subtitle', 'Update faculty member details')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h6><i class="bi bi-pencil me-2" style="color:#9333ea;"></i>Edit Faculty Member</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.faculty.update', $faculty->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name', $faculty->name) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control"
                                   value="{{ old('designation', $faculty->designation) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control"
                                   value="{{ old('department', $faculty->department) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $faculty->email) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{ old('phone', $faculty->phone) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text" name="qualification" class="form-control"
                                   value="{{ old('qualification', $faculty->qualification) }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Bio / Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $faculty->description) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo</label>
                            @if($faculty->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$faculty->photo) }}"
                                         style="width:70px;height:70px;object-fit:cover;border-radius:50%;border:2px solid #e2e8f0;">
                                </div>
                            @endif
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            <div class="form-text text-muted">Leave empty to keep current photo.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', $faculty->sort_order ?? 0) }}" min="0">
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ $faculty->status=='active'?'selected':'' }}>Active</option>
                                <option value="inactive" {{ $faculty->status=='inactive'?'selected':'' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Update</button>
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
