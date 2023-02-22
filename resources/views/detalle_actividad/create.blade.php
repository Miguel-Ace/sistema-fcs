@extends('home')

@section('contenido')
    <h1 class="text-left p-2">Lista De Participantes</h1>
    <div class="container">

        <a href="{{url('/detalle_actividades?buscar='.$start)}}" class="btn btn-warning mb-3">
          <ion-icon name="arrow-undo-outline"></ion-icon>
          Volver a Lista De Participantes
        </a>

      @role('admin')
      <div class="row justify-content-center bordeOscuro">
        <div class="parteSuperiorTablas">
            <p>Añadir participante</p>
            {{-- {{$start}} --}}

                {{-- <div class="buscador">
                    <form action="{{url('/detalle_actividades/create')}}" method="GET" class="d-flex" role="search">
                        <input type="text" class="form-select mb-3" id="buscar" name="buscar">

                        <div>
                            <button class="btn btn-outline-success" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                        </div>
                    </form>
                </div> --}}

                {{-- <input type="number" min="0" max="50" id="edad"> --}}
                {{-- <input type="number" min="0" max="50" id="edad2"> --}}
            {{-- <form action="#">
                <input type="submit">
            </form> --}}

        </div>

        <div class="col-md-12 fs-6">
            @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
            </div>
            @endif

          @if ($errors->any())
              <ul class="bg-white text-danger p-2">
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
          @endif
            <form action="{{url('detalle_actividades/'.$start)}}" class="row" method="post">
              @csrf
              <div class="row">{{-- Inicio --}}

                    <div class="col-md-4 d-none">
                        <label for="id_actividad" class="form-label">Actividad</label>
                        <select class="form-select mb-3" id="id_actividad" name="id_actividad">
                            @foreach ($actividades as $actividad)
                            @if ($actividad->id == $start)
                                <option value="{{$actividad->id}}">{{$actividad->actividad}}</option>
                            @endif
                            @endforeach
                          </select>
                    </div>

                    {{-- <div class="col-md-3">
                        <label for="id_expediente" class="form-label">Expediente</label>
                        <select class="form-select mb-3" id="id_expediente" name="id_expediente">
                            @foreach ($expedientes as $expediente)
                              <option value="{{$expediente->id}}">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</option>
                          @endforeach
                      </select>
                    </div> --}}

                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                    <th scope="col">Expediente <input type="text" id="expediente-filtro"></th>
                                    <th scope="col">Edad <input type="text" id="edad-filtro"></th>
                                    <th scope="col">Semaforo <input type="text" id="semaforo-filtro"></th>
                                    <th scope="col">Agregar</th>
                              </tr>
                          </thead>
                          <tbody class="text-center" id="listaParticipante">

                              @foreach ($expedientes as $expediente)
                                <tr>
                                    @role('admin')
                                    @foreach ($datos as $dato)
                                        @if ($expediente->id == $dato->expedientes->id)
                                        <p class="d-none">{{$valor = $expediente->id}}</p>
                                        @endif
                                    @endforeach
                                        @if ($valor != $expediente->id)
                                            <th>{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</th>

                                            <th>{{$expediente->edad}}</th>
                                            
                                            <th>
                                                @foreach ($evaluacionMedicas as $evaluacionMedica)
                                                    @if ($expediente->id == $evaluacionMedica->id_expediente)
                                                        <p class="d-none">{{ $semaforo = $evaluacionMedica->semaforo }}</p>
                                                        <p class="d-none">{{ $id = $evaluacionMedica->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($evaluacionPsicologicas as $evaluacionPsicologica)
                                                    @if ($expediente->id == $evaluacionPsicologica->id_expediente)
                                                        <p class="d-none">{{ $semaforo2 = $evaluacionPsicologica->semaforo }}</p>
                                                        <p class="d-none">{{ $id2 = $evaluacionPsicologica->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($notas as $nota)
                                                    @if ($expediente->id == $nota->id_expediente)
                                                        <p class="d-none">{{ $semaforo3 = $nota->semaforo }}</p>
                                                        <p class="d-none">{{ $id3 = $nota->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($detalleActividades as $detalleActividade)
                                                    @if ($expediente->id == $detalleActividade->id_expediente)
                                                        <p class="d-none">{{ $semaforo4 = $detalleActividade->semaforo }}</p>
                                                        <p class="d-none">{{ $id4 = $detalleActividade->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                {{-- {{ $semaforo . $semaforo2 . $semaforo3 . $semaforo4}}
                                                {{ $id . $id2 . $id3 . $id4}} --}}
            
                                                @php
                                                    $combinaciones = [
                                                        "VerdeVerdeVerdeVerde" => "Verde",
                                                        "VerdeVerdeVerdeAmarillo" => "Verde",
                                                        "VerdeVerdeVerdeRojo" => "Verde",
                                                        "VerdeVerdeAmarilloRojo" => "Verde",
                                                        "VerdeAmarilloRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloRojoRojo" => "Rojo",
                                                        "VerdeVerdeAmarilloAmarillo" => "Amarillo",
                                                        "VerdeRojoRojoRojo" => "Rojo",
                                                        "AmarilloVerdeRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloVerdeRojo" => "Amarillo",
                                                        "AmarilloAmarilloRojoVerde" => "Amarillo",
                                                        "RojoRojoVerdeVerde" => "Rojo",
                                                        "RojoVerdeAmarilloAmarillo" => "Amarillo",
                                                        "RojoVerdeVerdeAmarillo" => "Verde",
                                                        "RojoAmarilloAmarilloVerde" => "Amarillo",
                                                        "RojoAmarilloVerdeVerde" => "Verde",
                                                        "VerdeAmarilloAmarilloRojo" => "Amarillo",
                                                        "VerdeRojoAmarilloRojo" => "Rojo",
                                                        "AmarilloRojoRojoRojo" => "Rojo",
                                                        "VerdeVerdeRojoRojo" => "Rojo",
                                                        "VerdeAmarilloAmarilloAmarillo" => "Amarillo",
                                                        "VerdeRojoVerdeRojo" => "Rojo",
                                                        "AmarilloRojoVerdeVerde" => "Verde",
                                                        "RojoVerdeRojoVerde" => "Rojo",
                                                        "RojoAmarilloAmarilloAmarillo" => "Amarillo",
                                                        "RojoVerdeVerdeVerde" => "Verde",
                                                        "RojoRojoVerdeAmarillo" => "Rojo",
                                                        "RojoRojoAmarilloVerde" => "Rojo",
                                                        "RojoVerdeAmarilloRojo" => "Rojo",
                                                        "RojoAmarilloVerdeRojo" => "Rojo",
                                                        "VerdeRojoRojoVerde" => "Rojo",
                                                        "RojoVerdeVerdeRojo" => "Rojo",
                                                        "VerdeAmarilloAmarilloVerde" => "Amarillo",
                                                        "AmarilloVerdeVerdeAmarillo" => "Amarillo",
                                                        "AmarilloAmarilloAmarilloRojo" => "Amarillo",
                                                        "RojoRojoRojoVerde" => "Rojo",
                                                        "RojoVerdeRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloAmarilloVerde" => "Amarillo",
                                                        "RojoRojoRojoAmarillo" => "Rojo",
                                                        "RojoRojoAmarilloAmarillo" => "Rojo",
                                                        "AmarilloAmarilloVerdeVerde" => "Amarillo",
                                                        "AmarilloVerdeRojoVerde" => "Verde",
                                                        "VerdeVerdeAmarilloVerde" => "Verde",
                                                        "RojoAmarilloAmarilloRojo" => "Rojo",
                                                        "VerdeAmarilloRojoAmarillo" => "Amarillo",
                                                        "VerdeAmarilloRojoVerde" => "Verde",
                                                        "VerdeRojoRojoAmarillo" => "Rojo",
                                                        "AmarilloVerdeVerdeRojo" => "Verde",
                                                        "AmarilloRojoRojoVerde" => "Rojo",
                                                        "AmarilloRojoAmarilloVerde" => "Amarillo",
                                                        "RojoAmarilloRojoVerde" => "Rojo",
                                                        "RojoVerdeRojoAmarillo" => "Rojo",
                                                        "VerdeAmarilloVerdeRojo" => "Verde",
                                                        "VerdeRojoVerdeAmarillo" => "Verde",
                                                        "AmarilloVerdeAmarilloRojo" => "Amarillo",
                                                        "AmarilloRojoVerdeAmarillo" => "Amarillo",
                                                        "RojoAmarilloVerdeAmarillo" => "Amarillo",
                                                        "AmarilloRojoRojoAmarillo" => "Rojo",
                                                        "VerdeRojoAmarilloVerde" => "Verde",
                                                        "AmarilloVerdeAmarilloVerde" => "Amarillo"
                                                        // Añade aquí todas las combinaciones necesarias
                                                    ];
                                                    
                                                    // Obtener la combinación actual de semáforos y su resultado correspondiente
                                                    $combinacion_actual = $semaforo.$semaforo2.$semaforo3.$semaforo4;
                                                    $resultado = isset($combinaciones[$combinacion_actual]) ? $combinaciones[$combinacion_actual] : "";
                                                    
                                                    // Mostrar el resultado correspondiente
                                                @endphp
                                                
                                                @if ($resultado == "Verde")
                                                    <p style="background: rgba(190, 241, 190, 0.6)">Verde</p>
                                                @elseif ($resultado == "Rojo")
                                                    <p style="background: rgba(239, 160, 160, 0.5);">Rojo</p>
                                                @elseif ($resultado == "Amarillo")
                                                    <p style="background: rgba(200, 200, 123, 0.4)">Amarillo</p>
                                                @endif
                                            </th>
                                        @else
                                            <th style="color: green">{{$expediente->nombre1}} {{$expediente->nombre2}} {{$expediente->apellido1}} {{$expediente->apellido2}}</th>

                                            <th style="color: green">{{$expediente->edad}}</th>
                                            
                                            <th style="color: green">
                                                @foreach ($evaluacionMedicas as $evaluacionMedica)
                                                    @if ($expediente->id == $evaluacionMedica->id_expediente)
                                                        <p class="d-none">{{ $semaforo = $evaluacionMedica->semaforo }}</p>
                                                        <p class="d-none">{{ $id = $evaluacionMedica->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($evaluacionPsicologicas as $evaluacionPsicologica)
                                                    @if ($expediente->id == $evaluacionPsicologica->id_expediente)
                                                        <p class="d-none">{{ $semaforo2 = $evaluacionPsicologica->semaforo }}</p>
                                                        <p class="d-none">{{ $id2 = $evaluacionPsicologica->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($notas as $nota)
                                                    @if ($expediente->id == $nota->id_expediente)
                                                        <p class="d-none">{{ $semaforo3 = $nota->semaforo }}</p>
                                                        <p class="d-none">{{ $id3 = $nota->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                @foreach ($detalleActividades as $detalleActividade)
                                                    @if ($expediente->id == $detalleActividade->id_expediente)
                                                        <p class="d-none">{{ $semaforo4 = $detalleActividade->semaforo }}</p>
                                                        <p class="d-none">{{ $id4 = $detalleActividade->id_expediente }}</p>
                                                    @endif
                                                @endforeach
            
                                                {{-- {{ $semaforo . $semaforo2 . $semaforo3 . $semaforo4}}
                                                {{ $id . $id2 . $id3 . $id4}} --}}
            
                                                @php
                                                    $combinaciones = [
                                                        "VerdeVerdeVerdeVerde" => "Verde",
                                                        "VerdeVerdeVerdeAmarillo" => "Verde",
                                                        "VerdeVerdeVerdeRojo" => "Verde",
                                                        "VerdeVerdeAmarilloRojo" => "Verde",
                                                        "VerdeAmarilloRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloRojoRojo" => "Rojo",
                                                        "VerdeVerdeAmarilloAmarillo" => "Amarillo",
                                                        "VerdeRojoRojoRojo" => "Rojo",
                                                        "AmarilloVerdeRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloVerdeRojo" => "Amarillo",
                                                        "AmarilloAmarilloRojoVerde" => "Amarillo",
                                                        "RojoRojoVerdeVerde" => "Rojo",
                                                        "RojoVerdeAmarilloAmarillo" => "Amarillo",
                                                        "RojoVerdeVerdeAmarillo" => "Verde",
                                                        "RojoAmarilloAmarilloVerde" => "Amarillo",
                                                        "RojoAmarilloVerdeVerde" => "Verde",
                                                        "VerdeAmarilloAmarilloRojo" => "Amarillo",
                                                        "VerdeRojoAmarilloRojo" => "Rojo",
                                                        "AmarilloRojoRojoRojo" => "Rojo",
                                                        "VerdeVerdeRojoRojo" => "Rojo",
                                                        "VerdeAmarilloAmarilloAmarillo" => "Amarillo",
                                                        "VerdeRojoVerdeRojo" => "Rojo",
                                                        "AmarilloRojoVerdeVerde" => "Verde",
                                                        "RojoVerdeRojoVerde" => "Rojo",
                                                        "RojoAmarilloAmarilloAmarillo" => "Amarillo",
                                                        "RojoVerdeVerdeVerde" => "Verde",
                                                        "RojoRojoVerdeAmarillo" => "Rojo",
                                                        "RojoRojoAmarilloVerde" => "Rojo",
                                                        "RojoVerdeAmarilloRojo" => "Rojo",
                                                        "RojoAmarilloVerdeRojo" => "Rojo",
                                                        "VerdeRojoRojoVerde" => "Rojo",
                                                        "RojoVerdeVerdeRojo" => "Rojo",
                                                        "VerdeAmarilloAmarilloVerde" => "Amarillo",
                                                        "AmarilloVerdeVerdeAmarillo" => "Amarillo",
                                                        "AmarilloAmarilloAmarilloRojo" => "Amarillo",
                                                        "RojoRojoRojoVerde" => "Rojo",
                                                        "RojoVerdeRojoRojo" => "Rojo",
                                                        "AmarilloAmarilloAmarilloVerde" => "Amarillo",
                                                        "RojoRojoRojoAmarillo" => "Rojo",
                                                        "RojoRojoAmarilloAmarillo" => "Rojo",
                                                        "AmarilloAmarilloVerdeVerde" => "Amarillo",
                                                        "AmarilloVerdeRojoVerde" => "Verde",
                                                        "VerdeVerdeAmarilloVerde" => "Verde",
                                                        "RojoAmarilloAmarilloRojo" => "Rojo",
                                                        "VerdeAmarilloRojoAmarillo" => "Amarillo",
                                                        "VerdeAmarilloRojoVerde" => "Verde",
                                                        "VerdeRojoRojoAmarillo" => "Rojo",
                                                        "AmarilloVerdeVerdeRojo" => "Verde",
                                                        "AmarilloRojoRojoVerde" => "Rojo",
                                                        "AmarilloRojoAmarilloVerde" => "Amarillo",
                                                        "RojoAmarilloRojoVerde" => "Rojo",
                                                        "RojoVerdeRojoAmarillo" => "Rojo",
                                                        "VerdeAmarilloVerdeRojo" => "Verde",
                                                        "VerdeRojoVerdeAmarillo" => "Verde",
                                                        "AmarilloVerdeAmarilloRojo" => "Amarillo",
                                                        "AmarilloRojoVerdeAmarillo" => "Amarillo",
                                                        "RojoAmarilloVerdeAmarillo" => "Amarillo",
                                                        "AmarilloRojoRojoAmarillo" => "Rojo",
                                                        "VerdeRojoAmarilloVerde" => "Verde",
                                                        "AmarilloVerdeAmarilloVerde" => "Amarillo"
                                                        // Añade aquí todas las combinaciones necesarias
                                                    ];
                                                    
                                                    // Obtener la combinación actual de semáforos y su resultado correspondiente
                                                    $combinacion_actual = $semaforo.$semaforo2.$semaforo3.$semaforo4;
                                                    $resultado = isset($combinaciones[$combinacion_actual]) ? $combinaciones[$combinacion_actual] : "";
                                                    
                                                    // Mostrar el resultado correspondiente
                                                @endphp
                                                
                                                @if ($resultado == "Verde")
                                                    <p style="background: rgba(190, 241, 190, 0.6)">Verde</p>
                                                @elseif ($resultado == "Rojo")
                                                    <p style="background: rgba(239, 160, 160, 0.5);">Rojo</p>
                                                @elseif ($resultado == "Amarillo")
                                                    <p style="background: rgba(200, 200, 123, 0.4)">Amarillo</p>
                                                @endif
                                            </th>
                                        @endif

                                        <td>
                                            <input type="text" id="nombrevalor" class="form-control d-none" id="id_expediente" name="" value="{{$expediente->id}}">
                                            @if ($valor != $expediente->id)
                                            <button type="submit" class="btn btn-primary botoncin" id="btnEnviarParticipante">+</button>
                                            @else
                                            <ion-icon style="font-size: 2rem" name="checkmark-done-outline"></ion-icon>
                                            @endif
                                        </td>
                                    @endrole

                                      @role('editor')
                                      <td>
                                      </td>
                                      @endrole
                                </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>

                    <div class="col-md-3 d-none">
                        <label for="asistencia" class="form-label">Asistencia</label>
                          <select class="form-select mb-3" id="asistencia" name="asistencia">
                              <option value="No">No</option>
                              <option value="Si">Si</option>
                          </select>
                    </div>

                    <div class="col-md-3 d-none">
                        <label for="semaforo" class="form-label">Semáforo</label>
                          <select class="form-select mb-3" id="semaforo" name="semaforo">
                              <option value="Rojo">Rojo</option>
                              <option value="Verde">Verde</option>
                          </select>
                    </div>
                    </div>{{-- Fin --}}

                    <div class="mb-3 d-none">
                        <label for="observacion" class="form-label">Observación</label>
                        <input type="text" class="form-control" id="observacion" name="observacion">
                    </div>

                  {{-- <button type="submit" class="btn btn-primary enviar">
                    <ion-icon name="save-outline"></ion-icon>
                    Guardar
                  </button> --}}
              </form>
            </div>
        </div>
        @endrole

        <script>

            // Obtener el input de texto de filtrado por expediente
            // const expedienteFiltro = document.getElementById("expediente-filtro");

            // // Agregar un controlador de eventos de cambio
            // expedienteFiltro.addEventListener("input", () => {
            // // Obtener el valor del input de texto
            // const filtro = expedienteFiltro.value.toLowerCase();

            // // Obtener todas las filas de la tabla
            // const filas = document.querySelectorAll("#listaParticipante tr");

            // // Iterar sobre cada fila y ocultar o mostrar según corresponda
            // filas.forEach((fila) => {
            //     const expediente = fila.querySelector("th").textContent.toLowerCase();
            //     if (expediente.includes(filtro)) {
            //     fila.style.display = "";
            //     } else {
            //     fila.style.display = "none";
            //     }
            // });
            // });


            // Obtener los campos de entrada de texto y el cuerpo de la tabla
            const expedienteFiltro = document.getElementById('expediente-filtro');
            const semaforoFiltro = document.getElementById('semaforo-filtro');
            const edadFiltro = document.getElementById('edad-filtro');
            const tabla = document.getElementById('listaParticipante');

            // Agregar un listener de eventos a los campos de entrada de texto
            expedienteFiltro.addEventListener('input', filtrarTabla);
            semaforoFiltro.addEventListener('input', filtrarTabla);
            edadFiltro.addEventListener('input', filtrarTabla);

            // Definir la función de filtrado de la tabla
            function filtrarTabla() {
            // Convertir los valores de entrada de texto a minúsculas para una comparación no sensible a mayúsculas
            const expedienteValor = expedienteFiltro.value.toLowerCase();
            const semaforoValor = semaforoFiltro.value.toLowerCase();
            const edadValor = edadFiltro.value.toLowerCase();

            // Recorrer cada fila de la tabla y ocultar aquellas que no cumplan con los criterios de búsqueda
            for (let i = 0; i < tabla.rows.length; i++) {
                const expediente = tabla.rows[i].cells[0].textContent.toLowerCase();
                const edad = tabla.rows[i].cells[1].textContent.toLowerCase();
                const semaforo = tabla.rows[i].cells[2].textContent.toLowerCase();

                // Comprobar si la fila cumple con los criterios de búsqueda
                if (expediente.indexOf(expedienteValor) > -1 && semaforo.indexOf(semaforoValor) > -1 && edad.indexOf(edadValor) > -1) {
                tabla.rows[i].style.display = '';
                } else {
                tabla.rows[i].style.display = 'none';
                }
            }
            }

        </script>
@endsection
