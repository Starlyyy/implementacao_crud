<?php 

use app\repositories\ModuloRepository;
use app\models\Modulo;

class ModuloService{
    private ModuloRepository $repository;

    public function __construct()
    {
        $this->repository = new ModuloRepository();
    }

    public function getModulos(): array{
        return $this->repository->getModulos();
    }

    public function getModuloById(int $id){
        return $this->repository->getModuloById($id);
    }

    public function saveModulo(Modulo $modulo){
        $this->repository->saveModulo($modulo);
    }
}