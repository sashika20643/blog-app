@extends('Admin.layout.adminlayout')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Edit Post</h2>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image</label>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="img-fluid mb-2">
                        @endif
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror ">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
@endsection
