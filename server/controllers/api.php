<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function play($name)
	{
		$data['play'] = $this->Plays_model->getPlay($name);
		$this->load->view('api_play', $data);
	}
	public function roles($name)
	{
		$data['roles'] = $this->Plays_model->getRoles($name);
		$this->load->view('api_roles', $data);
	}
	public function plays()
	{
		$data['stuff'] = "hello";
		$data['plays'] = $this->Plays_model->getPlays();
		var_dump($data);
		$this->load->view('api_plays', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */