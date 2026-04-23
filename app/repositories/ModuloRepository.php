<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Modulo;
use PDO;

class ModuloRepository{
    private PDO $connection;

    function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getModulos(): array{
        $stm = $this->connection->prepare("SELECT * FROM modulos");
        $stm->execute();

        $modulos = $stm->fetchAll();
        return $modulos;
    }

    public function getModuloById(int $id){
        $stm = $this->connection->prepare("SELECT * FROM modulos WHERE id_modulo = :id");
        $stm->bindValue('id', $id);
        $stm->execute();
        $modulo = $stm->fetch();
        return $modulo;
    }

    public function saveModulo(Modulo $modulo){
        $sql = "INSERT INTO modulos (nome, descricao, min_estrelas_liberacao, material_apoio) VALUES (:nome, :descricao, :min_estrelas_liberacao, :material_apoio)";
        
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':nome', $modulo->getNome());
        $stm->bindValue(':descricao', $modulo->getDescricao());
        $stm->bindValue(':min_estrelas_liberacao', $modulo->getMinEstrelasLiberacao());
        $stm->bindValue(':material_apoio', $modulo->getMaterialApoio());
        $stm->execute();
    }

    public function deleteModulo(int $id){
        $stm = $this->connection->prepare("DELETE FROM modulos WHERE id_modulo = :id");
        $stm->bindValue('id', $id);
        $stm->execute();
    }

    public function updateModulo(Modulo $modulo){
        $sql = "UPDATE modulos SET nome = :nome, descricao = :descricao, min_estrelas_liberacao = :min_estrelas_liberacao, material_apoio = :material_apoio WHERE id_modulo = :id";
        
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':nome', $modulo->getNome());
        $stm->bindValue(':descricao', $modulo->getDescricao());
        $stm->bindValue(':min_estrelas_liberacao', $modulo->getMinEstrelasLiberacao());
        $stm->bindValue(':material_apoio', $modulo->getMaterialApoio());
        $stm->bindValue(':id', $modulo->getId());
        $stm->execute();
    }

}