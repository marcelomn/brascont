<?php
defined('BASEPATH') OR exit('O silêncio vale ouro!');

class Banner extends MANI_Controller {
		
	public $data = array();	
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		#$this->load->view('banner');
		
		$this->data['titulo'] = 'Banner - MANI CMS';
		
		$this->parser->parse('banner', $this->data);
	}
}
/**
 * Arquivo controller Banner.php
 * Módulo: Banner 
 * Criado em 18/03/2018 15:09:53
 * -----------------------------------------------------------------
 * Marcelo Mendes Nazario - Planejamento e desenvolvimento
 */