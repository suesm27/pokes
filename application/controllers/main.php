<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Poke');
	}

	public function index()
	{
		$poke_count = $this->Poke->show_total_poke_count_by_user_id($this->session->userdata['current_user_id']);
		$poke_history = $this->Poke->show_poke_history($this->session->userdata['current_user_id']);
		$people = $this->Poke->show_people();
		$this->load->view('home', array("poke_count" => $poke_count,
										"poke_history" => $poke_history,
										"people" => $people
										));
	}
}