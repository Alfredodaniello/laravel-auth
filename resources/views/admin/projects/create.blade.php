@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Crea un progetto</h1>
    <form action="{{route('adminprojects.store')}}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary"  name="summary" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection