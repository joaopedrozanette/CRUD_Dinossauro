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

   public function updateDinossauro(Dinossauro $d): bool
{
    $sql = "UPDATE dinossauros 
            SET nome = :nome,
                especie = :especie,
                peso = :peso,
                imagem = :imagem
            WHERE id = :id";

    $stmt = $this->connection->prepare($sql);

    $stmt->bindValue(':nome', $d->getNome());
    $stmt->bindValue(':especie', $d->getEspecie());
    $stmt->bindValue(':peso', $d->getPeso());
    $stmt->bindValue(':imagem', $d->getImagem()); // ✅ ESSENCIAL
    $stmt->bindValue(':id', $d->getId());

    return $stmt->execute();
}

public function deleteDinossauro(int $id)
{
    $stmt = $this->connection->prepare("DELETE FROM dinossauros WHERE id = :id");
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
}

public function existsByNome(string $nome)
{
    $stmt = $this->connection->prepare("SELECT id FROM dinossauros WHERE nome = :nome");
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    return $stmt->fetch() !== false;
}
}