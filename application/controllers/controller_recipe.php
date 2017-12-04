<?php

class Controller_Recipe extends Controller
{

    function __construct()
    {
        $this->model = new Model_Recipe();
        $this->view = new View();
    }

    function action_index($id)
    {
        $data = $this->model->get_data();
        $data2 = $this->model->get_data2();
        $idR = $id;
        $this->view->generate('recipe_view.php', 'template_view.php', $data, $data2, $idR);
    }

}