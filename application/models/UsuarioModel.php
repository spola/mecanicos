<?php
/**
* Usuario Model. Mantiene la comunicación con la bd y tabla de usuarios
 */
class UsuarioModel extends CI_Model {
	
	/**
	* Validación contra la base de datos de un correo y contraseña
    *
    * @param string $email
    * @param string $pass
    * @return boolean
    */
    public function isValid($email, $pass) {
        //Convertir la contraseña a hash
        $password = $this->hashPass($pass);
		
		$data = $this->db
		            ->select("usuario")
		            ->from("usuarios")
		            ->where(array(
		                "password"=>$password,
		                "usuario"=>$email,
		                "habilitado"=>1
		            ))
		            ->count_all_results();
		
		return $data > 0;
	}
	
	/**
	* Convertir la contraseña a hash
    *
    * @param string $pass
    * @return boolean
    */
    private function hashPass($pass) {
		return sha1($pass);
	}
	
    /**
     * Recupera los datos del usuario a partir de su correo electrónico.
     *
     * @param string $email
     * @return Usuario
     */
	public function getByEmail($email) {
		
		$data = $this->db
		            ->select("id, usuario, nombre")
		            ->from("usuarios")
		            ->where(array(
		                "usuario"=>$email,
		                "habilitado"=>1
		            ))
		            ->get()
		            ->row();
		
		return $data;
	}
}
