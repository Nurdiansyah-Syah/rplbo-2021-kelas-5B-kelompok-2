<?php
class PengajuansuratController extends Controller
{
    function add()
    {
        $id = 0;

        $model = new SuratmasukModel();
        $view = new SuratmasukView();

        $view->entry($model->get($id));
    }
    function save()
    {
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

        $model = new PengajuansuratModel();
        $view = new PengajuansuratView();

        $error = $model->save($id);
        if (count($error) == 0) {
            $view->index($model->getAll());
        } else {
            $view->show($error);
        }
    }

    function index()
    {
        $model = new PengajuansuratModel();
        $view = new PengajuansuratView();

        $view->index($model->getAll());
    }
}