<a href="{{route('pessoas.show', $id)}}" class="btn btn-xs btn-info">Ver</a>
<a href="{{route('pessoas.edit', $id)}}" class="btn btn-xs btn-primary">Editar</a>
{{-- <a href="{{route('pessoas.destroy', $id)}}" class="btn btn-xs btn-danger">Excluir</a> --}}

@if (count($model->tarefasCriadas) == 0 && count($model->tarefasCriadas) == 0)
    <a class="btn btn-xs btn-danger" id="btn-delete-{{$id}}">Delete</a>
    <form action="{{route('pessoas.destroy', $id)}}" method="post" id="delete-{{$id}}">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
    <script>
        document.querySelector('#btn-delete-{{$id}}').onclick = function () {
            swal({
                title: "Tem certeza?",
                text: "O cadastro será permanentemente excluído!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                closeOnConfirm: true
            }, function () {
                event.preventDefault();
                document.getElementById('delete-{{$id}}').submit();
            });
        };
    </script>
@else
    <button class="btn btn-xs btn-danger" disabled>Delete</button>
@endif