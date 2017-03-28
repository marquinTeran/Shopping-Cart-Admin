<?php
Class Menus extends CI_Model
{
	 function get_menu($usuario)
	 {
			$sql = "select a.codigo_menu,b.nombre, b.url, b.icono from funciones a, menu b where a.codigo_menu=b.codigo_menu and b.tipo='M' and a.codigo_rol = (select u.codigo_rol from usuarios u where u.codigo_usuarios = '$usuario') ORDER BY b.prioridad, b.codigo_menu";
			$query = $this->db->query($sql);			
			return $query->result();
	 }

	 function get_submenu($menu, $usuario)
	 {
			$sql = "select a.codigo_menu,b.nombre, b.url, b.icono from funciones a, menu b where a.codigo_menu=b.codigo_menu and b.tipo='S' and a.codigo_rol = (select u.codigo_rol from usuarios u where u.codigo_usuarios = '$usuario')  and a.codigo_menu like '$menu%' ORDER BY b.prioridad, b.codigo_menu";
			$query = $this->db->query($sql);			
			return $query->result();
	 }
}
?>
