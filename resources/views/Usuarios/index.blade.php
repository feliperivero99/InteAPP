@include('Common.headeradmin')


<link href=" {{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard - Usuarios </h1>
                        <a href="{{route('usuarioscreate')}}"
                            class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Crear usuarios</a>
                    </div>


                </div>
                <!-- /.container-fluid -->
                <hr class="sidebar-divider" />

                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Busqueda (Las busquedas pueden ser
                                        combinadas)</h6>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <form id="formuser" action="{{route('usuariossearch')}}"
                                                class=" d-md-inline-block form-inline" style="width:100%">
                                       

                                                <div class="input-group">
                                                    <input id="search" name="search" type="text"
                                                        class="form-control bg-light border-0 small"
                                                        placeholder="Buscar por..." aria-label="Search"
                                                        aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            onclick="ejecutar2()">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <h5 id="confirpasswordcheck" style="color: red; display:none;">
                                                **Por favor debe  texto de busqueda
                                            </h5>

                                            <br>
                                            <br>
                                            <br>

                                            <a href="{{route('usuarios')}}"
                                                class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                    class="fas fa-download fa-sm text-white-50"></i> Listado
                                                completo</a>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="sidebar-divider" />
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listados de Usuarios:</h6>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <div class="text-left mb-4">

                                            </div>

                                        </div>

                                        <div class="col-lg-4 mb-4">

                                        </div>

                                        <div class="col-lg-4 mb-4">



                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Posición</th>
                                                    <th>Acciones</th>
                                                    <th>Nombres</th>
                                                    <th>Nickname</th>
                                                    <th>Fecha de Registro</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Posición</th>
                                                    <th>Acciones</th>
                                                    <th>Nombres</th>
                                                    <th>Nickname</th>
                                                 
                                                    <th>Fecha de Registro</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                @foreach($matrizuser as $bosuper)
                                                <tr>
                                                    <td> {{ $bosuper['pos']}} </td>
                                                    <th>

                                                        <a style="color:black;  display: inline-block;"
                                                            href="{{route('usuariosedit', ['id' => $bosuper['id']])}}">Editar</a>
                                                        <br />
                                                        <br />
                                                        <a style="color:red;  display: inline-block;" href="#"
                                                            onclick="eliminar({{ $bosuper['id']}})">Eliminar</a>

                                                    </th>
                                                  
                                                    <td> {{ $bosuper['nombres']}} </td>
                                                    <td> {{ $bosuper['nickname']}} </td>
                                                    
                                                    <td> {{ $bosuper['created_at']}} </td>

                                                </tr>

                                                @endforeach


                                            </tbody>
                                        </table>
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

    <!-- Mensaje de eliminar-->
    <div class="modal fade" id="seleccionarelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>¿Realmente desea eliminar este usuario?</h5>.
                </div>
                <form id="userFormdelete" class="user" method="post" action="{{ route('usuariosdelete')}}">
                    {{ csrf_field() }}
                    <input type="hidden" id="iduser" name="iduser" value="3487">
                </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="#" onclick="ejecutar()">Eliminar</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Mensaje de aviso-->
    <div class="modal fade" id="avisomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aviso de sistema</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if($aviso == 1)

                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    ADVERTENCIA
                                    <div class="text-white-50 small">No se pudo registrar el usuario, Revise los datos
                                        ingresados</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    @if($aviso == 2)

                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    AVISO
                                    <div class="text-white-50 small">Usuario creado con exito</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($aviso == 3)

                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    ADVERTENCIA
                                    <div class="text-white-50 small">No se encontrar el usuario, de aviso al admin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    @if($aviso == 4)

                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    ADVERTENCIA
                                    <div class="text-white-50 small">No se pudo editar el usuario, de aviso al admin
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    @if($aviso == 5)

                    <div class="container-fluid">
                        <div class="col-lg-12 ">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    AVISO
                                    <div class="text-white-50 small">Usuario editado con exito</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->

    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
    $('#dataTable').DataTable();

    function eliminar(a) {
        document.getElementById('iduser').value = a;
        $('#seleccionarelim').modal('show');
    }

    function ejecutar() {
        document.getElementById('userFormdelete').submit();
    }

    function ejecutar2() {
        document.getElementById("confirpasswordcheck").style.display = "none";
     

        var val = document.getElementById('search').value;
       


        document.getElementById('formuser').submit();

    }





    @if($aviso != 0)
    $('#avisomodal').modal('show');
    @endif
    </script>



</body>

</html>