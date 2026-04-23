<?php 

namespace app\services;

use app\models\Modulo;
use app\repositories\ModuloRepository;

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

    public function deleteModulo(int $id){
        $this->repository->deleteModulo($id);
    }
}