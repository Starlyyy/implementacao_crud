<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Fase;
use app\services\FaseService;
use app\services\ModuloService;
use app\helpers\Validador;

class FaseController extends Controller {
    private FaseService $faseService;
    private ModuloService $moduloService;

    public function __construct()
    {
        $this->faseService = new FaseService();
        $this->moduloService = new ModuloService();
    }

    public function listarFases(){
        $id_modulo = isset($_GET['id_modulo']) ? (int)$_GET['id_modulo'] : null;
        $data['lista'] = $this->faseService->getFases($id_modulo);
        $data['id_modulo'] = $id_modulo;
        $this->view('fases/fases_list', $data);
    }

    public function listarFase(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/fases');
        }

        $id = $_GET['id'];
        $data['fase'] = $this->faseService->getFaseById($id);
        $this->view('fases/fases_show', $data);
    }

    public function criar(){
        $data['modulos'] = $this->moduloService->getModulos();
        $this->view('fases/fases_create', $data);
    }

    public function salvar(){
        $erros = Validador::validarFase($_POST);

        if (!empty($erros)) {
            $data['erros'] = $erros;
            $data['fase'] = $_POST;
            $data['modulos'] = $this->moduloService->getModulos();
            $this->view('fases/fases_create', $data);
            return;
        }

        $fase = new Fase();
        $fase->setNome($_POST['nome']);
        $fase->setIdModulo((int) $_POST['id_modulo']);
        $fase->setTipoFase($_POST['tipo_fase']);
        $fase->setConteudo($_POST['conteudo']);

        $this->faseService->saveFase($fase);
        $this->redirect(URL_BASE . '/fases/fases_list?id_modulo=' . (int) $_POST['id_modulo']);
    }

    public function editar(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/fases/fases_list');
        }

        $id = (int)$_GET['id'];
        $data['fase'] = $this->faseService->getFaseById($id);
        $data['modulos'] = $this->moduloService->getModulos();
        $this->view('fases/fases_edit', $data);
    }

    public function excluir(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/fases/fases_list');
        }

        $id = $_GET['id'];
        $fase = $this->faseService->getFaseById($id);
        $this->faseService->deleteFase($id);
        $this->redirect(URL_BASE . '/fases/fases_list?id_modulo=' . $fase['id_modulo']);
    }

    public function atualizar(){
        if (!isset($_POST['id'])) {
            $this->redirect(URL_BASE . '/fases/fases_list');
            return;
        }

        $erros = Validador::validarFase($_POST);

        if (!empty($erros)) {
            $id = (int)$_POST['id'];
            $data['erros'] = $erros;
            $data['fase'] = $this->faseService->getFaseById($id);
            $data['modulos'] = $this->moduloService->getModulos();
            $this->view('fases/fases_edit', $data);
            return;
        }

        $id = (int)$_POST['id'];
        $faseObj = new Fase();
        $faseObj->setId($id);
        $faseObj->setNome($_POST['nome']);
        $faseObj->setIdModulo((int) $_POST['id_modulo']);
        $faseObj->setTipoFase($_POST['tipo_fase']);
        $faseObj->setConteudo($_POST['conteudo']);

        $this->faseService->updateFase($faseObj);
        $this->redirect(URL_BASE . '/fases/fases_list?id_modulo=' . (int) $_POST['id_modulo']);
    }
}