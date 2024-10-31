@extends('layouts.app')

@section('title','Create Post')

@section('content')
    <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            {{-- Category --}}

            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-secondary fw-normal">(up to 3)</span>
            </label>

            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" id="{{ $category->name}}" value="{{ $category->id}}" class="form-check-input">
                    <label for="{{ $category->name}}" class="form-check-label">{{ $category->name}}</label>
                </div>
                
            @endforeach
            {{-- Error --}}
            @error('category')
                <div class="text-danger small">{{ $message}}</div>
                
            @enderror
        </div>

        <div class="mb-3">
            {{-- Description --}}

            <label for="description" class="form-label d-block fw-bold">Description</label>
            <textarea name="description" id="description" cols="30" rows="3" placeholder="What's on your mind?" class="form-control" >{{ old('description')}}</textarea>
            {{-- Error --}}
            @error('description')
                <div class="text-danger small">{{ $message}}</div>
                
            @enderror
        </div>

        <div class="mb-4">
            {{-- Image --}}

            <label for="image" class="form-label d-block fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                    <div id="image-info" class="form-text">
                        Acceptable formats are jpeg, jpg, png, gif only .
                        <br>
                        Max file size is 1048kb.
                    </div>
                    {{-- Error --}}
                    @error('image')
                        <div class="text-danger small">{{ $message}}</div>
                
                    @enderror

        </div>

        {{-- Submit btn --}}

        <div class="col">
            <button type="submit" class="btn btn-primary px-5">Post</button>
        </div>
    </form>
@endsection