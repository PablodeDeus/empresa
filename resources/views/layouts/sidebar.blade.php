<div class="sidebar clearfix">

    <ul class="sidebar-panel nav flex-column">
        <li class="sidetitle">MAIN</li>
        <li><a href="{{ route('pessoas.index') }}"><span class="icon color5"><i ></i></span>Pessoas<span
                    class="label label-default"></a><span class="label label-default">{{ App\Models\Pessoa::all()->count() }}</span></li>

        <li><a href="{{ route('task.index') }}"><span class="icon color5"><i ></i></span>Tasks<span
                    class="label label-default"></span></a><span class="label label-default">{{ App\Models\Tasks::all()->count() }}</span></li>

        <li><a href="{{ route('cargos.index') }}"><span class="icon color5"><i ></i></span>Cargo<span
                    class="label label-default"></span></a><span class="label label-default">{{ App\Models\Cargo::all()->count() }}</span></li>
    
        {{-- <li><a href="/tasksajax"><span class="icon color5"><i ></i></span>Tasks Ajax   <span
                    class="label label-default"></a><span class="label label-default">{{ App\Models\Tasks::all()->count() }}</span></li>

        <li><a href="/cargoajax"><span class="icon color5"><i ></i></span>Cargo Ajax   <span
                    class="label label-default"></a><span class="label label-default">{{ App\Models\Cargo::all()->count() }}</span></li>
                --}}
               
               
               
               
               
               
               
               
                    {{-- <li><a href="{{ route('task.index') }}"><span class="icon color5"><i ></i></span>Tasks Ajax<span --}}
                    {{-- class="label label-default"></span></a><span class="label label-default">{{ App\Models\Tasks::all()->count() }}</span></li> --}}
        
        {{-- <li><a href="#"><span class="icon color7"><i class=""></i></span>Pesquisas<span
                    class="caret"></span></a>
            <ul>
                <li><a href="/pessoas/novo">Id</a></li>
                <li><a href="/pessoas/ver">Nome</a></li>
                <li><a href="/pessoas/editar">Idade</a></li>
                <li><a href="/pessoas/search">Escolaridade</a></li>
                <li><a href="/pessoas/search">Salario</a></li>
            </ul>
        </li> --}}
    </ul>

</div>