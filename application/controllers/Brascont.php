<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brascont extends MANI_Controller {

	function __construct(){
    	parent::__construct();
		
		// mensagem flash
       	if ($this->session->flashdata('mensagem') == TRUE){
            $this->data['mensagem'] = $this->session->flashdata('mensagem');
        }
	}
	public function index(){
		#printr($_SESSION);
		
		// banner
		$this->load->model('banner/banner_model');
		$get_banner = $this->banner_model->getAtivos_topo('banner_id');
		foreach ($get_banner as $k => $v) {
			$get_banner[$k]['banner_active'] = '';
			if($k==0) $get_banner[$k]['banner_active'] = ' active';
			$get_banner[$k]['base_url'] = base_url();
		}
		$this->data['banners'] = $get_banner;
		
		// links úteis
		$this->load->model('linksuteis/linksuteis_model');
		$get_link = $this->linksuteis_model->getAtivos('link_titulo');
		foreach ($get_link as $k => $v) {
			$get_link[$k]['base_url'] = base_url();
			$get_link[$k]['link_titulo_limitado'] = limita_caracteres($get_link[$k]['link_titulo'], 20);
		}
		$this->data['links'] = $get_link;
		
		// logos clientes
		$this->load->model('banner/banner_model');
		$get_cliente = $this->banner_model->getAtivos_cliente('banner_id');
		foreach ($get_cliente as $k => $v) {
			$get_cliente[$k]['base_url'] = base_url();
		}
		$this->data['clientes'] = $get_cliente;
		
		/**
		 * se o cliente estiver logado
		 */
		$form_acesso = '';
		$txt_logado = '';
		if(isset($this->session->cliente_id) && !empty($this->session->cliente_id) && is_numeric($this->session->cliente_id)){
		 	$base_url = base_url();
			$form_acesso = ' style="display:none;"';
			$txt_logado = "{$this->session->cliente_nome}, selecione uma opção abaixo.<br /><br />";
			$txt_logado .= "<a href=\"{$base_url}restrito/minha-conta\" class=\"btn btn-success\">Acessar minha conta</a>&nbsp;&nbsp;";
			$txt_logado .= "<a href=\"{$base_url}restrito/sair\" class=\"btn btn-danger\">Sair</a>";
			
		}
		$this->data['form_acesso'] = $form_acesso;
		$this->data['txt_logado'] = $txt_logado;
		
		$this->parser->parse('site/home', $this->data);
	}
	
	
}
