<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Dinossauro;
use PDO;

class DinossauroRepository
{
    private PDO $connection;

    function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getDinossauros(): array
    {
        $stm = $this->connection->prepare("SELECT * FROM dinossauros");
        $stm->execute();

        return $stm->fetchAll();
    }

    public function getDinossauro(int $id)
    {
        $stm = $this->connection->prepare("SELECT * FROM dinossauros WHERE id = :id");
        $stm->bindValue('id', $id);
        $stm->execute();

        return $stm->fetch();
    }

    public function existePorNome(string $nome): bool
    {
        $stm = $this->connection->prepare("SELECT COUNT(*) FROM dinossauros WHERE nome = :nome");
        $stm->bindValue('nome', $nome);
        $stm->execute();

        return $stm->fetchColumn() > 0;
    }

    public function saveDinossauro(Dinossauro $dinossauro)
    {
        $sql = "INSERT INTO dinossauros (nome, especie, peso, imagem) 
                VALUES(:nome, :especie, :peso, :imagem)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $dinossauro->getNome());
        $stmt->bindValue(':especie', $dinossauro->getEspecie());
        $stmt->bindValue(':peso', $dinossauro->getPeso());
        $stmt->bindValue(':imagem', $dinossauro->getImagem());

        return $stmt->execute();
    }
}