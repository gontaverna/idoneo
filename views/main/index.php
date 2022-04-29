<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=<?php echo URL."/public/css/local-styles.css" ?>>
    <title>Idoneo</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="card-header">
                <h1 class="title">Idoneo</h1>
            </div>
            
            <div class="card">
                <form action="IndexController/login" method="POST">
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Usuario..." required>
                    </div>

                    <div class="form-group">
                        <input id="password" name="password" type="password" placeholder="Contraseña..." required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-login">Iniciar Sesión</button>
                    </div>
                
                </form>
            
            </div>

        </div>

    </main>
</body>
</html>