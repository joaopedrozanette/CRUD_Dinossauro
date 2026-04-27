<?php

namespace app\controllers;

use app\core\Controller;
use app\services\AutenticacaoService;

class AutenticacaoController extends Controller
{
    private AutenticacaoService $autenticacaoService;

    public function __construct()
    {
        $this->autenticacaoService = new AutenticacaoService();
    }

    public function login()
    {
        $this->view('autenticacao/login');
    }

    public function logar()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $resultado = $this->autenticacaoService->logar($email, $senha);

        if ($resultado) {

            if (isset($_SESSION['redirect_apos_login'])) {
                $url = $_SESSION['redirect_apos_login'];
                unset($_SESSION['redirect_apos_login']);

                $this->redirect($url);
            }

            $this->redirect(URL_BASE . '/dinossauros');

        } else {
            $dados['erros'] = "Email ou senha inválidos";
            $this->view('autenticacao/login', $dados);
        }
    }
}