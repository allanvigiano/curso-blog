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
    <panel-component title="Lista de Usuários">
        
        <breadcrumb-component :list='{{ $breadcrumbList }}'></breadcrumb-component>

        <table-list-component 
            :headers="[{name: '#', id: 1}, {name: 'E-mail', id: 2}, {name: 'Nome', id: 3}]"
            :items="{{ json_encode($modelList) }}"
            detail="/admin/admins/"
            token="{{csrf_token()}}"
            create="link"
            edit="/admin/admins/"
            order="asc"
            col="1"
            :modal="true"

        >
        </table-list-component>
        <div class="text-center">{{ $modelList->links() }}</div>
    </panel-component>
</page-component>
<modal-component modal-name="add" title="Adicionar">
    
    <form-component css-class="" action="{{route('admins.store')}}" method="post" enctype="" token="{{csrf_token()}}" form-id="formAdd"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="descricao">Administrador</label>
            <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin">
                <option value="N" {{old('admin') == 'N' ? 'selected' : ''}}>Não</option>
                <option value="Y" {{old('admin') == 'Y' || ! old('admin') ? 'selected' : ''}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
        </div>
    </form-component>
    <span slot="buttons"> 
        <button form="formAdd" type="submit" class="btn btn-info">Adicionar</button>
    </span>

</modal-component>
<modal-component modal-name="edit" title="Editar">

    <form-component css-class="" :action="'/admin/admins/' + $store.state.item.id" method="put" enctype="teste" token="{{csrf_token()}}" form-id="formEdit"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input v-model="$store.state.item.name" type="text" class="form-control" id="nome" name="name">
        </div>
        <div class="form-group">
            <label for="descricao">E-mail</label>
            <input v-model="$store.state.item.email" type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="descricao">Autor</label>
            <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin">
                <option value="N" {{old('admin') == 'N' ? 'selected' : ''}}>Não</option>
                <option value="Y" {{old('admin') == 'Y' ? 'selected' : ''}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Administrador</label>
            <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin">
                <option value="N" {{old('admin') == 'N' ? 'selected' : ''}}>Não</option>
                <option value="Y" {{old('admin') == 'Y' || ! old('admin') ? 'selected' : ''}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Nova Senha</label>
            <input type="password" class="form-control" id="password" name="password" v-model="$store.state.item.password">
        </div>
    </form-component>
    <span slot="buttons"> 
        <button form="formEdit" type="submit" class="btn btn-info">Atualizar</button>
    </span>
</modal-component>
<modal-component modal-name="detail" :title="$store.state.item.name">
    <p>@{{$store.state.item.email}}</p>
    <p>@{{$store.state.item.name}}</p>
    <p>@{{$store.state.item.password}}</p>
</modal-component>

@endsection
