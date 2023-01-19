
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
                              <form action="{{url('baja_padrinos/'.$datos->id)}}" class="row" method="post">
                                  @csrf
                                  {{method_field('PATCH')}}

                                <div class="col-md-3">
                                    <label for="id_padrino" class="form-label">Padrino</label>
                                    <select class="form-select mb-3" id="id_padrino" name="id_padrino">
                                        @foreach ($padrinos as $padrino)
                                            @if ($padrino->id === $datos->padrinos->id)
                                            <option value="{{$padrino->id}}" selected>{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                            @else
                                            <option value="{{$padrino->id}}">{{$padrino->nombre}} {{$padrino->apellido}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                
                                    <div class="mb-3">
                                        <label for="quien_sale" class="form-label">Quien sale</label>
                                        <input type="text" class="form-control" value="{{$datos->quien_sale}}" id="quien_sale" name="quien_sale">
                                    </div>
                                    </div>
                
                                    <div class="col-md-3">
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
                
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="fecha_baja" class="form-label">Fecha Baja</label>
                                            <input type="date" class="form-control" value="{{$datos->fecha_baja}}" id="fecha_baja" name="fecha_baja">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="id_motivo_baja" class="form-label">Motivo Baja</label>
                                        <select class="form-select mb-3" id="id_motivo_baja" name="id_motivo_baja">
                                        
                                            @foreach ($motivoBajas as $motivoBaja)
                                                @if ($motivoBaja->id === $datos->motivo_bajas->id)
                                                <option value="{{$motivoBaja->id}}" selected>{{$motivoBaja->motivo_baja}}</option>
                                                @else
                                                <option value="{{$motivoBaja->id}}">{{$motivoBaja->motivo_baja}}</option>
                                                @endif
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
                
                        @role('editor')
                        <div class="row justify-content-center bordeOscuro">
                
                            <div class="parteSuperiorTablas">
                                <p>Dar de baja a pradino</p>
                                <div class="buscador">
                                </div>
                            </div>
                    
                            <div class="col-md-12 fs-6">
                                  <form action="{{url('baja_padrinos/'.$datos->id)}}" class="row" method="post">
                                      @csrf
                                      {{method_field('PATCH')}}
    
                                    <div class="col-md-3">
                                        <label for="id_padrino" class="form-label">Padrino</label>
                                        <select class="form-select mb-3" id="id_padrino" name="id_padrino">

                                            @foreach ($padrinos as $padrino)
                                                @if ($padrino->id === $datos->padrinos->id)
                                                <option value="{{$padrino->id}}" selected>{{$padrino->nombre}}</option>
                                                @else
                                                <option value="{{$padrino->id}}">{{$padrino->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                    
                                        <div class="mb-3">
                                            <label for="quien_sale" class="form-label">Quien sale</label>
                                            <input type="text" class="form-control" value="{{$datos->quien_sale}}" id="quien_sale" name="quien_sale">
                                        </div>
                                        </div>
                    
                                        <div class="col-md-3">
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
                    
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="fecha_baja" class="form-label">Fecha Baja</label>
                                                <input type="date" class="form-control" value="{{$datos->fecha_baja}}" id="fecha_baja" name="fecha_baja">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="id_motivo_baja" class="form-label">Motivo Baja</label>
                                            <select class="form-select mb-3" id="id_motivo_baja" name="id_motivo_baja">
                                            
                                                @foreach ($motivoBajas as $motivoBaja)
                                                    @if ($motivoBaja->id === $datos->motivo_bajas->id)
                                                    <option value="{{$motivoBaja->id}}" selected>{{$motivoBaja->motivo_baja}}</option>
                                                    @else
                                                    <option value="{{$motivoBaja->id}}">{{$motivoBaja->motivo_baja}}</option>
                                                    @endif
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