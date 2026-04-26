<?php

namespace app\services;

use app\repositories\UsuarioRepository;

class AutenticacaoService
{
    private UsuarioRepository $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function logar(string $email, string $senha): bool
    {
        $usuario = $this->usuarioRepository->getUsuarioByEmail($email);

        if ($usuario && password_verify($senha, $usuario->getSenha())) {

            // 🔥 salva como ARRAY (não objeto!)
            $_SESSION['usuario_logado'] = [
                'id' => $usuario->getId(),
                'nome' => $usuario->getNomeUsuario(),
                'email' => $usuario->getEmail(),
                'perfil' => $usuario->getPerfil()
            ];

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_destroy();
    }
}