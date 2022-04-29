<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=<?php echo URL."/public/css/local-styles.css" ?>>
    <script src="<?php echo URL."/public/js/index.js" ?>"></script>
    <title>Modificar Usuario</title>
</head>
<body>
    <main>
        <section class="container-form">
            <div class="card-header">
                <h1 class="title">Modificar usuario</h1>
            </div>
            <div class="card">
                <form onsubmit="return validateForm()" action="<?php echo URL.'UserController/update'?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $model->getID() ?>">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" placeholder="Ingrese su nombre..." value="<?php echo $model->getName()?>" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Ingrese su apellido..." value="<?php echo $model->getLastName()?>" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario..." value="<?php echo $model->getUsername()?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" placeholder="Contraseña..." value="<?php echo $model->getPassword()?>" required>
                    </div>

                    <div class="form-group">
                        <label for="repassword">Re-Contraseña</label>
                        <input id="repassword" name="repassword" type="password" placeholder="Re-Contraseña..." value="<?php echo $model->getPassword()?>" required>
                    </div>

                    <div class="form-group">
                        <div class="btn-submit">
                            <button class="btn btn-save">Guardar</button>
                            <a  href="<?php echo URL.'UserController' ?>" class="btn btn-back">Volver</a>
                        </div>
                    </div>
                
                </form>
             
            </div>
        </section>
   
    </main>
</body>
</html>