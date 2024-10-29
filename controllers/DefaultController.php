<?php

namespace App;


class DefaultController extends \Elberos\Controller
{
	/**
	 * Register controller
	 */
	function register()
	{
		$this->addRoute([
			"uri" => "{locale}/test",
			"method" => [$this, "actionTest"],
		]);
	}
	
	
	/**
	 * Action test page
	 */
	function actionTest()
	{
		$this->render("pages/test.twig");
	}
}