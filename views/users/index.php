<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/239d2ac951.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=<?php echo URL."/public/css/local-styles.css" ?>>
    <title>Home</title>
</head>
<body>
    <main>
        <a class="logout" href="<?php echo URL ?>"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesión</a>
        <a href="<?php echo URL."UserController/create" ?>" class="btn btn-add">+ Nuevo Usuario</a>
    <table>
        <thead>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        <?php  foreach($model as $user) { ?>
                
          
                <tr>
                    <td><?php echo $user->getUsername(); ?></td>
                    <td><?php echo $user->getName(); ?></td>
                    <td><?php echo $user->getLastName();?></td>
                    <td><?php echo "<a href='".URL."UserController/update?id=".$user->getID()."'><i class='fa fa-pen'> </i></a>" ?></td>
                    <td><?php echo "<a href='".URL."UserController/delete?id=".$user->getID()."'><i class='fa fa-x'> </i></a>" ?></td>
                 
                </tr>
            
        
         <?php }?>
        </tbody>
    </table>
       
    </main>
</body>
</html>