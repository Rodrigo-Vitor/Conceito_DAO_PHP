<?php 
class Usuario {
    private $id;
    private $nome;
    private $email;

    public function getId() {
        return $this->id;
    }
    public function setId($i) {
        $this->id = $i;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($n) {
        $name = strtolower($n);
        $this->nome = ucwords($name);
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($e) {
        $this->email = $e;
    }

}

interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}


?>


