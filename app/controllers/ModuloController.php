<?php

//TODO: - usar o validador

namespace app\controllers;

use app\core\Controller;
use app\models\Modulo;
use app\services\ModuloService;
use app\helpers\Validador;

class ModuloController extends Controller{
    private ModuloService $moduloService;

    public function __construct()
    {
        $this->moduloService = new ModuloService();
    }

    public function listarTodos(){
        $data['lista'] = $this->moduloService->getModulos();
        $this->view('modulos/modulos_list', $data);
    }

    public function listarModulo(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/modulos');
        }

        $id = $_GET['id'];
        $data['modulo'] = $this->moduloService->getModuloById($id);
        $this->view('modulos/modulos_show', $data);
    }

    public function criar(){
        $this->view('modulos/modulos_create', []);
    }

    public function salvar(){
        // Validação
        $erros = Validador::validarModulo($_POST);
        if (!empty($erros)) {
            // Redirecionar de volta ao criar com erros (implemente se necessário)
            $this->redirect(URL_BASE . '/modulos/cadastrar');
            return;
        }

        $modulo = new Modulo();
        $modulo->setNome($_POST['nome']);
        $modulo->setDescricao($_POST['descricao']);
        $modulo->setMinEstrelasLiberacao((int)$_POST['min_estrelas_liberacao']);  // Converta para int
        $modulo->setMaterialApoio($_POST['material_apoio']);

        $this->moduloService->saveModulo($modulo);
        $this->redirect(URL_BASE . '/modulos');
    }

    public function editar(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/modulos');
        }

        $id = $_GET['id'];
        $data['modulo'] = $this->moduloService->getModuloById($id);
        $this->view('modulos/modulos_edit', $data);
    }

    public function excluir(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/modulos');
        }

        $id = $_GET['id'];
        $this->moduloService->deleteModulo($id);
        $this->redirect(URL_BASE . '/modulos');
    }

    public function atualizar(){
        if (!isset($_POST['id'])) {
            $this->redirect(URL_BASE . '/modulos');
            return;
        }

        // Validação
        $erros = Validador::validarModulo($_POST);
        if (!empty($erros)) {
            // Redirecionar de volta ao editar com erros (implemente se necessário)
            $this->redirect(URL_BASE . '/modulos/editar?id=' . $_POST['id']);
            return;
        }

        $id = (int)$_POST['id'];
        $modulo = $this->moduloService->getModuloById($id);
        if (!$modulo) {
            $this->redirect(URL_BASE . '/modulos');
            return;
        }

        // Atualizar campos
        $moduloObj = new Modulo();
        $moduloObj->setId($id);
        $moduloObj->setNome($_POST['nome']);
        $moduloObj->setDescricao($_POST['descricao']);
        $moduloObj->setMinEstrelasLiberacao((int)$_POST['min_estrelas_liberacao']);
        $moduloObj->setMaterialApoio($_POST['material_apoio']);

        $this->moduloService->updateModulo($moduloObj);  // Método a ser adicionado no service
        $this->redirect(URL_BASE . '/modulos');
    }
}