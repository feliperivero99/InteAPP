<script type="text/javascript">
$(document).ready(function() {
    $('#usercheck').hide();
    $('#passcheck').hide();
    let usernameError = true;
    let passwordError = true;

    function validateUsername() {
        let usernameValue = $('#idusername').val();
        $('#usercheck').hide();
        if (usernameValue.length == '') {
            $('#usercheck').show();
            usernameError = false;
            return false;
        }

        var re = /^\w+$/;
        if (!re.test(usernameValue)) {
            $('#usercheck').show();
            usernameError = false;
            return false;
        }
    }

    function validatePassword() {
        let passwrdValue =
            $('#password').val();
        $('#passcheck').hide();
        if (passwrdValue.length == '') {
            $('#passcheck').show();
            passwordError = false;
            return false;
        }

        var re = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
        if (!re.test(passwrdValue)) {
            $('#passcheck').show();
            passwordError = false;
            return false;
        }

    }




    $('#submitbtn').click(function() {
        validateUsername();
        validatePassword();

        if ((usernameError == true) &&
            (passwordError == true)) {
            return true;
        } else {
            //alert("nofunciona");
            return false;
        }

    });




});
</script>