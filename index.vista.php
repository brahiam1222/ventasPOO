<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Venta de producto</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>VENTA DE PRODUCTOS</h1>
        </header>

        <section>
            <?php 
                if($_POST){
                    list($videograbadora,$camara,$televisor,$radiograbadora) = productoSeleccionado($_POST['producto']);
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                <div class="form-floating mb-3">
                    <select class="form-select" id="producto" name="producto">
                        <option value="Videograbadora"<?php if($_POST){ echo $videograbadora;} ?>>Videograbadora</option>
                        <option value="Camara"<?php if($_POST){ echo $camara;} ?>>Camara</option>
                        <option value="Televisor" <?php if($_POST){ echo $televisor;} ?>>Televisor</option>
                        <option value="Radiograbadora" <?php if($_POST){ echo $radiograbadora;} ?>>Radiograbadora</option>
                    </select>
                    <label for="producto">PRODUCTO</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="">
                    <label for="cantidad">CANTIDAD</label>
                </div>

                <button type="submit" class="btn btn-primary mb-3">COMPRAR</button>
            </form>
            <hr>
            <div class="row">
                <div class="col-2">
                    <h4>SUBTOTAL:</h4>
                </div>
                <div class="col-9">
                    <h4><?php 
                        if($_POST){
                            echo ('$ '. $producto->calcularSubtotal());
                        }else{
                            echo '$---';
                        }
                    ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <h4>DESCUENTO:</h4>
                </div>
                <div class="col-9">
                    <h4><?php 
                        if($_POST){
                            echo '$ '. $producto->calcularDescuento();
                        }else{
                            echo '$---';
                        }
                    ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <h4>TOTAL:</h4>
                </div>
                <div class="col-9">
                    <h4><?php 
                        if($_POST){
                            echo '$ '. $producto->calcularTotal();
                        }else{
                            echo '$---';
                        }
                    ?></h4>
                </div>
            </div>
        </section>
    </div>
</body>
</html>