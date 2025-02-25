@extends('layouts.app')

@section('title','Admin: Categories')

@section('content')
    <form action="{{ route('admin.categories.store')}}" method="post">
        @csrf
        <div class="row justify-content-center mb-3">
            <div class="col-4">
                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Add a category" autofocus>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add</button>
            </div>
        </div>
        @error('name')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </form>

    <div class="row">
        <div class="col-7">
            <table class="table table-hover align-middle bg-white border">
                <thead class="small table-warning">
                    <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNT</th>
                        <th>LAST UPDATED</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->categoryPost->count()}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td>
                                <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#update-category-{{$category->id}}">
                                    <i class="fa-solid fa-pencil "></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category-{{$category->id}}">
                                    <i class="fa-solid fa-trash-can "></i>
                                </button>
                            </td>
                        </tr>
                        @include('admin.categories.modals.action')
                    @endforeach
                    <tr>
                        <td></td>
                        <td class="fw-bold">
                            Uncategorized
                            <p class="xsmall mb-0 text-secondary fw-normal">Hidden posts are not included.</p>
                        </td>
                        <td>{{ $uncategorized_count}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

    
@endsection