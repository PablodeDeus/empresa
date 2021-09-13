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
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'home')" id="defaultOpen">Home</button>
      <button class="tablinks" onclick="openCity(event, 'dataTableCargo')">DataTable</button>
    </div>

    <div id="home" class="tabcontent">
      <h3>Home</h3>
      <p>Tela principal</p>
    </div>
    
    <div id="dataTableCargo" class="tabcontent">
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
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();

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

