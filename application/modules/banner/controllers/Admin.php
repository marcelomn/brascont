<?php
defined('BASEPATH') OR exit('O silêncio vale ouro!');

class Admin extends MANI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data['css_pagina'] 	= '';
		$this->data['js_pagina'] 	= '';
		$this->data['js_custom'] 	= '';
		
		/**
         * Autenticação
         */
        #$this->router->fetch_class();
        $this->auth->CheckAuth($this->metodo, $this->router->fetch_method());
		
		// carrega model
		$this->load->model('banner_model');
		
		// mensagem flash
        if ($this->session->flashdata('mensagem') == TRUE){
            $this->data['mensagem'] = $this->session->flashdata('mensagem');
        }
	}

	/**
	 * principal, caso não seja chamado nenhum método
	 */
	public function index(){
		
		// css da página
		#$css = array();
		#$this->data['css_pagina'] = carrega_css($css);
		
		// js da página
		#$js = array();
		#$this->data['js_pagina'] = carrega_js($js);
		
		// js customizado da página
		#$js = array();
		#$this->data['js_custom'] = carrega_js($js);

		// título da página (cabeçalho)
		$this->data['titulo_pagina'] ='Banner - Painel de administração';
		
		// título da barra (mesma barra da migalha - breadcrumb) 
		$this->data['titulo_barra'] = 'Banner';
		
		// migalhas de navegação - breadcrumb (ex.: cadastrar, editar, listar, gerenciar, etc...) 
		$this->data['migalhas'] = array(
			array('migalha'=> 'Admin')
		);
		
		// título da área da página (vai na barra no topo do conteúdo) 
		$this->data['titulo_area'] = 'Banner';
				
		#$this->load->view('admin/banner');
		
		// parse template		
		$this->parser->parse('admin/banner', $this->data);
	}
	
	/**
	 * página de cadastro
	 */
	public function cadastrar(){
		
		// css da página
		#$css = array();
		#$this->data['css_pagina'] = carrega_css($css);
		
		// js da página
		$js = array(
			"{$this->base_assets_admin}vendor/ios7-switch/ios7-switch"
		);
		$this->data['js_pagina'] = carrega_js($js);
		
		// js customizado da página
		#$js = array();
		#$this->data['js_custom'] = carrega_js($js);

		// título da página (cabeçalho)
		$this->data['titulo_pagina'] ='Cadastrar Banner - Painel de administração';
		
		// título da barra (mesma barra da migalha - breadcrumb) 
		$this->data['titulo_barra'] = 'Banner';
		
		// migalhas de navegação - breadcrumb (ex.: cadastrar, editar, listar, gerenciar, etc...) 
		$this->data['migalhas'] = array(
			array('migalha'=> 'Banner'),
			array('migalha'=> 'Cadastrar')
		);
		
		// título da área da página (vai na barra no topo do conteúdo) 
		$this->data['titulo_area'] = 'Cadastrar Banner';
		
		// campos
		$this->data['banner_nome'] 		= '';
		$this->data['banner_link'] 		= '';
		$this->data['selected_self'] 	= '';
		$this->data['selected_blank'] 	= '';
		$this->data['imagem']	 		= '';
		$this->data['checked_status']	= ' checked';
		$this->data['acao']		 		= 'inserir';
				
		#$this->load->view('admin/banner');
		
		// parse template		
		$this->parser->parse('admin/cadastrar_editar', $this->data);
	}
	
	/**
	 * página de edição
	 * @param $id int: id do banner a ser editado
	 */
	public function editar($id=null){
		if($id != NULL && is_numeric($id)){
			// css da página
			#$css = array();
			#$this->data['css_pagina'] = carrega_css($css);
			
			// js da página
			$js = array(
				"{$this->base_assets_admin}vendor/ios7-switch/ios7-switch"
			);
			$this->data['js_pagina'] = carrega_js($js);
			
			// js customizado da página
			#$js = array();
			#$this->data['js_custom'] = carrega_js($js);
	
			// título da página (cabeçalho)
			$this->data['titulo_pagina'] ='Editar Banner - Painel de administração';
			
			// título da barra (mesma barra da migalha - breadcrumb) 
			$this->data['titulo_barra'] = 'Banner';
			
			// migalhas de navegação - breadcrumb (ex.: cadastrar, editar, listar, gerenciar, etc...) 
			$this->data['migalhas'] = array(
				array('migalha'=> 'Banner'),
				array('migalha'=> 'Editar')
			);
			
			// título da área da página (vai na barra no topo do conteúdo) 
			$this->data['titulo_area'] = 'Editar Banner';
			
			// pega dados do banner
			$get = $this->banner_model->getById('banner_id', $id);
			
			// campos
			$this->data['banner_nome'] 		= $get['banner_nome'];
			$this->data['banner_link'] 		= $get['banner_link'];
			$selected_self 	= ' selected';
			$selected_blank = '';
			if($get['banner_target'] == '_blank'){
				$selected_self 	= '';
				$selected_blank = ' selected';
			}
			$this->data['selected_self'] 	= $selected_self;
			$this->data['selected_blank'] 	= $selected_blank;
			$this->data['imagem']	 		= "<br /><img src=\"".base_url("uploads/banners/{$get['banner_imagem']}")."\" height=\"150\" />";
			$this->data['acao']		 		= "alterar/{$get['banner_id']}";
			
			$banner_status = '';
			if($get['banner_status'] == 1){
				$banner_status = ' checked';
			}
			$this->data['checked_status'] = $banner_status;
			#$size = getimagesize(base_url("uploads/banners/{$get['banner_imagem']}"));
			#printr($size);
			
			#$this->load->view('admin/banner');
		
		}
		
		// parse template		
		$this->parser->parse('admin/cadastrar_editar', $this->data);
	}

	/**
	 * ação de inserir o cadastro
	 */
	public function inserir(){
		if($_POST){

			// diretório de onde vai a imagem e as extensões aceitas
			$opcoes_upload = array(
				'diretorio'=>'banners',
				'tipo'=>'jpg|jpeg|png'
			);
			$upload = upload($opcoes_upload);

			// se foi feito upload da imagem
			if(count($upload) > 0){
				$dados = array(
					'banner_nome'=>$_POST['banner_nome'],
					'banner_link'=>$_POST['banner_link'],
					'banner_target'=>(isset($_POST['banner_target'])) ? $_POST['banner_target'] : '_self',
					'banner_imagem'=>$upload['dados_arquivo']['file_name'],
					'banner_local'=>'topo',
					'banner_status'=>(isset($_POST['banner_status']) && $_POST['banner_status'] == 1) ? $_POST['banner_status'] : '0',
					'banner_dados_imagem'=>serialize($upload),
				);
				$status = $this->banner_model->inserir($dados);
				if($status)
					redirect('admin/banner/cadastrar/');
				else
					redirect('admin/banner/cadastrar/');

			}else{
				redirect('admin/banner/cadastrar/');
			}
		}else{
			$msg = "Não conseguimos inserir o banner, tente novamente.";
			$alerta = alerta($msg, 'aviso', 'Isso é constragedor, mas...', TRUE);
			$this->session->set_flashdata('mensagem', $alerta);
			redirect('admin/banner/cadastrar/');
		}
	}
	
	/**
	 * ação de alterar o cadastro
	 * @param $id int: id do banner a ser editado
	 */
	public function alterar($id=null){
		if($_POST && $id != null){
			//printr($_FILES);
			
			// verifica se existe imagem para ser feito upload, caso tenha
			// começa fazer as ações de upload e alterações na base de dados
			if(isset($_FILES['arquivo']['tmp_name']) && !empty($_FILES['arquivo']['tmp_name'])){
				$opcoes_upload = array(
					'diretorio'=>'banners',
					'tipo'=>'jpg|jpeg|png'
				);
				$upload = upload($opcoes_upload);

				// se foi feito upload da imagem
				if(count($upload) > 0){
					$dados = array(
						'banner_nome'=>$_POST['banner_nome'],
						'banner_link'=>$_POST['banner_link'],
						'banner_target'=>(isset($_POST['banner_target'])) ? $_POST['banner_target'] : '_self',
						'banner_imagem'=>$upload['dados_arquivo']['file_name'],
						'banner_local'=>'topo',
						'banner_status'=>(isset($_POST['banner_status']) && $_POST['banner_status'] == 1) ? $_POST['banner_status'] : '0',
						'banner_dados_imagem'=>serialize($upload),
					);
					// atualiza o banner
					$r = $this->banner_model->atualizar('banner_id', $id, $dados);
					if($r){
						$get = $this->banner_model->getById('banner_id', $id);
						// verifica se a imagem existe, caso exista, exclui
						if(file_exists("./uploads/banners/{$get['banner_imagem']}")){
							unlink("./uploads/banners/{$get['banner_imagem']}");
						}
						redirect("admin/banner/logo_editar/{$id}/");
					}else{
						redirect("admin/banner/logo_editar/{$id}/");
					}
				}else{
					redirect("admin/banner/editar/{$id}/");
				}
				
			// caso não tenha imagem para upload, apenas altera as informações na base de dados, tais como nome, link, etc.
			}else{
				$dados = array(
					'banner_nome'=>$_POST['banner_nome'],
					'banner_link'=>$_POST['banner_link'],
					'banner_target'=>(isset($_POST['banner_target'])) ? $_POST['banner_target'] : '_self',
					'banner_local'=>'topo',
					'banner_status'=>(isset($_POST['banner_status']) && $_POST['banner_status'] == 1) ? $_POST['banner_status'] : '0',
				);
				$r = $this->banner_model->atualizar('banner_id', $id, $dados);
				if($r){
					$msg = "Banner atualizado com sucesso!";
					$alerta = alerta($msg, 'sucesso', 'UHULLL!!!!', TRUE);
					$this->session->set_flashdata('mensagem', $alerta);
					redirect("admin/banner/editar/{$id}/");
				}else{
					$msg = "Erro ao tentar atualizar banner!";
					$alerta = alerta($msg, 'erro', 'OPS...', TRUE);
					$this->session->set_flashdata('mensagem', $alerta);
					redirect("admin/banner/editar/{$id}/");
				}
			}

			
		}
	}
	
	public function gerenciar(){
		
		// css da página
		$css = array(
			"{$this->base_assets_admin}vendor/select2/select2",
			"{$this->base_assets_admin}vendor/jquery-datatables-bs3/assets/css/datatables",
			"{$this->base_assets_admin}vendor/pnotify/pnotify.custom"
		);
		$this->data['css_pagina'] = carrega_css($css);
		
		// js da página
		$js = array(
			"{$this->base_assets_admin}vendor/select2/select2",
			"{$this->base_assets_admin}vendor/jquery-datatables/media/js/jquery.dataTables",
			"{$this->base_assets_admin}vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min",
			"{$this->base_assets_admin}vendor/jquery-datatables-bs3/assets/js/datatables",
			"{$this->base_assets_admin}vendor/pnotify/pnotify.custom"
		);
		$this->data['js_pagina'] = carrega_js($js);
		
		// js customizado da página
		$js = array(
			"{$this->base_assets_admin}javascripts/tables/mani.datatables.default",
			"{$this->base_assets_admin}javascripts/tables/mani.datatables.row.with.details",
			"{$this->base_assets_admin}javascripts/tables/mani.datatables.tabletools",
			"{$this->base_assets_admin}javascripts/ui-elements/mani.modals"
		);
		$this->data['js_custom'] = carrega_js($js);

		// título da página (cabeçalho)
		$this->data['titulo_pagina'] ='Gerenciar Banners - Painel de administração';
		
		// título da barra (mesma barra da migalha - breadcrumb) 
		$this->data['titulo_barra'] = 'Banner';
		
		// migalhas de navegação - breadcrumb (ex.: cadastrar, editar, listar, gerenciar, etc...) 
		$this->data['migalhas'] = array(
			array('migalha'=> '<a href="'.base_url('admin/banner/gerenciar/').'">Banner</a>'),
			array('migalha'=> 'Gerenciar')
		);
		
		// título da área da página (vai na barra no topo do conteúdo) 
		$this->data['titulo_area'] = 'Gerenciar Banner';
		$get_banner = $this->banner_model->getAll_topo('banner_nome');
		if($get_banner != NULL){
			foreach ($get_banner as $k => $v) {
				$get_banner[$k]['base_url'] = base_url();
				$id 		= $get_banner[$k]['banner_id'];
				$href 		= base_url("admin/banner/excluir/{$id}/");
				$bt_editar 	= bt_acao('editar', base_url("admin/banner/editar/{$id}/"));
				$bt_excluir = bt_acao('excluir', '#modal-excluir', "data-id=\"{$id}\" data-texto=\"Você tem certeza que quer excluir o banner <b>{$get_banner[$k]['banner_nome']}</b>?\" data-href=\"{$href}\"", 'modal-sizes');

				$get_banner[$k]['botoes_acao'] = $bt_editar.$bt_excluir;
			}
		}else{
			$get_banner = array();
		}
		$this->data['banners'] = $get_banner;
		
		// parse template		
		$this->parser->parse('admin/gerenciar', $this->data);
	}

	public function excluir($id=NULL){
		if($id != NULLL){
			$get = $this->banner_model->getById('banner_id', $id);
			
			#printr($getById);
	
			if($get != FALSE){

				if(file_exists("./uploads/banners/{$get['banner_imagem']}")){
					unlink("./uploads/banners/{$get['banner_imagem']}");
				}
				$this->banner_model->excluir(array('banner_id'=>$get['banner_id']));
				
				// verifica se existe, se não existir é pq foi excluída
				$get = $this->banner_model->getById('banner_id', $id);
				if($get != FALSE){
					$msg = "Erro ao tentar excluir banner!";
					$alerta = alerta($msg, 'erro', 'OPS...', TRUE);
					$this->session->set_flashdata('mensagem', $alerta);
				}else{
					$msg = "Banner excluído com sucesso!";
					$alerta = alerta($msg, 'sucesso', 'UHULLL!!!!', TRUE);
					$this->session->set_flashdata('mensagem', $alerta);
				}
			}else{
				$msg = "Banner não existe!";
				$alerta = alerta($msg, 'aviso', 'Isso é constrangedor, mas...', TRUE);
				$this->session->set_flashdata('mensagem', $alerta);
			}
		}
		
		redirect('/admin/banner/gerenciar/');
	}

	
}
/**
 * Arquivo controller Banner.php
 * Módulo: Banner 
 * Criado em 18/03/2018 15:09:53
 * -----------------------------------------------------------------
 * Marcelo Mendes Nazario - Planejamento e desenvolvimento
 */