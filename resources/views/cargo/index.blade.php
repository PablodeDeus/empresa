@extends('layout')

@section('content')
<div class="content">
         
    <div class="page-header">
      <h1 class="title">Cargos</h1>
      <ol class="breadcrumb">
          <li class="active">Cargos</li>
      </ol>
      <div class="right">
          <a class="btn btn-success" href="{{ route('cargos.create') }}">Adicionar</a>
      </div>
    </div>

        <div class="panel">
          <div class="row margin-b-15">
              <div>
                  <label for=""><h3>Cargo</h3></label><br />
              </div>

          </div>
          <div class="row margin-b-15">

            <div class="">
              <table id="cargosTabela" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>Setor</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nome</th>
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
    
        var urlCargosDefault = '{{ route('ajax.listCargo') }}';
        var tableCargos;

        function refreshtableCargos() {
            tableCargos.ajax.url(urlCargosDefault);
            tableCargos.draw();
        }
    
        $(document).ready(function() {
            tableCargos = $('#cargosTabela').DataTable({
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
                    url: urlCargosDefault,
                    type: 'GET'
                },
                fixedColumns: true,
                columns: [
                    {data: 'id'},
                    {data: 'nome'},
                    {data: 'setor'},
                    {data: 'action', searchable: false}    
                ]
            });
        });
    
    </script>
@endsection

