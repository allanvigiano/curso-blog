@extends('layouts.app')

@section('content')
<page-component size="10">
    <panel-component color="panel-default" title="Título">
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>
        <div class="row">
            <div class="col-md-4">
                <box-component amount="80" title="Artigos" url="{{ route('articles.index') }}" color="orange" icon="ion ion-pie-graph">
                    Conteúdo 
                </box-component>
            </div>
            <div class="col-md-4">
                <box-component amount="3" title="Usuários" url="http://google.com" color="blue" icon="ion ion-person-stalker">
                    Conteúdo 
                </box-component>
            </div>
            <div class="col-md-4">
                <box-component amount="149" title="Autores" url="http://google.com" color="red" icon="ion ion-person">
                    Conteúdo 
                </box-component>
            </div>
        </div>
</panel-component> 
@endsection
