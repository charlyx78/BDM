<?php
    class Contacto {
        private $id;
        private $usuario1;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getUsuario1() {
            return $this->usuario1;
        }
        public function setUsuario1($usuario1) {
            $this->usuario1 = $usuario1;
        }

        public function getUsuario2() {
            return $this->usuario2;
        }
        public function setUsuario2($usuario2) {
            $this->usuario2 = $usuario2;
        }

        public function getProducto() {
            return $this->producto;
        }
        public function setProducto($producto) {
            $this->producto = $producto;
        }

        public function __construct($usuario1,$usuario2,$producto) {
            $this->id = $id;
            $this->usuario1 = $usuario1;
            $this->usuario2 = $usuario2;
            $this->producto = $producto;
        }

        static public function addContacto($mysqli, $usuario2, $producto) {
            try {
                $sql = "CALL SP_GestionContactos(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $id = 0;
                $usuario1 = $_SESSION['UsuID'];
                $opcion = "I";

                $statement->bind_param(
                    "iiiis",
                    $id,
                    $usuario1,
                    $usuario2,
                    $producto,
                    $opcion);
                $result = $statement->execute();
            }
            catch (Exception $exc) {
                echo '<script>alert("' . $exc . '")</script>';
            }
        }

        static public function readContacto($mysqli) {
            try {
                $id = 0;
                $usuario1 = $_SESSION['UsuID'];
                $usuario2 = 0;
                $producto = 0;
                $opcion = "SU";
                
                $sql = "CALL SP_GestionContactos(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);

                $statement->bind_param(
                    "iiiis",
                    $id,
                    $usuario1,
                    $usuario2,
                    $producto,
                    $opcion);
                $statement->execute();
                $result = $statement->get_result(); 

                $contactos = array();

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $contacto = $row;
                        $contacto['Imagen1'] = base64_encode($contacto['Imagen1']);
                        $contactos[] = $contacto;
                    }
                    return $contactos;
                }
            }
            catch (Exception $exc) {
                throw new Exception("Error en la consulta: " . $exc->getMessage());
            }
        }
}