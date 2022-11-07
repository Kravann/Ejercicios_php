<?php require "clases.php"?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Segundo Parcial</title>
        <style>
            body{
                background-color: lightblue;
            }
        </style>
    </head>
    <body>
        <h1>Segundo Parcial Algoritmos</h1>
        <form action="" method="POST">
            Descripcion : <input type="text" name="descripcion" required> <br> <br>
            Precio : <input type="number" step="0.01" name="precio" required> <br> <br>
            <input type="hidden" name="cargarP" value="1">
            <input type="submit" value="Cargar Producto">
        </form>
        <br>
        <a href="index.php?listar"><button>Listar Productos</button></a>
        <?php 
        
        if(isset($_POST['descripcion']) && $_POST['descripcion'] != ""){
            $producto = new Producto($_POST['descripcion'],$_POST['precio']);
            $producto -> darDeAlta();
        }
        
        if(isset($_GET['listar'])){
            Producto::listar();
        }
        ?>
    </body>
</html>