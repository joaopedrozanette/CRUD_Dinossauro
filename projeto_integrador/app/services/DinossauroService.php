<?php 

namespace app\services;

use app\models\Dinossauro;
use app\repositories\DinossauroRepository;

class DinossauroService {

    private DinossauroRepository $repository;

    public function __construct(){
        $this->repository = new DinossauroRepository();
    }

    public function getDinossauros(){
        return $this->repository->getDinossauros();
    }

    public function getDinossauro(int $id){
        return $this->repository->getDinossauro($id);
    }

    public function saveDinossauro(Dinossauro $dinossauro){

        // VALIDAÇÃO
        if (empty($dinossauro->getNome())) {
            throw new \Exception("Nome é obrigatório");
        }

        // REGRA DE NEGÓCIO
        if ($this->repository->existePorNome($dinossauro->getNome())) {
            throw new \Exception("Já existe um dinossauro com esse nome");
        }

        return $this->repository->saveDinossauro($dinossauro);
    }
}