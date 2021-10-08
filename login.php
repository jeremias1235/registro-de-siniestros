<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- aki van los css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/estilo.css"> -->
</head>

<body>

    <form class="px-4 py-3" id="login" method="POST" action="procesarlogin.php">
        <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre Usuario" require>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Password" require>
        </div>

        <button type="button" class="btn btn-primary" id="entrar"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
    </form>

    <!-- aki van los scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {

            $('#entrar').on('click', function(e){
                e.preventDefault();
                
                var user = $('#usuario').val();
                var pass = $('#contrasena').val();

                    if (user == "") {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'usuario en blanco',
                            showConfirmButton: true,
                            // timer: 1500
                        })
                    } else  if (pass == "") {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'password vacia',
                            showConfirmButton: true,
                            // timer: 1500
                        })
                    } else {
                        document.getElementById('login').submit();
                    }
            })
        })
    </script>




</body>

</html>