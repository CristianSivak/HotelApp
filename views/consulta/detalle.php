<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Actualiza <?php echo $this->huesped->habitacion; ?> </h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>consulta/actualizarHuesped" method="POST">

            <p>
                <label for="matricula">Habitacion</label><br>
                <input type="text" name="habitacion" disabled value= "<?php echo $this->huesped->habitacion; ?>" required>
                
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" value="<?php echo $this->huesped->nombre; ?>" required>
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" value="<?php echo $this->huesped->apellido; ?>" required>
            </p>

            <p>
            <input type="submit" value="Actualizar huesped">
            </p>

        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>