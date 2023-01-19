@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Evaluaciones Psicológicas</h1>
    <div class="container">

        <a href="{{url('/evaluaciones_psicologicas')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver a evaluaciones psicológicas
        </a>

        @role('admin')
        <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Crear evaluación psicológica</p>
            <div class="buscador">
            </div>
        </div>

        <div class="col-md-12 fs-6">
            <form action="{{url('evaluaciones_psicologicas/'.$datos->id)}}" class="row" method="post">
                @csrf
                {{method_field('PATCH')}}

                <div class="col-md-3">{{-- Inicio --}}

                    <label for="id_medico" class="form-label">Medico</label>
                    <select class="form-select mb-3" id="id_medico" name="id_medico">
                        @foreach ($medicos as $medico)
                            @if ($medico->id === $datos->medicos->id)
                                <option value="{{$medico->id}}" selected>{{$medico->nombre}} {{$medico->apellido}}</option>
                            @else
                                <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                <div class="col-md-3">{{-- Inicio --}}
                    <label for="id_expediente" class="form-label">Expediente</label>
                    <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id === $datos->expedientes->id)
                                <option value="{{$expediente->id}}" selected>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @else
                                <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                    
                <div class="col-md-3">{{-- Inicio --}}
                    <div class="mb-3">
                        <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                        <input type="text" class="form-control" value="{{$datos->categoria_psicologica}}" id="categoria_psicologica" name="categoria_psicologica">
                    </div>
                </div>
                

                <div class="col-md-3">{{-- Inicio --}}
                
                    <label for="semaforo" class="form-label">Semaforo</label>
                    <select class="form-select mb-3" id="semaforo" name="semaforo">
                        @if ($datos->semaforo === "Verde")
                            <option value="Verde" selected>Verde</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Amarillo">Amarillo</option>
                        @elseif ($datos->semaforo === "Rojo")
                            <option value="Verde">Verde</option>
                            <option value="Rojo" selected>Rojo</option>
                            <option value="Amarillo">Amarillo</option>
                        @else
                            <option value="Verde">Verde</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Amarillo" selected>Amarillo</option>
                        @endif
                    </select>

                </div>

                <div class="mb-3">
                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" value="{{$datos->nota}}" id="nota" name="nota">
                </div>
  
                <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                </button>
            </form>
            
            
            </div>
        </div>
        @endrole

        @role('editor')
        <div class="row justify-content-center bordeOscuro">
            <div class="parteSuperiorTablas">
                <p>Crear evaluación psicológica</p>
                <div class="buscador">
                </div>
            </div>
    
            <div class="col-md-12 fs-6">
                <form action="{{url('evaluaciones_psicologicas/'.$datos->id)}}" class="row" method="post">
                    @csrf
                    {{method_field('PATCH')}}
    
                    <div class="col-md-3">{{-- Inicio --}}
    
                        <label for="id_medico" class="form-label">Medico</label>
                        <select class="form-select mb-3" id="id_medico" name="id_medico">
                            @foreach ($medicos as $medico)
                                @if ($medico->id === $datos->medicos->id)
                                    <option value="{{$medico->id}}" selected>{{$medico->nombre}}</option>
                                @else
                                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
    
                    </div>
    
                    <div class="col-md-3">{{-- Inicio --}}
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            @foreach ($expedientes as $expediente)
                                @if ($expediente->id === $datos->expedientes->id)
                                    <option value="{{$expediente->id}}" selected>{{$expediente->id}}</option>
                                @else
                                    <option value="{{$expediente->id}}">{{$expediente->id}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                        
                    <div class="col-md-3">{{-- Inicio --}}
                        <div class="mb-3">
                            <label for="categoria_psicologica" class="form-label">Categoria Psicológica</label>
                            <input type="text" class="form-control" value="{{$datos->categoria_psicologica}}" id="categoria_psicologica" name="categoria_psicologica">
                        </div>
                    </div>
                    
    
                    <div class="col-md-3">{{-- Inicio --}}
                    
                        <label for="semaforo" class="form-label">Semaforo</label>
                        <select class="form-select mb-3" id="semaforo" name="semaforo">
                            @if ($datos->semaforo === "Verde")
                                <option value="Verde" selected>Verde</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                            @elseif ($datos->semaforo === "Rojo")
                                <option value="Verde">Verde</option>
                                <option value="Rojo" selected>Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                            @else
                                <option value="Verde">Verde</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo" selected>Amarillo</option>
                            @endif
                        </select>
    
                    </div>
    
                    <div class="mb-3">
                        <label for="nota" class="form-label">Nota</label>
                        <input type="text" class="form-control" value="{{$datos->nota}}" id="nota" name="nota">
                    </div>
      
                    <button type="submit" class="btn btn-primary enviar">
                        <ion-icon name="save-outline"></ion-icon>
                        Guardar
                    </button>
                </form>
                
                
                </div>
            </div>
        @endrole
    </div>
@endsection