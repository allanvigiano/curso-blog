@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="Lista de Artigos">
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
@endsection
