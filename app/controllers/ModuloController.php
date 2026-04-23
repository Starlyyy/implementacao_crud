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
}