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

   public function saveDinossauro(Dinossauro $dino)
{
    if ($this->repository->existsByNome($dino->getNome())) {
        throw new \Exception("Já existe um dinossauro com esse nome");
    }

    return $this->repository->saveDinossauro($dino);
}

public function updateDinossauro(Dinossauro $dino)
{
    return $this->repository->updateDinossauro($dino);
}

public function deleteDinossauro(int $id)
{
    return $this->repository->deleteDinossauro($id);
}
}