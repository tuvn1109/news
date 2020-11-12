<?php namespace App\Controllers;

use App\Models\UsersModel;

class Youtube extends BaseController
{
	public function index()
	{
		$client = new \Google_Client();
		$client->setApplicationName('API code samples');
		$client->setScopes([
			'https://www.googleapis.com/auth/youtube.readonly',
		]);
		$client->setDeveloperKey('AIzaSyBMpYAgPz9vtsb8iQNQTW7-BroW0w656OM');
		$service = new \Google_Service_YouTube($client);
		//$a = $this->session;
		$queryParams = [
			'id' => 'UCKOMfWmfIIkca1LFzfgQQzA'
		];

		$response = $service->channels->listChannels('snippet,contentDetails,statistics', $queryParams);
		$result = $response->getItems()[0];

		$data['data'] = $result;
		$data['temp'] = 'youtube';
		echo view('layout', $data);
	}

	public function getinfoChanel()
	{
		$link = $this->request->getPost('link');
		$client = new \Google_Client();
		$client->setApplicationName('API code samples');
		$client->setScopes([
			'https://www.googleapis.com/auth/youtube.readonly',
		]);
		$client->setDeveloperKey('AIzaSyBMpYAgPz9vtsb8iQNQTW7-BroW0w656OM');
		$service = new \Google_Service_YouTube($client);
		$arrurl = explode('/', $link);
		$id = $arrurl[4];
		if (strpos($link, '/channel/')) {
			$para = 'id';
		} elseif (strpos($link, '/user/')) {
			$para = 'forUsername';
		}

		$queryParams = [
			$para => $id
		];

		$response = $service->channels->listChannels('snippet,contentDetails,statistics', $queryParams);
		$result = $response->getItems()[0];

		$data = [
			'chanel_title' => $result['snippet']['title'],
			'chanel_description' => $result['snippet']['description'],
			'chanel_published' => $result['snippet']['publishedAt'],
			'chanel_thumbnails' => $result['snippet']['thumbnails']['default']['url'],
			'chanel_sub' => $result['snippet']['title'],
			'chanel_view' => $result['statistics']['viewCount'],
			'chanel_video' => $result['statistics']['videoCount'],
			'chanel_id' => $result['id'],
		];
		echo json_encode($data);
	}

	public function addchanel()
	{

	}

	//--------------------------------------------------------------------

}
