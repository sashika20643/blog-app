@extends('Admin.layout.adminlayout')
@section('content')



                <div class="row mt-5">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center">Categories</h2>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
                                <table class="table" >
                                    <thead>
                                        <tr >
                                            <th >ID</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td >{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category) }}"
                                                        class="btn  btn-outline-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('categories.destroy', $category) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn  btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


    @endsection
