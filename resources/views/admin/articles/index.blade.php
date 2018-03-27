@extends('layouts.app')

@section('content')
<page-component size="12">
    <panel-component title="Lista de Artigos">
        <table-list-component 
            :headers="[{name: '#', id: 1}, {name: 'Título', id: 2}, {name: 'Descrição', id: 3}]"
            :items="[
                [1, 'PHP1', 'Curso de PHP'],
                [2, 'PHP2', 'Curso de PHP'],
                [3, 'js', 'Curso de PHP'],
                [4, 'laravel', 'Curso de PHP'],
            ]"
            detail="link"
            token="asdf asd"
            create="link"
            edit="link"
            delete-url="link"

        >

        </table-list-component>
    </panel-component>
</page-component>
@endsection
