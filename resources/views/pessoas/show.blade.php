@extends('layout')
@section('content')
<div class="content">

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'pessoa')" id="defaultOpen">Home</button>
        <button class="tablinks" onclick="openCity(event, 'tarefasCriadas')">Tarefas Criadas</button>
        <button class="tablinks" onclick="openCity(event, 'tarefasRecebidas')">Tarefas Recebidas</button>
    </div>


    {{-- {{ dd($data->id) }} --}}
    <div class="container-padding">
        <div class="panel-heading">
            <h2> Pessoa </h2>
        </div>

        <div class="container-padding">

            <div class="panel-body">

                <div class="col-md-6 col-lg-12">
                    <div id="pessoa" class="tabcontent">
                        Pessoa
                    </div>
                    <div id="tarefasRecebidas" class="tabcontent">
                        <h1>Tarefas recebidas</h1>
                        <table class="table" id="tabelaRecebido">
                            <thead>
                                {{-- <td>Id</td>
                                <td>Nome</td>
                                <td>Descricao</td>
                                <td>Ações</td> --}}
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Criador</th>
                                <th>Responsavel</th>
                                <th>Ações</th>
                            </thead>
                            <tfoot>
                                {{-- <td>Id</td>
                                <td>Nome</td>
                                <td>Descricao</td>
                                <td>Ações</td> --}}
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Criador</th>
                                <th>Responsavel</th>
                                <th>Ações</th>
                            </tfoot>
                        </table>
                    </div>
                    <div id="tarefasCriadas" class="tabcontent">
                        <h1>Tarefas recebidas</h1>
                        <table class="table" id="tabelaCriada">
                            <thead>
                                {{-- <td>Id</td>
                                <td>Nome</td>
                                <td>Descricao</td>
                                <td>Ações</td> --}}
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Criador</th>
                                <th>Responsavel</th>
                                <th>Ações</th>
                            </thead>
                            <tfoot>
                                {{-- <td>Id</td>
                                <td>Nome</td>
                                <td>Descricao</td>
                                <td>Ações</td> --}}
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Criador</th>
                                <th>Responsavel</th>
                                <th>Ações</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')      
    
    <script type="text/javascript">
    
        var urlPessoaTarefaRecebida = '{{ route('ajax.listTask') }}';
        var urlPessoaTarefaCriada = '{{ route('ajax.listTask') }}';
        var tableReceber;
        var tabelacriador;

    
    $(document).ready(function() {
        // Get the element with id="defaultOpen" and click on it

        document.getElementById("defaultOpen").click();

        tableReceber = $('#tabelaRecebido').DataTable({
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
                url: urlPessoaTarefaRecebida,
                type: 'GET' ,
                data: {   
                    'id':'{{$data->id}}',
                    'funcao':'responsavel'

                }         
            },
            fixedColumns: true,
            columns: [
                // {data: 'id'},
                // {data: 'name'},
                // {data: 'description'},
                // {data: 'action', searchable: false} 
                {data: 'id'},
                {data: 'name'},
                {data: 'description'},
                {data: 'id_creater'},
                {data: 'id_assigned'},
                {data: 'action', searchable: false}  
            ]
        });
        tabelacriador = $('#tabelaCriada').DataTable({
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
                url: urlPessoaTarefaCriada,
                type: 'GET',
                data: {   
                    'id':'{{$data->id}}',
                    'funcao':'criador'
                }                  
            },
            fixedColumns: true,
            columns: [
                // {data: 'id'},
                // {data: 'name'},
                // {data: 'description'},
                // {data: 'action', searchable: false}    
                {data: 'id'},
                {data: 'name'},
                {data: 'description'},
                {data: 'id_creater'},
                {data: 'id_assigned'},
                {data: 'action', searchable: false}    
            ]
        });
    });


</script>

<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
@endsection