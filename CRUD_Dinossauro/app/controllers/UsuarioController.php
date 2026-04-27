<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validador;
use app\models\Usuario;
use app\services\UsuarioService;

class UsuarioController extends Controller
{
    private UsuarioService $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function index()
    {
        $data['usuarios'] = $this->service->getUsuarios();
        $this->view('usuarios/usuario_list', $data);
    }

    public function cadastrar()
    {
        $this->adminRequired();
        $this->view('usuarios/usuario_create');
    }

    public function salvar()
    {
        $this->adminRequired();

        $validador = new Validador();

        $nomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $email  = $_POST['email'];
        $senha  = $_POST['senha'];
        $perfil = $_POST['perfil'];

        $validador->obrigatorio('nomeUsuario', $nomeUsuario);
        $validador->obrigatorio('email', $email);

        if ($validador->temErros()) {

            $data['usuario'] = $_POST;
            $data['erros'] = $validador->getErros();

            $this->view('usuarios/usuario_create', $data);
            return;
        }

        $usuario = new Usuario(0, $nomeUsuario, $email, $senha, $perfil);

        if ($this->service->saveUsuario($usuario)) {
            $this->redirect(URL_BASE . '/usuarios');
        } else {
            $data["usuario"] = $_POST;
            $data['erros']['email'] = "E-mail já cadastrado";

            $this->view('usuarios/usuario_create', $data);
        }
    }

    public function editar()
    {
        $this->adminRequired();

        $id = $_GET['id'];

        $usuario = $this->service->getUsuarioById($id);

        $data['usuario'] = [
            'id' => $usuario->getId(),
            'nomeUsuario' => $usuario->getNomeUsuario(),
            'email' => $usuario->getEmail(),
            'perfil' => $usuario->getPerfil()
        ];

        $this->view('usuarios/usuario_edit', $data);
    }

    public function atualizar()
    {
        $this->adminRequired();

        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'] ?? '',
            $_POST['perfil']
        );

        $this->service->updateUsuario($usuario);

        $this->redirect(URL_BASE . '/usuarios');
    }

    public function excluir()
    {
        $this->adminRequired();

        $id = $_GET['id'];

        $this->service->deleteUsuario($id);

        $this->redirect(URL_BASE . '/usuarios');
    }
}