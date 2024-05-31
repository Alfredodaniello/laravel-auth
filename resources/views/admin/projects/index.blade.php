@extends('layouts.admin')

@section('content')

<h1 class="text-center mb-3">I MIEI PROGETTI:</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">CREATED AT</th>
        <th scope="col">SLUG</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($projects as $project)
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->title}}</td>
            <td>{{$project->created_at}}</td>
            <td>{{$project->slug}}</td>
            <td>
                <a href="{{route('adminprojects.show', ['project'=> $project->id])}}">Dettagli</a>
                <a href="{{route('adminprojects.edit', ['project'=> $project->id])}}">Modifica</a>
                <form action="{{route('adminprojects.destroy', ['project'=> $project->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    
@endsection