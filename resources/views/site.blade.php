@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="Artigos">
        <div class="row">
            <form class="col-lg-4 col-lg-offset-4" action="{{ route('home-page')}}" method="get">
                <div class="input-group">
                    <input name="search" type="text" value="{{ isset($search) ? $search : ''}}" class="form-control" placeholder="pesquisar artigo...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    </span>
                </div><!-- /input-group -->
            </form><!-- /.col-lg-6 -->
            <br>
        </div>
        <div class="row">
            @foreach($articles as $value)
            
            <article-card-component
                title="{{str_limit($value->title,20, '...')}}"
                author="{{$value->author}}"
                description="{{str_limit($value->description, 40, '...')}}"
                date-time="{{$value->date_time}}"
                link="{{ route('article', ['id'=> $value->id, 'title'=> str_slug($value->title, '-')]) }}"
                image="https://picsum.photos/500/300"
                sm="3"
                md="4"
            ></article-card-component>
            @endforeach
        </div>
        <div class="text-center">{{ $articles->links() }}</div>
    </panel-component>
    
</panel-component> 
@endsection
