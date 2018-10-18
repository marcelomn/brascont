<?php
if (!defined('BASEPATH')) exit('O silêncio vale ouro!');

class Banner_model extends MY_Model {
    // Variável que define o nome da tabela
    var $table = "";
    /**
    * Método Construtor
    */
    function __construct() {
        parent::__construct();
        $this->table = "banners";
    }
	
	/**
	 * pega todos o banners do topo
	 * @param $sort string: campo para ordenação
	 * @param $order string: tipo de ordenação, asc ou desc
	 * @param $limit int: limit para consulta, é null por default
	 * @param $offset int: offset para paginação
	 */
	function get_all_topo($sort = 'banner_id', $order = 'asc', $limit = NULL, $offset = NULL) {
		$this->db->where('banner_local', 'topo');
        $this->db->order_by($sort, $order);
		
		if($limit != NULL){
			$this->db->limit($limit, $offset);
		}
		
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
	
	/**
	 * pega todos o banners ativos do topo
	 * @param $sort string: campo para ordenação
	 * @param $order string: tipo de ordenação, asc ou desc
	 * @param $limit int: limit para consulta, é null por default
	 * @param $offset int: offset para paginação
	 */
	function get_ativos_topo($sort = 'banner_id', $order = 'asc', $limit = NULL, $offset = NULL) {
		$this->db->where('banner_local', 'topo');
		$this->db->where('banner_status', 1);
        $this->db->order_by($sort, $order);
		
		if($limit != NULL){
			$this->db->limit($limit, $offset);
		}
		
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
	
	/**
	 * pega todos o banners ativos do cliente
	 * @param $sort string: campo para ordenação
	 * @param $order string: tipo de ordenação, asc ou desc
	 * @param $limit int: limit para consulta, é null por default
	 * @param $offset int: offset para paginação
	 */
	function get_ativos_cliente($sort = 'banner_id', $order = 'asc', $limit = NULL, $offset = NULL) {
		$this->db->where('banner_local', 'cliente');
		$this->db->where('banner_status', 1);
        $this->db->order_by($sort, $order);
		
		if($limit != NULL){
			$this->db->limit($limit, $offset);
		}
		
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
	
	/**
	 * pega todos o banners do cliente
	 * @param $sort string: campo para ordenação
	 * @param $order string: tipo de ordenação, asc ou desc
	 * @param $limit int: limit para consulta, é null por default
	 * @param $offset int: offset para paginação
	 */
	function get_all_cliente($sort = 'banner_id', $order = 'asc', $limit = NULL, $offset = NULL) {
		$this->db->where('banner_local', 'cliente');
        $this->db->order_by($sort, $order);

		if($limit != NULL){
			$this->db->limit($limit, $offset);
		}
		
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
}
/**
 * Arquivo model Banner_model.php
 * Módulo: Banner 
 * Criado em 18/03/2018 15:09:53
 * -----------------------------------------------------------------
 * Marcelo Mendes Nazario - Planejamento e desenvolvimento
 */