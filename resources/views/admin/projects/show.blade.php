@extends('layouts.admin');


@section('content')
    <h1 class="text-center">{{$project->title}}</h1>
    <div class="mb-1"><strong>Slug:</strong> {{$project->slug}}</div>
    <div class="mb-3"><strong>Created at:</strong> {{$project->created_at}}</div>
    <p><strong>Sommario:</strong> {{$project->summary}}</p>
@endsection