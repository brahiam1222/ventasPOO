<?php
    include('producto.php');
    
    if($_POST){
        $producto = new Producto($_POST['producto'],$_POST['cantidad']);  
        $dato = array(

            'Nombre' => $producto->getProducto(),
            'Cantidad' => $producto->getCantidad(),
            'subtotal' => $producto->calcularSubtotal(),
            'descuento' => $producto->calcularDescuento(),
            'total' => $producto->calcularTotal()


        );
        $fichero = 'Json/productos.json';
        $actualJson = file_get_contents($fichero);
        $actual = json_decode($actualJson,true);

        $actual[] = $dato;
        $actualJson = json_encode($actual);

        
        file_put_contents($fichero, $actualJson);
    }

    function productoSeleccionado($producto){
        if($producto=='Videograbadora'){
            $selV = "selected";
        }else{
            $selV = "";
        }
        if($producto=='Camara'){
            $selC = "selected";
        }else{
            $selC = "";
        }
        if($producto=='Televisor'){
            $selT = "selected";
        }else{
            $selT = "";
        }
        if($producto=='Radiograbadora'){
            $selR = "selected";
        }else{
            $selR = "";
        }

        return array($selV,$selC,$selT,$selR);
    }
    include('index.vista.php');
?>