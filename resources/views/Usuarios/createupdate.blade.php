@include('Common.headeradmin')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        @include('Menus.menuadmin')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$name}} </span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Formulario de Usuarios </h1>

                    </div>


                </div>
                <!-- /.container-fluid -->

                <div class="container">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Datos de Usuario</h1>
                                                </div>
                                                <form id="userForm" class="user" method="post" action="">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">

                                                        <p class="avisoform"> <span>*obligatorio, solo puede tener
                                                                letras, numeros, y guión abajo. minimo 5
                                                                caracteres</span> <i class="fas fa-question"></i></p>


                                                        <input type="text" class="form-control form-control-user"
                                                            id="username" name="username"
                                                            placeholder="Ingrese el Nickname..."
                                                            value="{{!empty($user)? !empty($user->nickname)? $user->nickname : '' : ''}}">
                                                        <h5 id="userncheck" class="mensajeadvertencia">
                                                            **Por favor ingresa el Nickname y verifique que sea en el
                                                            formato correcto
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">

                                                        <p class="avisoform"> <span>*obligatorio, minimo 5
                                                                caracteres</span> <i class="fas fa-question"></i></p>

                                                        <input type="text" class="form-control form-control-user"
                                                            id="Nombres" name="Nombres"
                                                            placeholder="Ingrese  Los nombres..."
                                                            value="{{!empty($user)? !empty($user->nombres)? $user->nombres : '' : ''}}">
                                                        <h5 id="namencheck" class="mensajeadvertencia">
                                                            **Por favor ingresa los nombres del usuario, caracteres
                                                            minimos 5
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">

                                                        <p class="avisoform"> <span>*obligatorio, Debe tener al menos
                                                                una mayuscula y un numero. Minimo 5 caracteres</span> <i
                                                                class="fas fa-question"></i></p>


                                                        @if($edit == 1)
                                                        <p class="avisoform"> <span>*En el caso de edición, deje los campos de contraseña vacios si no le cambiara la contraseña al usuario</span> <i
                                                                class="fas fa-question"></i></p>
                                                        @endif
                                                        <input type="password" class="form-control form-control-user"
                                                            id="password" name="password"
                                                            placeholder="Ingrese la contraseña del usuario">
                                                        <h5 id="passwordcheck" class="mensajeadvertencia">
                                                            **Por favor ingresa la contraseña cumpliendo con el formato
                                                            indicado
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                            id="confirpassword"
                                                            placeholder="Ingrese la confirmación de la  contraseña">
                                                        <h5 id="confirpasswordcheck" class="mensajeadvertencia">
                                                            **Por favor ingresa la confirmación de la contraseña
                                                            cumpliendo con el formato indicado
                                                        </h5>
                                                    </div>



                                                    <h5 id="confirequlcheck" class="mensajeadvertencia">
                                                        **Las contraseñas no son iguales
                                                    </h5>

                                                    <h5 id="confirequlcheck2" class="mensajeadvertencia">
                                                        **Si va a cambiar las contraseñas, ambos campos deben estar
                                                        llenos y la contraseñas coincidir
                                                    </h5>


                                                    <input type="button" id="submitbtn" value="Guardar"
                                                        class="btn btn-primary btn-user btn-block">
                                                    <br />
                                                    <br />
                                                    <a class="btn btn-secondary btn-user btn-block"
                                                        href="{{route('usuarios')}}">
                                                        Cancelar
                                                    </a>

                                                    <input type="hidden" id="iduser" name="iduser"
                                                        value="{{!empty($user)? !empty($user->id)? $user->id : '' : ''}}">

                                                </form>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Si desea cerrar sesión haga click en el boton salir del modal.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Salir</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Logout Modal-->
    <div class="modal fade" id="mensajeerror" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error a la hora de registrar usuario</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Estimado usuario, hubo un error a la hora de registrar el usuario. Por favor
                    verifique los datos ingresados</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="avisoexito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="bodytexto">El usuario ha sido registrado exitosamente, Puede regresar al menu de usuario
                    para verlo </div>
                <div class="modal-footer">

                    <a class="btn btn-primary" href="{{route('usuarios')}}">Menu de usuarios</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>




    {!! $js !!}

</body>

</html>