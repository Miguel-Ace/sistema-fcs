    @extends('home')

    @section('contenido')
        <h1 class="text-left p-2">Padrinos</h1>
    
        <div class="container">
            <a href="{{url('/padrinos')}}" class="btn btn-warning mb-3">
                <ion-icon name="arrow-undo-outline"></ion-icon>
                Volver Lista de Padrinos
            </a>
    
            @role('admin')
          <div class="row justify-content-center bordeOscuro">
    
            <div class="parteSuperiorTablas">
                <p>Editar Padrino</p>
                <div class="buscador">
                </div>
            </div>
    
            <div class="col-md-12 fs-6">
                  <form action="{{url('padrinos/'.$datos->id)}}" class="row" method="post">
                      @csrf
                      {{method_field('PATCH')}}
    
                      <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" value="{{$datos->nombre}}" id="nombre" name="nombre">
                        </div>
    
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" value="{{$datos->correo}}" id="correo" name="correo">
                        </div>
    
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                            <input type="date" class="form-control" value="{{$datos->fecha_nacimiento}}" id="fecha_nacimiento" name="fecha_nacimiento">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" value="{{$datos->apellido}}" id="apellido" name="apellido">
                        </div>
    
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" value="{{$datos->tipo}}" id="tipo" name="tipo">
                        </div>
    
                        <label for="id_metodo_pago" class="form-label">Método Pago</label>
                        <select class="form-select mb-3" id="id_metodo_pago" name="id_metodo_pago">
                            @foreach ($metodoPagos as $metodoPago)
                                @if ($metodoPago->id === $datos->metodos_pagos->id)
                                    <option value="{{$metodoPago->id}}" selected>{{$metodoPago->metodo_pago}}</option>
                                @else
                                    <option value="{{$metodoPago->id}}">{{$metodoPago->metodo_pago}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                          
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" min="0" class="form-control" value="{{$datos->telefono}}" id="telefono" name="telefono">
                        </div>
    
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha Inicial</label>
                            <input type="date" class="form-control" value="{{$datos->fecha_inicio}}" id="fecha_inicio" name="fecha_inicio">
                        </div>
    
                        <label for="id_banco" class="form-label">Banco</label>
                        <select class="form-select mb-3" id="id_banco" name="id_banco">
                            @foreach ($bancos as $banco)
                                @if ($banco->id === $datos->bancos->id)
                                    <option value="{{$banco->id}}" selected>{{$banco->banco}}</option>
                                @else
                                    <option value="{{$banco->id}}">{{$banco->banco}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        
                        <div class="mb-3">
                            <label for="fecha_final" class="form-label">Fecha Final</label>
                            <input type="date" class="form-control" value="{{$datos->fecha_final}}" id="fecha_final" name="fecha_final">
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" value="{{$datos->direccion}}" id="direccion" name="direccion">
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
                    <p>Editar Padrino</p>
                    <div class="buscador">
                    </div>
                </div>
        
                <div class="col-md-12 fs-6">
                      <form action="{{url('padrinos/'.$datos->id)}}" class="row" method="post">
                          @csrf
                          {{method_field('PATCH')}}
        
                          <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" value="{{$datos->nombre}}" id="nombre" name="nombre">
                            </div>
        
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" value="{{$datos->correo}}" id="correo" name="correo">
                            </div>
        
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                                <input type="date" class="form-control" value="{{$datos->fecha_nacimiento}}" id="fecha_nacimiento" name="fecha_nacimiento">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" value="{{$datos->apellido}}" id="apellido" name="apellido">
                            </div>
        
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <input type="text" class="form-control" value="{{$datos->tipo}}" id="tipo" name="tipo">
                            </div>
        
                            <label for="id_metodo_pago" class="form-label">Método Pago</label>
                            <select class="form-select mb-3" id="id_metodo_pago" name="id_metodo_pago">

                                @foreach ($metodoPagos as $metodoPago)
                                    @if ($metodoPago->id === $datos->metodos_pagos->id)
                                        <option value="{{$metodoPago->id}}" selected>{{$metodoPago->metodo_pago}}</option>
                                    @else
                                        <option value="{{$metodoPago->id}}">{{$metodoPago->metodo_pago}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                              
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" min="0" class="form-control" value="{{$datos->telefono}}" id="telefono" name="telefono">
                            </div>
        
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha Inicial</label>
                                <input type="date" class="form-control" value="{{$datos->fecha_inicio}}" id="fecha_inicio" name="fecha_inicio">
                            </div>
        
                            <label for="id_banco" class="form-label">Banco</label>
                            <select class="form-select mb-3" id="id_banco" name="id_banco">

                                @foreach ($bancos as $banco)
                                    @if ($banco->id === $datos->bancos->id)
                                        <option value="{{$banco->id}}" selected>{{$banco->banco}}</option>
                                    @else
                                        <option value="{{$banco->id}}">{{$banco->banco}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" value="{{$datos->direccion}}" id="direccion" name="direccion">
                            </div>
          
                              <div class="mb-3">
                                <label for="fecha_final" class="form-label">Fecha Final</label>
                                <input type="date" class="form-control" value="{{$datos->fecha_final}}" id="fecha_final" name="fecha_final">
                            </div>
        
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