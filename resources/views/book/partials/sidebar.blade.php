<div class="col-sm-4">
  <h1>User info</h1>
  <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" class="rounded" alt="プロフィール画像">
  <table class="table">
    <tbody>
      <tr>
        <th scope="row">name</th>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <th scope="row">introduction</th>
        <td>{{ $user->introduction }}</td>
      </tr>
    </tbody>
  </table>
  <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-user-edit"></i></a>
  <h1 class="mt-5">New Book</h1>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <label for="title">Title</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="title" name="title" aria-describedby="basic-addon3">
    </div>
    <label for="body">Opinion</label>
    <div class="input-group mb-3">
      <textarea id="body" name="body" class="form-control" aria-label="With textarea"></textarea>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Create Book</button>
  </form>
</div>