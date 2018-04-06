@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="Lista de Artigos">
        
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>

        <modal-link-component
            title="Criar"
            modal-name="teste"
            css-class="btn btn-large btn-danger"
        ></modal-link-component>
        <table-list-component 
            :headers="[{name: '#', id: 1}, {name: 'Título', id: 2}, {name: 'Descrição', id: 3}]"
            :items="[
                [1, 'aPHP1', 'dCurso de PHP'],
                [2, 'bPHP2', 'aCurso de PHP'],
                [3, 'cjs', 'bCurso de PHP'],
                [4, 'dlaravel', 'cCurso de PHP'],
            ]"
            detail="link"
            token="asdf asd"
            create="link"
            edit="link"
            delete-url="link"
            order="asc"
            col="1"

        >

        </table-list-component>
    </panel-component>
</page-component>
<modal-component modal-name="teste">
    <panel-component title="Novo Artigo">
        <form-component
            css-class=""
            action="#"
            method="post"
            enctype="teste"
            token=""
        >
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao">
            </div>
            <button type="submit" class="btn btn-info">Adicionar</button>
        </form-component>
    </panel-component>
</modal-component>
@endsection
