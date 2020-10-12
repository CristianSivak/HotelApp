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
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>
        <div class="center" id="respuesta"></div>
        
        <table width="100%" id="tabla">
            <thead>
                <tr>
                    <th>Habitacion</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-huespedes">
            
        <?php
            include_once 'models/huesped.php';
            foreach ($this->huespedes as $row) {
                $huesped = new Huesped();
                $huesped = $row;
        ?>
                <tr id="fila-<?php echo $huesped->habitacion; ?>">
                    <td><?php echo $huesped->habitacion; ?></td>
                    <td><?php echo $huesped->nombre; ?></td>
                    <td><?php echo $huesped->apellido; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consulta/verHuesped/' . $huesped->habitacion; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-habitacion="<?php echo $huesped->habitacion; ?>">Check Out</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
</body>
</html>