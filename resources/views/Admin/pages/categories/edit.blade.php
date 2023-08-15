@extends('Admin.layout.adminlayout')
@section('content')



<h2>Edit Category</h2>
<form class="forms-sample" action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection
