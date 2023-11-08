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
    <h2>Editar tarea</h2>
</div>

<form  method="POST" action="{{route('tareas.update',['tarea'=>$tarea->id])}}">

    @csrf

    {{ method_field('PUT') }}

    <div class="row justify-content-center mt-5">

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" placeholder="Título" value="{{$tarea->titulo}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select name="completada" id="" class="form-control">
                    <option value="1" @if($tarea->completada==1) selected @endif>Completada</option>
                    <option value="0" @if($tarea->completada==0) selected @endif>Sin completar</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
    </div>

</form>

@include ('partes.footer'); 