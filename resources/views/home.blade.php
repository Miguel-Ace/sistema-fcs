<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema - Construyendo Sonrisas</title>
    <!-- CSS only -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="contenedor lateral">
        <aside class=".aside">
            
            <div class="menuToggle"></div>
            <div class="menuToggle2" id="menuToggle2"></div>
            
            <hr>

            <ul id="ul1">
                <li >
                    <a href="{{url('/expedientes')}}" class="a">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Expedientes
                    </a>
                </li>
                <li>
                    <a href="{{url('/evaluaciones_medicas')}}" class="a">
                        <ion-icon name="medkit-outline"></ion-icon>
                        Evaluaciones Médicas
                    </a>
                </li>
                <li>
                    <a href="{{url('/evaluaciones_psicologicas')}}" class="a">
                        <ion-icon name="medical-outline"></ion-icon>
                        Evaluaciones Psicológicas
                    </a>
                </li>
                <li>
                    <a href="{{url('/entregas_mensuales')}}" class="a">
                        <ion-icon name="cash-outline"></ion-icon>
                        Entregas Mensuales
                    </a>
                </li>

                <li>
                    <a href="{{url('/cumpleanios')}}" class="a">
                        <ion-icon name="baseball-outline"></ion-icon>
                        Cumpleaños
                    </a>
                </li>

                <li>
                    <a href="{{url('/notas')}}" class="a">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Notas
                    </a>
                </li>
                <li>
                    <a href="{{url('/padrinos')}}" class="a">
                        <ion-icon name="person-outline"></ion-icon>
                        Padrinos
                    </a>
                </li>
                <li>
                    <a href="{{url('/baja_padrinos')}}" class="a">
                        <ion-icon name="person-remove-outline"></ion-icon>
                        Baja De Padrino
                    </a>
                </li>
                {{-- <li >
                    <a href="{{url('/asistencias')}}" class="a">
                        <ion-icon name="person-add-outline"></ion-icon>
                        Asistencia
                    </a>
                </li> --}}
                <li >
                    <a href="{{url('/actividades')}}" class="a">
                        <ion-icon name="color-palette-outline"></ion-icon>
                        Actividades
                    </a>
                </li>
                {{-- <li >
                    <a href="{{url('/detalle_actividades')}}" class="a">
                        <ion-icon name="person-add-outline"></ion-icon>
                        Participantes
                    </a>
                </li> --}}
                {{-- Fin catálogo normal--}}

                {{-- Inicio del segundo catálogo --}}
                <li>
                    <a href="#" class="flecha a">
                        <ion-icon name="caret-up-outline"></ion-icon>
                        Catálogo Completo
                    </a>
                    {{-- Lateral derecha --}}
                    <ul id="ul12">
                        <li>
                            <a href="{{url('/tipo_asistencia')}}" class="a">
                                <ion-icon name="person-remove-outline"></ion-icon>
                                Tipo de asistencia
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/banco')}}" class="a">
                                <ion-icon name="wallet-outline"></ion-icon>
                                Banco
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/provincias')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Provincia
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{url('/cantones')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Cantón
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/barrios')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Barrio
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/clasificacion_nota')}}" class="a">
                                <ion-icon name="trending-up-outline"></ion-icon>
                                Clasificación Nota
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/comunidades')}}" class="a">
                                <ion-icon name="earth-outline"></ion-icon>
                                Comunidad
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{url('/detalle_entregas_mensuales')}}" class="a">
                                <ion-icon name="book-outline"></ion-icon>
                                Detalle Entrga Mensual
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{url('/estado')}}" class="a">
                                <ion-icon name="shield-half-outline"></ion-icon>
                                Estado
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/medicos')}}" class="a">
                                <ion-icon name="man-outline"></ion-icon>
                                Médico
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/metodo_de_pago')}}" class="a">
                                <ion-icon name="cash-outline"></ion-icon>
                                Método de Pago
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/motivo_baja')}}" class="a">
                                <ion-icon name="ban-outline"></ion-icon>
                                Motivo Baja
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/tipo_entrega')}}" class="a">
                                <ion-icon name="mail-outline"></ion-icon>
                                Tipo Entrega
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/tipo_pobreza')}}" class="a">
                                <ion-icon name="bonfire-outline"></ion-icon>
                                Tipo Pobreza
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/grado_escolar')}}" class="a">
                                <ion-icon name="school-outline"></ion-icon>
                                Grado Escolar
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/beca')}}" class="a">
                                <ion-icon name="school-outline"></ion-icon>
                                Beca
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/centro_educativo')}}" class="a">
                                <ion-icon name="storefront-outline"></ion-icon>
                                Centro Educativo
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul id="ul2">
                <li >
                    <a href="{{url('/expedientes')}}" class="a">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Expedientes
                    </a>
                </li>
                <li>
                    <a href="{{url('/evaluaciones_medicas')}}" class="a">
                        <ion-icon name="medkit-outline"></ion-icon>
                        Evaluaciones Médicas
                    </a>
                </li>
                <li>
                    <a href="{{url('/evaluaciones_psicologicas')}}" class="a">
                        <ion-icon name="medical-outline"></ion-icon>
                        Evaluaciones Psicológicas
                    </a>
                </li>
                <li>
                    <a href="{{url('/entregas_mensuales')}}" class="a">
                        <ion-icon name="cash-outline"></ion-icon>
                        Entregas Mensuales
                    </a>
                </li>

                <li>
                    <a href="{{url('/cumpleanios')}}" class="a">
                        <ion-icon name="baseball-outline"></ion-icon>
                        Cumpleaños
                    </a>
                </li>

                <li>
                    <a href="{{url('/notas')}}" class="a">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Notas
                    </a>
                </li>
                <li>
                    <a href="{{url('/padrinos')}}" class="a">
                        <ion-icon name="person-outline"></ion-icon>
                        Padrinos
                    </a>
                </li>
                <li>
                    <a href="{{url('/baja_padrinos')}}" class="a">
                        <ion-icon name="person-remove-outline"></ion-icon>
                        Baja De Padrino
                    </a>
                </li>
                {{-- <li >
                    <a href="{{url('/asistencias')}}" class="a">
                        <ion-icon name="person-add-outline"></ion-icon>
                        Asistencia
                    </a>
                </li> --}}
                <li >
                    <a href="{{url('/actividades')}}" class="a">
                        <ion-icon name="color-palette-outline"></ion-icon>
                        Actividades
                    </a>
                </li>
                {{-- <li >
                    <a href="{{url('/detalle_actividades')}}" class="a">
                        <ion-icon name="person-add-outline"></ion-icon>
                        Participantes
                    </a>
                </li> --}}
                {{-- Fin catálogo normal--}}

                {{-- Inicio del segundo catálogo --}}
                <li>
                    <a href="#" class="flecha a">
                        <ion-icon name="caret-up-outline"></ion-icon>
                        Catálogo Completo
                    </a>
                    {{-- Lateral derecha --}}
                    <ul id="ul22">
                        <li>
                            <a href="{{url('/tipo_asistencia')}}" class="a">
                                <ion-icon name="person-remove-outline"></ion-icon>
                                Tipo de asistencia
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/banco')}}" class="a">
                                <ion-icon name="wallet-outline"></ion-icon>
                                Banco
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/provincias')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Provincia
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{url('/cantones')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Cantón
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/barrios')}}" class="a">
                                <ion-icon name="map-outline"></ion-icon>
                                Barrio
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/clasificacion_nota')}}" class="a">
                                <ion-icon name="trending-up-outline"></ion-icon>
                                Clasificación Nota
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/comunidades')}}" class="a">
                                <ion-icon name="earth-outline"></ion-icon>
                                Comunidad
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{url('/detalle_entregas_mensuales')}}" class="a">
                                <ion-icon name="book-outline"></ion-icon>
                                Detalle Entrga Mensual
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{url('/estado')}}" class="a">
                                <ion-icon name="shield-half-outline"></ion-icon>
                                Estado
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/medicos')}}" class="a">
                                <ion-icon name="man-outline"></ion-icon>
                                Médico
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/metodo_de_pago')}}" class="a">
                                <ion-icon name="cash-outline"></ion-icon>
                                Método de Pago
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/motivo_baja')}}" class="a">
                                <ion-icon name="ban-outline"></ion-icon>
                                Motivo Baja
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/tipo_entrega')}}" class="a">
                                <ion-icon name="mail-outline"></ion-icon>
                                Tipo Entrega
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/tipo_pobreza')}}" class="a">
                                <ion-icon name="bonfire-outline"></ion-icon>
                                Tipo Pobreza
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/grado_escolar')}}" class="a">
                                <ion-icon name="school-outline"></ion-icon>
                                Grado Escolar
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/beca')}}" class="a">
                                <ion-icon name="school-outline"></ion-icon>
                                Beca
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/centro_educativo')}}" class="a">
                                <ion-icon name="storefront-outline"></ion-icon>
                                Centro Educativo
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </aside>
    </div>

    <div class="contenedor principal">
        <div class="navbar">

            <div class="izq">
                <a href="https://construyendosonrisascr.com/">
                    <img src="{{asset('img/logocs.png')}}" alt="logo_construyendo_sonrisas">
                </a>
            </div>

            <div class="der user">
                <ul class="aut">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>

        <main>
            <div class="caja">
                @yield('contenido')
            </div>
        </main>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        const toggle2 = document.getElementById('menuToggle2');
        const ul2 = document.getElementById('ul2');
        const ul22 = document.getElementById('ul22');

        toggle2.onclick = () => {
            console.log('hola');
            // ul.classList.add("d-none");
            
            if (ul2.style.display == "unset") {
                ul2.style.display = ""
            }else{
                ul2.style.display = "unset"
                ul22.style.display = "unset";
            }
        }

    </script>
</body>
</html>
