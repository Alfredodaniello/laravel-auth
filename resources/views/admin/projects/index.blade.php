@extends('layouts.admin')

@section('content')

<h1 class="text-center mb-3">I MIEI PROGETTI:</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">CREATED AT</th>
        <th scope="col">SLUG    </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($projects as $project)
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->title}}</td>
            <td>{{$project->created_at}}</td>
            <td>{{$project->slug}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
    
@endsection