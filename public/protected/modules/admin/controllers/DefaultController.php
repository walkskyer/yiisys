<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	
	public function actionWelcome()
	{
	    $this->render('welcome');
	}

	public function actionError()
	{
	    $error = app()->errorHandler->error;
	    if ($error) {
	        $this->render('/system/error', $error);
	    }
	}
	
	
    public function actionTest()
    {
        $this->layout = 'test';
        $this->render('/default/welcome');
    }
}