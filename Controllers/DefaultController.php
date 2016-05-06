<?php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->render('add', ['menu' => 'add'], 'layout');
    }
}

