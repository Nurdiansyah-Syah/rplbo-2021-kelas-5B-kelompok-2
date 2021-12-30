<?php
class PengajuanlegalisirController extends Controller {
    function save() {
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

        $model = new PengajuanlegalisirModel();
        $view = new PengajuanlegalisirView();

        $error = $model->save($id);
        if (count($error) == 0) {
            $view->index($model->getAll());
        } else {
            $view->show($error);
        }
    }

    function index() {
        $model = new PengajuanlegalisirModel();
        $view = new PengajuanlegalisirView();
        
        $view->index($model->getAll());
    }
}