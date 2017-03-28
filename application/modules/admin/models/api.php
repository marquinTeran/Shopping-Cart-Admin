<?php
Class Api extends CI_Model
{
	 function get_options($tabla, $where, $campo)
	 {
			$sql = "SELECT * FROM $tabla $where";
			$options = "";
			$query = $this->db->query($sql);
			foreach ($query->result() as $row)
				$options .= "<option value='{$row->$campo[0]}'>{$row->$campo[1]}</option>";
			return $options;
	 }
	function insert_auditoria($data)
	{
		$this->db->insert("auditoria", $data);
	}
	
	function desactivar_user(){
			$sql = "SELECT CODIGO_USUARIO, DATEDIFF(NOW(),MAX( FECHA )) as DIAS_INACTIVOS FROM  `auditoria` WHERE  `ACCION` =  'INGRESO' GROUP BY CODIGO_USUARIO";
			$query = $this->db->query($sql);
			foreach ($query->result() as $row){
				if($row->DIAS_INACTIVOS >= 90)
					$this->db->query("UPDATE usuarios SET estado = '0' WHERE codigo_usuarios = '{$row->CODIGO_USUARIO}'");
			}
	}
	
	function actualizacion_zari($zari){
		$sql = "SELECT descripcion_actualizacion, max(fecha_actualizacion) FROM actualizacion_zari WHERE codigo_zari='$zari'";
		$encargado = "";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
			$encargado = $row->descripcion_actualizacion;
		return str_replace(' ', '_', $encargado);
	}

	function get_bienvenida(){
		$query = $this->db->get_where('pagina_inicio', array('codigo' => '1'));
		$bienvenida = null;
		foreach ($query->result() as $row){
			$bienvenida['titulo'] = $row->titulo;
			$bienvenida['mensaje'] = $row->mensaje;
		}
		return $bienvenida;
	}
	
	function get_productos_licencias(){
      $query = $this->db->query("SELECT DISTINCT `productos`.`nombre_paypal`, `tipos_de_licencias`.`nombre`, `productos_licencias`.`id_producto_licencia` FROM (`productos_licencias`) LEFT JOIN `productos` ON `productos_licencias`.`id_producto` = `productos`.`id_producto` LEFT JOIN `tipos_de_licencias` ON `tipos_de_licencias`.`id_tipo_licencia` = `productos_licencias`.`id_tipo_licencia`");
      return $query->result_array();
	}
	
	function get_inventario_por_porducto($id_producto){
	    $this->db->from("inventario_licencias");
      $this->db->select("productos.nombre_paypal");
      $this->db->select("tipos_de_licencias.nombre");
      $this->db->select("inventario_licencias.*");
      $this->db->where("inventario_licencias.id_tipo_licencia", $id_producto);
      $this->db->join("productos_licencias", "inventario_licencias.id_tipo_licencia = productos_licencias.id_producto_licencia", "LEFT");
      $this->db->join("productos", "productos_licencias.id_producto = productos.id_producto", "LEFT");
      $this->db->join("tipos_de_licencias", "tipos_de_licencias.id_tipo_licencia = productos_licencias.id_tipo_licencia", "LEFT");
      $result = $this->db->get();
      return $result->result_array();
	}
	
	
	function get_pedidos($estado){
	    $this->db->from("pedidos");
      $this->db->select("productos.nombre_paypal");
      $this->db->select("tipos_de_licencias.nombre");
      $this->db->select("pedidos.*");
      $this->db->select("pedidos.id as pedido_id");
      $this->db->select("clientes.*");
      $this->db->where("pedidos.pagado", $estado);
      $this->db->join("clientes", "clientes.id = pedidos.id_usuario");
      $this->db->join("productos_licencias", "pedidos.id_producto_licencia = productos_licencias.id_producto_licencia", "LEFT");
      $this->db->join("productos", "productos_licencias.id_producto = productos.id_producto", "LEFT");
      $this->db->join("tipos_de_licencias", "tipos_de_licencias.id_tipo_licencia = productos_licencias.id_tipo_licencia", "LEFT");
      $result = $this->db->get();
      return $result->result_array();
	}
}
?>
