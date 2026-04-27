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

        $data['dinossauro'] = $this->service->getDinossauro($_GET['id']);
        $this->view('dinossauros/dinossauros_show', $data);
    }

    public function criar()
    {
        $this->autenticacaoRequired();
        $this->view('dinossauros/dinossauros_create');
    }

    public function salvar()
    {
        $this->adminRequired();

        try {
            $d = new Dinossauro();
            $d->setNome($_POST['nome']);
            $d->setEspecie($_POST['especie']);
            $d->setPeso($_POST['peso']);

            $this->service->saveDinossauro($d);

            $this->redirect(URL_BASE . '/dinossauros');

        } catch (\Exception $e) {
            $data['erros']['nome'] = $e->getMessage();
            $data['dinossauro'] = $_POST;

            $this->view('dinossauros/dinossauros_create', $data);
        }
    }

    public function editar()
    {
        $this->adminRequired();

        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/dinossauros');
        }

        $data['dinossauro'] = $this->service->getDinossauro($_GET['id']);
        $this->view('dinossauros/dinossauros_create', $data);
    }

   public function atualizar()
{
    $this->autenticacaoRequired();
    $this->adminRequired();

    $dinossauro = new \app\models\Dinossauro();

    $dinossauro->setId($_POST['id']);
    $dinossauro->setNome($_POST['nome']);
    $dinossauro->setEspecie($_POST['especie'] ?? null);
    $dinossauro->setPeso($_POST['peso'] ?? null);
    $dinossauro->setImagem($_POST['imagem'] ?? null); // ✅ ESSA LINHA resolve

    $this->service->updateDinossauro($dinossauro);

    $this->redirect(URL_BASE . '/dinossauros');
}

    public function excluir()
    {
        $this->adminRequired();

        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/dinossauros');
        }

        $this->service->deleteDinossauro($_GET['id']);

        $this->redirect(URL_BASE . '/dinossauros');
    }
}