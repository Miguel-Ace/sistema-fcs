@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Baja De Padrino</h1>

    <div class="container">
        <a href="{{url('/baja_padrinos')}}" class="btn btn-warning mb-3">
            <ion-icon name="arrow-undo-outline"></ion-icon>
            Volver lista baja padrinos
        </a>

        @role('admin')
      <div class="row justify-content-center bordeOscuro">

        <div class="parteSuperiorTablas">
            <p>Dar de baja a pradino</p>
            <div class="buscador">
            </div>
        </div>

        <div class="col-md-12 fs-6">
            @if ($errors->any())
              <ul class="bg-white text-danger p-2">
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
            @endif
              <form action="{{url('/baja_padrinos')}}" class="row" method="post">
                  @csrf

                <div class="col-md-3">
                    <label for="id_padrino" class="form-label">Padrino</label>
                        <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                            <option value="" selected disabled>Selecciona el padrino</option>
                        @foreach ($padrinos as $padrino)
                            @foreach ($datos as $dato)
                                @if ($dato->id_padrino == $padrino->id)
                                    {{$valor = $dato->id_padrino}}
                                @endif
                            @endforeach

                            @if ($valor == $padrino->id)

                            @else
                                <option {{old('id_padrino') == $padrino->id ? 'selected' : ''}} value="{{$padrino->id}}">{{$padrino->nombre}} {{$padrino->apellido}}</option>
                            @endif
                          @endforeach
                        </select>

                        <div class="mb-3">
                            <label for="quien_sale" class="form-label">Quien sale</label>
                            <input type="text" class="form-control" id="quien_sale" name="quien_sale" value="{{old('quien_sale')}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            <option value="" selected disabled>Selecciona el expediente</option>
                            @foreach ($expedientes as $expediente)
                            <option {{old('id_expediente') == $expediente->id ? 'selected' : ''}} value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fecha_baja" class="form-label">Fecha Baja</label>
                            <input type="date" class="form-control" id="fecha_baja" name="fecha_baja" value="{{old('fecha_baja')}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_motivo_baja" class="form-label">Motivo Baja</label>
                        <select class="form-select mb-3" id="id_motivo_baja" name="id_motivo_baja">
                            <option value="" selected disabled>Selecciona el motivo de baja</option>
                            @foreach ($motivoBajas as $motivoBaja)
                                <option {{old('id_motivo_baja') == $motivoBaja->id ? 'selected' : ''}} value="{{$motivoBaja->id}}">{{$motivoBaja->motivo_baja}}</option>
                            @endforeach
                        </select>
                    </div>


                  <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                  </button>
              </form>

            </div>
        </div>
        @endrole

        @role('creador')
        <div class="row justify-content-center bordeOscuro">

            <div class="parteSuperiorTablas">
                <p>Dar de baja a pradino</p>
                <div class="buscador">
                </div>
            </div>

            <div class="col-md-12 fs-6">
                  <form action="{{url('/baja_padrinos')}}" class="row" method="post">
                      @csrf

                      <div class="col-md-3">
                        <label for="id_padrino" class="form-label">Padrino</label>
                            <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                                <option value="" selected disabled>Selecciona el padrino</option>
                            @foreach ($padrinos as $padrino)
                                @foreach ($datos as $dato)
                                    @if ($dato->id_padrino == $padrino->id)
                                        {{$valor = $dato->id_padrino}}
                                    @endif
                                @endforeach
    
                                @if ($valor == $padrino->id)
    
                                @else
                                    <option {{old('id_padrino') == $padrino->id ? 'selected' : ''}} value="{{$padrino->id}}">{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                @endif
                              @endforeach
                            </select>
    
                            <div class="mb-3">
                                <label for="quien_sale" class="form-label">Quien sale</label>
                                <input type="text" class="form-control" id="quien_sale" name="quien_sale" value="{{old('quien_sale')}}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="id_expediente" class="form-label">Expediente</label>
                            <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                                <option value="" selected disabled>Selecciona el expediente</option>
                                @foreach ($expedientes as $expediente)
                                <option {{old('id_expediente') == $expediente->id ? 'selected' : ''}} value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="fecha_baja" class="form-label">Fecha Baja</label>
                                <input type="date" class="form-control" id="fecha_baja" name="fecha_baja">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="id_motivo_baja" class="form-label">Motivo Baja</label>
                            <select class="form-select mb-3" id="id_motivo_baja" name="id_motivo_baja">
                                <option value="" selected disabled>Selecciona el motivo de baja</option>
                                @foreach ($motivoBajas as $motivoBaja)
                                    <option {{old('id_motivo_baja') == $motivoBaja->id ? 'selected' : ''}} value="{{$motivoBaja->id}}">{{$motivoBaja->motivo_baja}}</option>
                                @endforeach
                            </select>
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
