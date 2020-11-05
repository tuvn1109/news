<?php namespace App\Controllers;

use App\Models\UsersModel;

class Signup extends BaseController
{
	public function index()
	{
		echo view('signup');
	}


	public function submitsignup()
	{
		$model = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');


		if ($fullname && $username && $password && $email && $phone) {
			$checkUser = $model->getUserByName($username);

			if ($checkUser) {
				$JSON = [
					'stt' => false,
					'error' => 1,
				];
			} else {
				$data = [
					'fullname' => $fullname,
					'username' => $username,
					'password' => $password,
					'email' => $email,
					'phone' => $phone,
				];
				$id = $model->insert($data);

				$dataSS = [
					'id' => $id,
					'fullname' => $fullname,
					'username' => $username,
					'email' => $email,
					'phone' => $phone,
				];
				session()->set(['user' => $dataSS]);

				$JSON = [
					'stt' => true,
					'error' => 0,
				];
			}
		} else {
			$JSON = [
				'stt' => false,
				'error' => 0,
			];
		}
		echo json_encode($JSON);
	}
//--------------------------------------------------------------------
}
