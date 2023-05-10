<?php
    namespace Core\model;

    use App\database\Connection;

    class Container {

        //método responsavel por retornar o modelo solicitado
        //já instanciado o inclusive ja com a conexão com o banco de dados
        public static function getModel($model) {
            //montado o caminho de onde o model se localiza e unindo
            $class = "App\\models\\" . ucfirst($model) . "Model";

            $conn = Connection::getDb();

            return new $class($conn);
        }
    }