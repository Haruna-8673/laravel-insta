@extends('layouts.app')

@section('title','Edit Profile')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8">
            <form action="{{ route('profile.update',$user->id)}}" method="post" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <h3 class="h3 mb-3 fw-light text-secondary">Update Profile</h3>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            @if ($user->avatar)
                                <img src="{{$user->avatar}}" alt="{{$user->name}} " class="rounded-circle d-block mx-auto avatar-lg img-thumbnail">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                            @endif
                        </div>
    
                        <div class="col-auto align-self-end">
                            <input type="file" name="avatar" id="image" class="form-control" aria-describedby="image-info">
                            <div id="image-info" class="form-text">
                                Acceptable formats: jpeg, jpg, png, gif only
                                <br>
                                Max file size is 1048kb
                            </div>
                            @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>    
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control w-100" name="name" id="name"
                        value="{{ old('name', $user->name) }}" autofocus>
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail Address</label>
                    <input type="email" class="form-control w-100" name="email" id="email"
                        value="{{ old('email', $user->email) }}" autofocus>
                    @error('email')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="introduction" class="form-label d-block fw-bold">Introduction</label>
                    <textarea name="introduction" id="introduction" cols="30" rows="3" placeholder="Describe yourself" class="form-control" >{{ old('introduction',$user->introduction)}}</textarea>
                    @error('introduction')
                        <div class="text-danger small">{{ $message}}</div>
                    @enderror
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-warning px-5">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection