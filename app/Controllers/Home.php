<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session('user')) {
			$data['temp'] = 'home';
			echo view('layout', $data);
		} else {
			echo view('signin');
		}
	}
	//--------------------------------------------------------------------

}
