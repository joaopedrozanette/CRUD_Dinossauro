<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Dinossauro;
use PDO;

class DinossauroRepository
{
    private PDO $connection;

    public function __construct()
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
        $stm->bindValue(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }

    public function saveDinossauro(Dinossauro $dinossauro)
    {
        $sql = "INSERT INTO dinossauros 
                (nome, especie, periodo, descricao, imagem)
                VALUES 
                (:nome, :especie, :periodo, :descricao, :imagem)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nome', $dinossauro->getNome());
        $stmt->bindValue(':especie', $dinossauro->getEspecie());
        $stmt->bindValue(':periodo', $dinossauro->getPeriodo());
        $stmt->bindValue(':descricao', $dinossauro->getDescricao());
        $stmt->bindValue(':imagem', $dinossauro->getImagem());

        return $stmt->execute();
    }

    public function updateDinossauro(Dinossauro $dinossauro)
    {
        $sql = "UPDATE dinossauros SET
                    nome = :nome,
                    especie = :especie,
                    periodo = :periodo,
                    descricao = :descricao,
                    imagem = :imagem
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':id', $dinossauro->getId());
        $stmt->bindValue(':nome', $dinossauro->getNome());
        $stmt->bindValue(':especie', $dinossauro->getEspecie());
        $stmt->bindValue(':periodo', $dinossauro->getPeriodo());
        $stmt->bindValue(':descricao', $dinossauro->getDescricao());
        $stmt->bindValue(':imagem', $dinossauro->getImagem());

        return $stmt->execute();
    }

    public function deleteDinossauro(int $id)
    {
        $stmt = $this->connection->prepare("DELETE FROM dinossauros WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}