@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include('book.partials.sidebar')
    @include('book.partials.index')
  </div>
</div>
@endsection