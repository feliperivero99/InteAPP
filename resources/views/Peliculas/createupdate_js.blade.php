<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {

    $('#userncheck').hide();
    $('#yearcheck').hide();




    let docuError = true;
    let userError = true;
    let nameError = true;
    let apeError = true;
    let emailError = true;
    let passwordError = true;
    let confirpasswordError = true;
    let rolworddError = true;






    function validateNames() {
        let usernameValue = $('#titulo').val();
        $('#userncheck').hide();
        nameError = true;
        if (usernameValue.length == '') {
            $('#userncheck').show();
            nameError = false;
            return false;
        }
    }


    function validateUsername() {
        let usernameValue = $('#year').val();

        var e3 = document.getElementById("year");
        var strUser3 = e3.options[e3.selectedIndex].value;
        userError = true;
        $('#yearcheck').hide();
        if (strUser3 == 0 || strUser3 == "0") {
            $('#yearcheck').show();

            userError = false;
            return false;


        }
    }




    $('#submitbtn').click(function() {


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



            //e.preventDefault();

            var titulo = $('#titulo').val();
            var sipnosis = $('#sipnosis').val();

            var e3 = document.getElementById("year");
            var strUser3 = e3.options[e3.selectedIndex].value;
            var year = strUser3;
            var iduser = $('#iduser').val();

            $.ajax({
                type: 'POST',
                @if($edit == 0)
                url: "{{route('Peliculascreate')}}",
                @endif

                @if($edit == 1)
                url: "{{route('Peliculasedit')}}",
                @endif


                data: {
                    @if($edit == 1)
                    iduser: iduser,
                    @endif
                    titulo: titulo,
                    sipnosis: sipnosis,
                    year: year
                },
                success: function(data) {
                    $('#avisoexito').modal('show');

                    $('#titulo').val("");
                    $('#sipnosis').val("");
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