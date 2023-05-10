<?php
    namespace App\models;

    use Core\Model\Model;
    use PDO;

    

    class ProdutoModel extends Model { 
        //Representando os campos da tabela produto
        private $id;
        private $descricao;
        private $preco;
        private $ativo;
        private $deletado_em;
        private $modificado_em;
        private $criado_em;
        
        //método getters and setters
        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        //método salvar
        public function salvar() {
            //sql para inserção no banco
            $sql = "insert into produto (descricao, preco) values (:descricao, :preco)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':preco', $this->__get('preco'));
            //Executa o sql no banco de dados
            $stmt->execute();
            //retorna os dados da inserção no banco
            return $this;
        }
    
       public function produto_salvar(){
        
       }

        public function getProdutos() 
        {
            //sql para retornar os dados do banco de dados
            $sql = "select id, descricao, preco, ativo, criado_em from produto";

            return $this->db->query($sql)->fetchAll();
        }
    }    
?>