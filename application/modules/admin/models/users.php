<?php
class Users extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('codigo_usuarios, nombre, apellido, clave, imagen, codigo_rol');
        $this->db->from('usuarios');
        $this->db->where('estado', '1');
        $this->db->where('codigo_usuarios', $username);
        $this->db->where('clave', MD5($password));
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
