<?php 

namespace app\services;

use app\models\Dinossauro;
use app\repositories\DinossauroRepository;

class DinossauroService {

    private DinossauroRepository $repository;

    public function __construct()
    {
        $this->repository = new DinossauroRepository();
    }

    public function getDinossauros()
    {
        return $this->repository->getDinossauros();
    }

    public function getDinossauro(int $id)
    {
        return $this->repository->getDinossauro($id);
    }

    public function saveDinossauro(Dinossauro $dinossauro)
    {
        if (empty($dinossauro->getNome())) {
            throw new \Exception("Nome é obrigatório");
        }

        if ($this->repository->existePorNome($dinossauro->getNome())) {
            throw new \Exception("Dinossauro já cadastrado");
        }

        return $this->repository->saveDinossauro($dinossauro);
    }

    public function updateDinossauro(Dinossauro $dinossauro)
    {
        if (empty($dinossauro->getNome())) {
            throw new \Exception("Nome é obrigatório");
        }

        return $this->repository->updateDinossauro($dinossauro);
    }

    public function deleteDinossauro(int $id)
    {
        return $this->repository->deleteDinossauro($id);
    }
}