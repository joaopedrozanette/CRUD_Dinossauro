<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Dinossauro;
use app\services\DinossauroService;

class DinossauroController extends Controller
{
    private DinossauroService $service;

    public function __construct()
    {
        $this->service = new DinossauroService();
    }

    public function listarTodos()
    {
        $data['lista'] = $this->service->getDinossauros();
        $this->view('dinossauros/dinossauros_list', $data);
    }

    public function verDinossauro()
    {
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/dinossauros');
        }

        $id = $_GET['id'];
        $data['dinossauro'] = $this->service->getDinossauro($id);

        $this->view('dinossauros/dinossauros_show', $data);
    }

    public function criar()
    {
        $this->autenticacaoRequired();
        $this->view('dinossauros/dinossauros_create', []);
    }

    public function salvar()
    {
        $this->adminRequired();

        $nome = $_POST['nome'];
        $especie = $_POST['especie'];
        $peso = $_POST['peso'];
        $imagem = $_POST['imagem'] ?? '';

        $dino = new Dinossauro();

        $dino->setNome($nome);
        $dino->setEspecie($especie);
        $dino->setPeso($peso);
        $dino->setImagem($imagem);

        $this->service->saveDinossauro($dino);

        $this->redirect(URL_BASE . '/dinossauros');
    }
}