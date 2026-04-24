<?php
namespace App\Models;

use App\Core\Database;

class Dinossauro {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM dinossauros ORDER BY nome ASC";
        return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM dinossauros WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // REGRA DE NEGÓCIO: Verificar se o nome já existe
    public function nomeJaExiste($nome, $idAtual = null) {
        $sql = "SELECT COUNT(*) FROM dinossauros WHERE nome = :nome";
        $params = ['nome' => $nome];

        if ($idAtual) {
            $sql .= " AND id != :id";
            $params['id'] = $idAtual;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    public function salvar($data) {
        $stmt = $this->db->prepare("INSERT INTO dinossauros (nome, especie, periodo, dieta) VALUES (:nome, :especie, :periodo, :dieta)");
        return $stmt->execute($data);
    }

    public function atualizar($id, $data) {
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE dinossauros SET nome = :nome, especie = :especie, periodo = :periodo, dieta = :dieta WHERE id = :id");
        return $stmt->execute($data);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM dinossauros WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}