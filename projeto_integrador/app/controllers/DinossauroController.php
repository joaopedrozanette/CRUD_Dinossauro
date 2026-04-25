<?php

namespace app\controllers;

use app\models\Dinossauro;
use app\repositories\DinossauroRepository;

class DinossauroController
{
    private DinossauroRepository $repository;

    public function __construct()
    {
        $this->repository = new DinossauroRepository();
        session_start();
    }

    public function listarTodos()
    {
        $dinossauros = $this->repository->getDinossauros();
        require __DIR__ . '/../views/dinossauros/listar.php';
    }

    public function ver()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID inválido");
        }

        $dinossauro = $this->repository->getDinossauro($id);
        require __DIR__ . '/../views/dinossauros/visualizar.php';
    }

    public function criar()
    {
        $this->verificarAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validação
            if (empty($_POST['nome'])) {
                die("Nome é obrigatório");
            }

            // Regra de negócio
            if ($this->repository->existePorNome($_POST['nome'])) {
                die("Dinossauro já cadastrado");
            }

            $dinossauro = new Dinossauro();
            $dinossauro->setNome($_POST['nome']);
            $dinossauro->setEspecie($_POST['especie']);
            $dinossauro->setPeriodo($_POST['periodo']);
            $dinossauro->setDescricao($_POST['descricao']);
            $dinossauro->setImagem($_POST['imagem']);

            $this->repository->saveDinossauro($dinossauro);

            header("Location: /dinossauros");
            exit;
        }

        require __DIR__ . '/../views/dinossauros/form.php';
    }

    public function editar()
    {
        $this->verificarAuth();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID inválido");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dinossauro = new Dinossauro();
            $dinossauro->setId($id);
            $dinossauro->setNome($_POST['nome']);
            $dinossauro->setEspecie($_POST['especie']);
            $dinossauro->setPeriodo($_POST['periodo']);
            $dinossauro->setDescricao($_POST['descricao']);
            $dinossauro->setImagem($_POST['imagem']);

            $this->repository->updateDinossauro($dinossauro);

            header("Location: /dinossauros");
            exit;
        }

        $dinossauro = $this->repository->getDinossauro($id);
        require __DIR__ . '/../views/dinossauros/form.php';
    }

    public function deletar()
    {
        $this->verificarAuth();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID inválido");
        }

        $this->repository->deleteDinossauro($id);

        header("Location: /dinossauros");
    }

    private function verificarAuth()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: /login");
            exit;
        }
    }
}