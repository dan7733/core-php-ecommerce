<?php
class menuController extends baseController
{
    private $menuModel;
    public function __construct()
    {
        $this->loadModel('menuModel');
        $this->menuModel = new menu();
    }
    public function showCategorys()
    {
        $categorys = $this->menuModel->get_Category();
        return $this->loadView('menu.menu', [
            'categorys' => $categorys
        ]);
    }
}
?>