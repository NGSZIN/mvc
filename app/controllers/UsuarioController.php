<?php

namespace App\controllers;

use App\Controllers\AuthController;
use Core\controller\Action;
use Core\model\Container;

class UsuarioController extends Action
{
    public function cadastrar()
    {
        AuthController::validaAutenticacao();
        $this->render("cadastrar", "template_admin");
    }

    public function salvar_usuario()
    {
        // dd($_POST);
        #1º fazer a instancia do usuario com conexao com banco de dados
        $usuario = Container::getModel("Usuario");

        #2º receber dados do POST
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('sobrenome', $_POST['sobrenome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));
        $usuario->__set('nivel', isset($_POST['nivel']) ? 1 : 0);

        #3º (opcional) validar campos
        if ($usuario->validarCadastro()) {

            if (count($usuario->getUsuarioPorEmail()) == 0) {

                $usuario->salvar();

                //passar informações do cadastro para a view
                $this->view->status = array(
                    "status" => "SUCCESS",
                    "msg"    => "Usuário cadastrado com sucesso"
                );

                $this->render("cadastrar", "template_admin");
            } else {
                //passar informações do cadastro para a view
                $this->view->status = array(
                    "status" => "ERROR",
                    "msg"    => "Erro ao cadastrar o usuário, e-mail já cadastrado no banco de dados!"
                );
                $this->view->tempUsuario = array(
                    "nome" => $_POST['nome'],
                    "sobrenome" => $_POST['sobrenome'],
                    "email" => $_POST['email'],
                    "senha" => $_POST['senha'],
                    "nivel" => isset($_POST['nivel']) ? 1 : 0
                );

                $this->render("cadastrar", "template_admin");
            }
        } else {
            echo "Else do Validar Cadastro";
        }
    }
}
