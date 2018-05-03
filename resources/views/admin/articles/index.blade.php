@extends('layouts.app')

@section('content')
<page-component size="12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <panel-component title="Lista de Artigos">
        
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>

        <table-list-component 
            :headers="[{name: '#', id: 1}, {name: 'Título', id: 2}, {name: 'Descrição', id: 3}, {name: 'Autor', id: 4}, {name: 'Criação', id: 5}]"
            :items="{{ json_encode($articleList) }}"
            detail="/admin/articles/"
            token="{{csrf_token()}}"
            create="link"
            edit="/admin/articles/"
            delete-url="/admin/articles/"
            order="desc"
            col="1"
            :modal="true"

        >
        </table-list-component>
        <div class="text-center">{{ $articleList->links() }}</div>
    </panel-component>
</page-component>

<!-- Modal Add -->
<modal-component modal-name="add" title="Adicionar">
    <form-component css-class="" action="{{route('articles.store')}}" method="post" enctype="" token="{{csrf_token()}}" form-id="formAdd"> 
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="description" value="{{old('description')}}">
        </div>
        <div class="form-group">
            <label for="criacao">Criação</label>
            <input type="date" class="form-control" id="criacao" name="date_time" value="{{old('date_time')}}">
        </div>
        <div class="form-group">
            <label for="addContent">Conteúdo</label>
            <editor-component 
                value="{{ old('content') }}"
                name="content" 
                id="addContent">
            </editor-component>
        </div>
    </form-component>
    <span slot="buttons"> 
        <button form="formAdd" type="submit" class="btn btn-info">Adicionar</button>
    </span>

</modal-component>

<!-- Modal Edit -->
<modal-component modal-name="edit" title="Editar">

    <form-component css-class="" :action="'/admin/articles/' + $store.state.item.id" method="put" enctype="teste" token="{{csrf_token()}}" form-id="formEdit"> 
        <div class="form-group">
            <label for="titulo">Título</label>
            <input v-model="$store.state.item.title" type="text" class="form-control" id="titulo" name="title">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input v-model="$store.state.item.description" type="text" class="form-control" id="descricao" name="description">
        </div>
        <div class="form-group">
            <label for="criacao">Criação</label>
            <input type="date" class="form-control" id="criacao" name="date_time" v-model="$store.state.item.date_time">
        </div>
        <div class="form-group">
            <label for="editContent">Conteúdo</label>
            <editor-component 
                name="content" 
                id="editContent"
                :value="$store.state.item.content">
            </editor-component>
        </div>
    </form-component>
    <span slot="buttons"> 
        <button form="formEdit" type="submit" class="btn btn-info">Atualizar</button>
    </span>
</modal-component>
<modal-component modal-name="detail" :title="$store.state.item.title">
    <p>@{{$store.state.item.description}}</p>
    <p>@{{$store.state.item.content}}</p>
    <p>@{{$store.state.item.date_time}}</p>
</modal-component>

@endsection