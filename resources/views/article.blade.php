@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="">
        <h2 align="center">{{$article->title}}</h2>
        <h4 align="center">{{$article->description}}</h4>
        <p>{!! $article->content !!}</p>
        <p align="center">
            <small>
                {{ $article->user->name }} - 
                {{ date('d/m/Y', strtotime($article->date_time)) }}
            </small>
        </p>
    </panel-component>
    
</panel-component> 
@endsection
