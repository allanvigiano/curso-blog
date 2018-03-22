@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <panel-component color="default" title="Título">
                Conteúdo
                <div class="row">
                    <div class="col-md-4">
                        <panel-component color="blue" title="Título 1">
                            Conteúdo 
                        </panel-component>
                    </div>
                    <div class="col-md-4">
                        <panel-component color="warning" title="Título 2">
                            Conteúdo 
                        </panel-component>
                    </div>
                    <div class="col-md-4">
                        <panel-component color="orange" title="Título 3">
                            Conteúdo 
                        </panel-component>
                    </div>
                </div>
            </panel-component> 
        </div>
    </div>
</div>
@endsection
