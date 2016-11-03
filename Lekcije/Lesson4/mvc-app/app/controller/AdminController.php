<?php

class AdminController
{
   
    public function index()
    {
        $view = new View();
        //$view->layout('layout');
        $view->render('admin', [
            'title' => 'Prijava za admina'
        ]);
    }
    

}