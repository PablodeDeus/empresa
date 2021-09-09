@extends('layout')

@section('content')

<script>
    $(document).ready(function() {
        $('#cargoTabela').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('ajax.cargo2')}}",
            columns:[
                {data: 'id', name: 'id'},
                {data: 'nome', name: 'nome'},
                {data: 'setor', name: 'setor'},
                {data: 'action', name: 'action'},
                ]
        }
        );
    });
</script>

    <div class="content">
    {{-- <div>
        
        <label for=""><h3>Responsável</h3></label><br />
        {!! Form::select('nome', $cargos, null, ['class' => 'form-control']) !!}
    </div> --}}
            <div class="panel">
            <div class="">
                <table id="cargoTabela" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cargo</th>
                            <th>Setor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Cargo</th>
                            <th>Setor</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
