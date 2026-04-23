<?php

namespace app\services;

use app\models\Fase;
use app\repositories\FaseRepository;

class FaseService
{
    private FaseRepository $repository;

    public function __construct()
    {
        $this->repository = new FaseRepository();
    }

    public function getFases(?int $id_modulo = null): array
    {
        return $this->repository->getFases($id_modulo);
    }

    public function getFaseById(int $id)
    {
        return $this->repository->getFaseById($id);
    }

    public function saveFase(Fase $fase)
    {
        $this->repository->saveFase($fase);
    }

    public function deleteFase(int $id)
    {
        $this->repository->deleteFase($id);
    }
}