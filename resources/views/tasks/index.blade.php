@extends('layout')

@section('content')
<div class="content">
        
    <div class="page-header">
        <h1 class="title">Tasks</h1>
        <ol class="breadcrumb">
            <li class="active">Tasks</li>
        </ol>
        <div class="right">
            <a class="btn btn-success" href="{{ route('task.create') }}">Adicionar</a>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row margin-b-15">
                <div>
                   <label for=""><h3>Task</h3></label><br />
                </div>

            </div>
            <div class="row margin-b-15">

            <div class="">
                <table id="tasksTabela" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Criador</th>
                            <th>Responsavel</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Criador</th>
                            <th>Responsavel</th>
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
    
        var urlTasksDefault = '{{ route('ajax.listTask') }}';
        var tableTasks;

        function refreshtableTasks() {
            tableTasks.ajax.url(urlTasksDefault);
            tableTasks.draw();
        }
    
        $(document).ready(function() {
            // Get the element with id="defaultOpen" and click on it

            tableTasks = $('#tasksTabela').DataTable({
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
                    url: urlTasksDefault,
                    type: 'GET'
                },
                fixedColumns: true,
                columns: [
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

 
@endsection

