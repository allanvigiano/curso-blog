@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="Lista de Artigos">
        
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>

        <table-list-component 
            :headers="[{name: '#', id: 1}, {name: 'Título', id: 2}, {name: 'Descrição', id: 3}]"
            :items="{{ $articleList }}"
            detail="link"
            token="asdf asd"
            create="link"
            edit="link"
            delete-url="link"
            order="asc"
            col="1"
            :modal="true"

        >

        </table-list-component>
    </panel-component>
</page-component>
<modal-component modal-name="add" title="Adicionar">
    
    <form-component css-class="" action="#" method="get" enctype="teste" token="" form-id="formAdd"> 
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao">
        </div>
        
    </form-component>
    <span slot="buttons"> 
        <button form="formAdd" type="submit" class="btn btn-info">Adicionar</button>
    </span>

</modal-component>
<modal-component modal-name="edit" title="Editar">

    <form-component css-class="" action="#" method="get" enctype="teste" token="" form-id="formEdit"> 
        <div class="form-group">
            <label for="titulo">Título</label>
            <input v-model="$store.state.item.title" type="text" class="form-control" id="titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input v-model="$store.state.item.description" type="text" class="form-control" id="descricao">
        </div>
    </form-component>
    <span slot="buttons"> 
        <button form="formEdit" type="submit" class="btn btn-info">Atualizar</button>
    </span>
</modal-component>
<modal-component modal-name="detail" :title="$store.state.item.title">
    <p>@{{$store.state.item.description}}</p>
</modal-component>

@endsection
