<div class="col-sm-8">
  <h1>Books</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Title</th>
        <th scope="col">Opinion</th>
        <th scope="col"></th>
      </tr>
    </thead>
    @foreach($user->books as $book)
      <tbody>
        <tr>
          <th scope="row" class="w-25"><img src="{{ asset('storage/profiles/'.$book->user->profile_image) }}" alt="" class="rounded-circle w-50"></th>
          <td><a class="text-secondary" href="{{ url('books/' . $book->id) }}">{{ $book->title }}</a></td>
          <td>{{ $book->body }}</td>
          <td></td>
        </tr>
      </tbody>
    @endforeach
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      {{ $user->books->links() }}
    </ul>
  </nav>
</div>