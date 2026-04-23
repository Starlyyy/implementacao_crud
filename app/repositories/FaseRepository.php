<?php 

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Fase;
use PDO;

class FaseRepository{
    private PDO $connection;

    function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getFases(?int $id_modulo = null): array{
        $sql = "SELECT * FROM fases";
        $params = [];
        
        if ($id_modulo !== null) {
            $sql .= " WHERE id_modulo = :id_modulo";
            $params['id_modulo'] = $id_modulo;
        }
        
        $stm = $this->connection->prepare($sql);
        $stm->execute($params);
        
        $fases = $stm->fetchAll();
        return $fases;
    } //TODO: - As fases serao listadas a partir do id_modulo

    public function getFaseById(int $id){
        $stm = $this->connection->prepare("SELECT * FROM fases WHERE id_fase = :id");
        $stm->bindValue('id', $id);
        $stm->execute();
        $fase = $stm->fetch();
        return $fase;
    }

    public function saveFase(Fase $fase){
        $sql = "INSERT INTO fases (nome, id_modulo, tipo_fase, conteudo) VALUES (:nome, :id_modulo, :tipo_fase, :conteudo)";
        
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':nome', $fase->getNome());
        $stm->bindValue(':id_modulo', $fase->getIdModulo());
        $stm->bindValue(':tipo_fase', $fase->getTipoFase());
        $stm->bindValue(':conteudo', $fase->getConteudo());
        $stm->execute();
    }

    public function deleteFase(int $id){
        $stm = $this->connection->prepare("DELETE FROM fases WHERE id_fase = :id");
        $stm->bindValue('id', $id);
        $stm->execute();
    }

    public function updateFase(Fase $fase){
        $sql = "UPDATE fases SET nome = :nome, id_modulo = :id_modulo, tipo_fase = :tipo_fase, conteudo = :conteudo WHERE id_fase = :id";
        
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':nome', $fase->getNome());
        $stm->bindValue(':id_modulo', $fase->getIdModulo());
        $stm->bindValue(':tipo_fase', $fase->getTipoFase());
        $stm->bindValue(':conteudo', $fase->getConteudo());
        $stm->bindValue(':id', $fase->getId());
        $stm->execute();
    }


}