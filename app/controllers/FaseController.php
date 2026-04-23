<?php 

//TODO: - usar o validador

namespace app\controllers;
use app\core\Controller;
use app\models\Fase;
use app\services\FaseService;

class FaseController extends Controller {
    private FaseService $faseService;

    public function __construct()
    {
        $this->faseService = new FaseService();
    }

    public function listarFases(){
        $id_modulo = isset($_GET['id_modulo']) ? (int)$_GET['id_modulo'] : null;
        $data['lista'] = $this->faseService->getFases($id_modulo);
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
        $this->view('fases/fases_create', []);
    }

    public function salvar(){
        $fase = new Fase();
        $fase->setNome($_POST['nome']);
        $fase->setIdModulo($_POST['id_modulo']);
        $fase->setTipoFase($_POST['tipo_fase']);
        $fase->setConteudo($_POST['conteudo']);

        $this->faseService->saveFase($fase);
        $this->redirect(URL_BASE . '/fases');
    }

    public function excluir(){
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/fases');
        }

        $id = $_GET['id'];
        $this->faseService->deleteFase($id);
        $this->redirect(URL_BASE . '/fases');
    }

}