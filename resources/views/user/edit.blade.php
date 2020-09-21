@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card mx-auto shadow p-3 mb-5 bg-white rounded w-75 p-3" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">User info</h5>
        <form action="{{ route('users.update', auth()->user()->id) }}" method="POST" enctype='multipart/form-data'>
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control" id="name" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="image">Profile Image</label>
            <div>
              <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" class="rounded" alt="プロフィール画像">
            </div>
            <input type="file" name="profile_image" class="form-control-file" id="image" value="{{ $user->profile_image }}">
          </div>
          <div class="form-group">
            <label for="introduction">Introduction</label>
            <textarea class="form-control" name="introduction" id="introduction" rows="3">{{ $user->introduction }}</textarea>
          </div>
          <input class="btn btn-primary" type="submit" value="Update User">
        </form>
      </div>
    </div>
  </div>
@endsection