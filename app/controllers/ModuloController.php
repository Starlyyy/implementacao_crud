<?php

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
        $erros = Validador::validarModulo($_POST);
        
        if (!empty($erros)) {
            $data['erros'] = $erros;
            $data['modulo'] = $_POST;
            $this->view('modulos/modulos_create', $data);
            return;
        }

        $modulo = new Modulo();
        $modulo->setNome($_POST['nome']);
        $modulo->setDescricao($_POST['descricao']);
        $modulo->setMinEstrelasLiberacao((int)$_POST['min_estrelas_liberacao']);
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

        $erros = Validador::validarModulo($_POST);
        
        if (!empty($erros)) {
            $id = (int)$_POST['id'];
            $data['erros'] = $erros;
            $data['modulo'] = $this->moduloService->getModuloById($id);
            $this->view('modulos/modulos_edit', $data);
            return;
        }

        $id = (int)$_POST['id'];
        $moduloObj = new Modulo();
        $moduloObj->setId($id);
        $moduloObj->setNome($_POST['nome']);
        $moduloObj->setDescricao($_POST['descricao']);
        $moduloObj->setMinEstrelasLiberacao((int)$_POST['min_estrelas_liberacao']);
        $moduloObj->setMaterialApoio($_POST['material_apoio']);

        $this->moduloService->updateModulo($moduloObj);
        $this->redirect(URL_BASE . '/modulos');
    }
}