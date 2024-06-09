@extends('layouts.admin');


@section('content')
    <h1 class="text-center">{{$project->title}}</h1>
    @if ($project->cover_image)
        <div class="my-img">
            <img src="{{ asset('storage/' . $project->cover_image)}}" alt="">
        </div>
    @endif
    <div class="mb-1"><strong>Slug:</strong> {{$project->slug}}</div>
    <div class="mb-3"><strong>Created at:</strong> {{$project->created_at}}</div>
    <p><strong>Sommario:</strong> {{$project->summary}}</p>
@endsection