<?php

namespace app\core;

class Controller
{
    public function view(string $view, ?array $data = null)
    {
        if ($data) {
            extract($data);
        }

        $path = __DIR__ . "/../views/$view.php";

        if (file_exists($path)) {
            require_once $path;
        } else {
            print 'A view solicitada não foi encontrada: ' . $view;
        }
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
        exit();
    }

    public function autenticacaoRequired()
    {
        if (!isset($_SESSION['usuario_logado'])) {

            // 🔥 salva rota RELATIVA (IMPORTANTE)
            $_SESSION['redirect_apos_login'] = $_SERVER['REQUEST_URI'];

            $this->redirect(URL_BASE . '/login');
        }

        // proteção contra sessão inválida
        if (!is_array($_SESSION['usuario_logado'])) {
            session_destroy();
            $this->redirect(URL_BASE . '/login');
        }

        return true;
    }

    public function adminRequired()
    {
        if (!isset($_SESSION['usuario_logado'])) {

            $_SESSION['redirect_apos_login'] = $_SERVER['REQUEST_URI'];

            $this->redirect(URL_BASE . '/login');
        }

        $usuario = $_SESSION['usuario_logado'];

        if (!is_array($usuario)) {
            session_destroy();
            $this->redirect(URL_BASE . '/login');
        }

        if ($usuario['perfil'] !== 'admin') {
            $this->redirect(URL_BASE . '/login');
        }

        return true;
    }
}