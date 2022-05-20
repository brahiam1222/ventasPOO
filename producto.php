<?php 
    class Producto{
        private $producto;
        private $cantidad;
    
        function __construct($producto,$cantidad){
            $this->producto = $producto;
            $this->cantidad = $cantidad;
        }

        public function getProducto(){
            return $this->producto;
        }

        public function setProducto($producto){
            $this->producto = $producto;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }

        public function precio(){
            if($this->producto == "Videograbadora"){
                return 1500;
            }elseif($this->producto == "Camara"){
                return 900;
            }elseif($this->producto == "Televisor"){
                return 2500;
            }elseif($this->producto == "Radiograbadora"){
                return 500;
            }else{
                return 0;
            }
        }

        public function calcularSubtotal(){
            return $this->precio() * $this->cantidad;
        }

        public function calcularDescuento(){
            if($this->calcularSubtotal()>2500){
                return $this->calcularSubtotal() * 0.1;
            }else{
                return 0;
            }
        }

        public function calcularTotal(){
            return $this->calcularSubtotal() - $this->calcularDescuento();
        } 











    }

?>