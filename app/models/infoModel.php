<?php
    namespace App\models;
    use Core\Model\Model;
    use PDO;

    class InfoModel extends Model{


        public function getInfo() {
            $sql = "select titulo, descricao from info";

            return $this->db->query($sql)->fetchAll();
        }
    }


?>