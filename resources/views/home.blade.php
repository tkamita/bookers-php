@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('msg_success'))
    <div class="flash_message">
      {{ session('msg_success') }}
    </div>
  @endif
  <div class="row">
    @include('book.partials.sidebar')
    @include('book.partials.index')
  </div>
</div>
@endsection
