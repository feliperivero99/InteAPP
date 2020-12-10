@include('Common.header')


<body class="bg-gradient-primary">



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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                            @if($status == true)
                                <div class="col-lg-12 ">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Usuario no encontrado
                                            <div class="text-white-50 small">Verifique sus datos</div>
                                        </div>
                                    </div>
                                </div>
                                @endif   
                                <br />
                                <br />
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form id="userlogin" class="user" method="post" action="{{route('loginrequest')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="idusername"
                                                name="email" aria-describedby="emailHelp" placeholder="Usuario..."
                                                required>

                                            <h5 id="usercheck" class="mensajeadvertencia">
                                                **Por favor ingresa el Nickname de usuario y/o verifique que cumpla con el formato establecido
                                            </h5>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Clave" required>

                                            <h5 id="passcheck" class="mensajeadvertencia">
                                                **Por favor ingresa la contraseña y/o verifique que cumpla con el formato establecido
                                            </h5>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">

                                            </div>
                                        </div>


                                        <input type="submit" id="submitbtn" value="Iniciar Sesión"
                                            class="btn btn-primary btn-user btn-block">
                                        <hr>

                                    </form>

                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>


    {!! $js !!}

    @include('Common.footer2')

