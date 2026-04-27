<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Usuario;
use PDO;

class UsuarioRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getUsuarios(): array
    {
        $sql = "SELECT id, nome_usuario, email, perfil FROM usuarios";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveUsuario(Usuario $usuario): bool
    {
        $sql = "INSERT INTO usuarios (nome_usuario, email, senha, perfil) 
                VALUES (:nome, :email, :senha, :perfil)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $usuario->getNomeUsuario());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT));
        $stmt->bindValue(':perfil', $usuario->getPerfil());

        return $stmt->execute();
    }

    public function getUsuarioById(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) return null;

        return Usuario::arrayParaObjeto($usuario);
    }

    public function getUsuarioByEmail(string $email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) return false;

        return Usuario::arrayParaObjeto($usuario);
    }

    public function updateUsuario(Usuario $usuario): bool
    {
        if (!empty($usuario->getSenha())) {

            $sql = "UPDATE usuarios 
                    SET nome_usuario = :nome, email = :email, senha = :senha, perfil = :perfil 
                    WHERE id = :id";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT));

        } else {

            $sql = "UPDATE usuarios 
                    SET nome_usuario = :nome, email = :email, perfil = :perfil 
                    WHERE id = :id";

            $stmt = $this->connection->prepare($sql);
        }

        $stmt->bindValue(':nome', $usuario->getNomeUsuario());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':perfil', $usuario->getPerfil());
        $stmt->bindValue(':id', $usuario->getId());

        return $stmt->execute();
    }

    public function deleteUsuario(int $id): bool
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}