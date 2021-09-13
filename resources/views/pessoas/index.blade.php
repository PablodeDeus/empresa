@extends('layout')

@section('content')
<div class="content">
        
    <div class="page-header">
        <h1 class="title">Pessoas</h1>
        <ol class="breadcrumb">
            <li class="active">Pessoas</li>
        </ol>
        <div class="right">
            <a class="btn btn-success" href="{{ route('pessoas.create') }}">Adicionar</a>
        </div>
    </div>

        <div class="panel">
            <div class="row margin-b-15">
                <div>
                    <label for=""><h3>Pessoas</h3></label><br />
                </div>

                <div class="col-8">

                <button  onclick="mostrar_filtro()" class="btn btn-primary" id="filtro_button"> Mostrar filtros</button>
                {{-- {{dd($cargos)}} --}}
                
                <div class="hide" id = "filtro_div">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Cargos</h2>
                        </div>
                        <div class="col-md-4">
                            <h2>Setor</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::select('filtro_cargo', $cargos, old('filtro_cargo'), [ 'placeholder' => 'Mostrar Todos', 'id' => 'filtro_cargo', 'onchange' => 'refreshTablePessoas();']) }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::select('filtro_setor', $cargos, old('filtro_setor'), [ 'placeholder' => 'Mostrar Todos', 'id' => 'filtro_setor', 'onchange' => 'refreshTablePessoas();']) }}
                        </div>
                    </div>
                </div>

            </div>

            </div>
            <div class="row margin-b-15">

                <div class="">
                    <table id="pessoasTabela" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Cargo</th>
                                <th>Setor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Cargo</th>
                                <th>Setor</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')      
    
    <script type="text/javascript">
    
        var urlPessoasDefault = '{{ route('ajax.listPessoa') }}';
        var tablePessoas;

        function refreshTablePessoas() {
            tablePessoas.ajax.url(urlPessoasDefault);
            tablePessoas.draw();
        }
    
        $(document).ready(function() {
            tablePessoas = $('#pessoasTabela').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json'
                },
                searchDelay: 2500,
                processing: true,
                serverSide: true,
                autoWidth: false,
                paging: true,
                order: [0, 'desc'],
                ajax: {
                    url: urlPessoasDefault,
                    type: 'GET',
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter': {
                                'cargo': {
                                    'operator': '=',
                                    'value': $('#filtro_cargo').val()
                                }
                            }
                        });
                    }
                },
                fixedColumns: true,
                columns: [
                    {data: 'id'},
                    {data: 'nome'},
                    {data: 'email'},
                    {data: 'telefone'},
                    {data: 'cargo_nome', name: 'cargos.nome'},
                    {data: 'setor'},
                    {data: 'action', searchable: false}    
                ]
            });
        });
    

        function mostrar_filtro() {
            if($('#filtro_div').hasClass('hide')) {
            $('#filtro_button').html('Ocultar filtros')
            $('#filtro_div').removeClass('hide')
        } else {
            $('#filtro_button').html('Mostrar filtros')
            $('#filtro_div').addClass('hide')
        }
        }

    </script>
@endsection

