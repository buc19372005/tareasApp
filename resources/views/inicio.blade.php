@include ('partes.header');

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="text-center mt-5">
    <h2>Agregar tareas</h2>

    <form class="row g-3 justify-content-center" method="POST" action="{{route('tareas.store')}}">
        @csrf
        <div class="col-6">
            <input type="text" class="form-control" name="titulo" placeholder="Título">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Agregar</button>
        </div>
    </form>
</div>


</br>


<div class="text-center">
    <h2>Todas las tareas</h2>
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>

                @php $counter=1 @endphp

                @foreach($tareas as $tarea)
                    <tr>
                        <th>{{$counter}}</th>
                        <td>{{$tarea->titulo}}</td>
                        <td>{{$tarea->created_at}}</td>
                        <td>
                            @if($tarea->completada)
                                <div class="badge bg-success">Completada</div>
                            @else
                                <div class="badge bg-warning">Sin completar</div>
                            @endif
                        </td>
                        <td>
                        <a href="{{route('tareas.edit',['tarea'=>$tarea->id])}}" class="btn btn-info">Editar</a>
                        <a href="{{route('tareas.destroy',['tarea'=>$tarea->id])}}" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>

                    @php $counter++; @endphp

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include ('partes.footer');