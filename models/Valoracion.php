<?php 
    class Valoracion {
        private $id;
        private $producto;
        private $cliente;
        private $calificacion;
        private $comentario;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getProducto() {
            return $this->producto;
        }
        public function setProducto($producto) {
            $this->producto= $producto;
        }

        public function getCliente() {
            return $this->cliente;
        }
        public function setCliente($cliente) {
            $this->cliente= $cliente;
        }

        public function getCalificacion() {
            return $this->calificacion;
        }
        public function setCalificacion($calificacion) {
            $this->calificacion= $calificacion;
        }

        public function getComentario() {
            return $this->comentario;
        }
        public function setComentario($comentario) {
            $this->comentario= $comentario;
        }

        public function __construct($producto,$cliente,$calificacion,$comentario) {
            $this->producto = $producto;
            $this->cliente = $cliente;
            $this->calificacion = $calificacion;
            $this->comentario = $comentario;
        }

        static public function addResena($mysqli, $TituloResena, $ComentarioResena, $CalificacionResena, $idProducto) {
            try {
            $sql = "CALL SP_GestionValoracion(?,?,?,?,?,?)";
            $statement = $mysqli->prepare($sql);

            $idValoracion = 0;
            $cliente = $_SESSION['UsuID'];
            $opcion = "I";

            $statement->bind_param(
                "iiidss",
                $idValoracion,
                $idProducto,
                $cliente,
                $CalificacionResena,
                $ComentarioResena,
                $opcion);

                $result = $statement->execute();

                if($result) {
                    echo 'Producto agregado a Carrito exitosamente';
                }
                else {
                    echo 'Error al agregar producto a Carrito';  
                }
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }
    }