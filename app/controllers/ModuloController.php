<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\Modulo;
use app\services\ModuloService;

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
        $modulo = new Modulo();
        $modulo->setNome($_POST['nome']);
        $modulo->setDescricao($_POST['descricao']);
        $modulo->setMinEstrelasLiberacao($_POST['min_estrelas_liberacao']);
        $modulo->setMaterialApoio($_POST['material_apoio']);

        $this->moduloService->saveModulo($modulo);
        $this->redirect(URL_BASE . '/modulos');
    }

    public function excluir(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/modulos');
        }

        $id = $_GET['id'];
        $this->moduloService->deleteModulo($id);
        $this->redirect(URL_BASE . '/modulos');
    }
}