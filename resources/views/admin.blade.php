@extends('layouts.app')

@section('content')
<page-component size="10">
    <panel-component color="panel-default" title="Título">
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>
        <div class="row">
        @can('is-author')
            <div class="col-md-4">
                <box-component amount="{{ $countArticles }}" title="Artigos" url="{{ route('articles.index') }}" color="orange" icon="ion ion-pie-graph">
                    Conteúdo 
                </box-component>
 
            </div>
        @endcan
        @can('is-admin')
            <div class="col-md-4">
                <box-component amount="{{ $countUsers }}" title="Usuários" url="{{ route('users.index') }}" color="blue" icon="ion ion-person-stalker">
                    Conteúdo 
                </box-component>
            </div>
            <div class="col-md-4">
                <box-component amount="{{ $countAuthors }}" title="Autores" url="{{ route('authors.index') }}" color="red" icon="ion ion-person">
                    Conteúdo 
                </box-component>
            </div>
            <div class="col-md-4">
                <box-component amount="{{ $countAdmins }}" title="Administradores" url="{{ route('admins.index') }}" color="green" icon="ion ion-person">
                    Conteúdo 
                </box-component>
            </div>
        @endcan
        </div>
</panel-component> 
@endsection
