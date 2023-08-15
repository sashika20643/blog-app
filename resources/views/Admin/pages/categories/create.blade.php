@extends('Admin.layout.adminlayout')
@section('content')



<div class="container">
    <h2>Create Category</h2>
    <form action="{{ route('categories.store') }}" class="forms-sample" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
