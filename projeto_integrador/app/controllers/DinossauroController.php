<?php
namespace App\Controllers;

use App\Models\Dinossauro;
use App\Core\Auth; // Classe de autenticação do seu projeto base

class DinossauroController {

    // GET /dinossauros (Acesso Público)
    public function index() {
        $model = new Dinossauro();
        $dinossauros = $model->listarTodos();
        require '../app/Views/dinossauros/index.php';
    }

    // GET /dinossauros/ver?id=1 (Acesso Público)
    public function show($id) {
        $model = new Dinossauro();
        $dino = $model->buscarPorId($id);
        if (!$dino) die("Dinossauro não encontrado.");
        require '../app/Views/dinossauros/show.php';
    }

    // POST /dinossauros/cadastrar (Restrito a Autenticados)
    public function store() {
        Auth::check(); // Bloqueia se não estiver logado

        $nome = trim($_POST['nome'] ?? '');
        $especie = trim($_POST['especie'] ?? '');
        $periodo = $_POST['periodo'] ?? '';
        $dieta = $_POST['dieta'] ?? '';

        // VALIDAÇÕES
        if (empty($nome) || empty($especie)) {
            die("Erro: Nome e Espécie são obrigatórios.");
        }

        $model = new Dinossauro();

        // REGRA DE NEGÓCIO: Impedir duplicados
        if ($model->nomeJaExiste($nome)) {
            die("Erro: Um dinossauro com o nome '$nome' já está cadastrado.");
        }

        if ($model->salvar(['nome' => $nome, 'especie' => $especie, 'periodo' => $periodo, 'dieta' => $dieta])) {
            header('Location: /dinossauros?sucesso=cadastrado');
        }
    }

    // DELETE /dinossauros/excluir?id=1 (Restrito a Autenticados)
    public function delete($id) {
        Auth::check();
        $model = new Dinossauro();
        $model->excluir($id);
        header('Location: /dinossauros?sucesso=excluido');
    }
    
    // Obs: Métodos 'create', 'edit' e 'update' seguem a mesma lógica de proteção.
}