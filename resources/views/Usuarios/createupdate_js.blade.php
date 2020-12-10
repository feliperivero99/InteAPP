<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {

    $('#userncheck').hide();
    $('#namencheck').hide();

    $('#passwordcheck').hide();
    $('#confirpasswordcheck').hide();

    $('#confirequlcheck').hide();
    $('#confirequlcheck2').hide();



    let docuError = true;
    let userError = true;
    let nameError = true;
    let apeError = true;
    let emailError = true;
    let passwordError = true;
    let confirpasswordError = true;
    let rolworddError = true;


    function validateConfirPassword() {
        let usernameValue = $('#confirpassword').val();
        $('#confirpasswordcheck').hide();
        if (usernameValue.length == '') {
            $('#confirpasswordcheck').show();
            confirpasswordError = false;
            return false;
        }

        var re = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
        if (!re.test(usernameValue)) {
            $('#confirpasswordcheck').show();
            confirpasswordError = false;
            return false;
        }
    }

    function validatePassword() {
        let usernameValue = $('#password').val();
        $('#passwordcheck').hide();
        if (usernameValue.length == '') {
            $('#passwordcheck').show();
            passwordError = false;
            return false;
        }

        var re = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
        if (!re.test(usernameValue)) {
            $('#passwordcheck').show();
            passwordError = false;
            return false;
        }
    }



    function validateNames() {
        let usernameValue = $('#Nombres').val();
        $('#namencheck').hide();
        if (usernameValue.length == '') {
            $('#namencheck').show();
            nameError = false;
            return false;
        }
    }


    function validateUsername() {
        let usernameValue = $('#username').val();
        $('#userncheck').hide();
        if (usernameValue.length == '' || usernameValue.length < 5) {
            $('#userncheck').show();

            userError = false;
            return false;
        }

        var re = /^[a-zA-Z0-9_]+$/;

        var pop = re.test(usernameValue);
        //alert(pop);
        if (pop == false) {
            $('#userncheck').show();
            userError = false;
            return false;
        }
    }




    $('#submitbtn').click(function() {




        @if($edit == 0)
        validateConfirPassword();
        validatePassword();
        @endif



        validateNames();
        validateUsername();




        if ((emailError == true) &&
            (docuError == true) &&
            (rolworddError == true) &&
            (confirpasswordError == true) &&
            (passwordError == true) &&
            (apeError == true) &&
            (nameError == true) &&
            (docuError == true)) {

            @if($edit == 0)
            if ($('#confirpassword').val() != $('#password').val()) {
                $('#confirequlcheck').show();
                return false;

            }

            @endif

            @if($edit == 1)
            if ($('#confirpassword').val() != "" || $('#password').val() != "") {
                if ($('#confirpassword').val() != $('#password').val()) {
                    $('#confirequlcheck2').show();
                    return false;

                }

            }

            @endif

            //e.preventDefault();

            var name = $('#Nombres').val();
            var password = $('#password').val();
            var nick = $('#username').val();
            var iduser = $('#iduser').val();

            $.ajax({
                type: 'POST',
                @if($edit == 0)
                url: "{{route('usuarioscreate')}}",
                @endif

                @if($edit == 1)
                url: "{{route('usuariosedit')}}",
                @endif


                data: {
                    @if($edit == 1)
                    iduser: iduser,
                    @endif
                    name: name,
                    password: password,
                    nick: nick
                },
                success: function(data) {
                    $('#avisoexito').modal('show');
                },
                error: function(data) {
                    $('#mensajeerror').modal('show');
                }
            });

            e.preventDefault();
            return false;
        } else {
            //alert("nofunciona");
            return false;
        }

    });




});
</script>