<?php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    private int $id;
    private string $nome;
    private string $email;
    private string $telefone;

    public function __construct(PDO $db, string $nome, string $email, string $telefone) {
        $this->conn = $db;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        
    }

    // Criar novo usuário
    public function salvar() {
        $query = "INSERT INTO " . $this->table_name . "
            (nome, email, telefone)
            VALUES (:nome, :email, :senha, :telefone)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);

        return $stmt->execute();
    }

    // Buscar usuário por email (útil para login)
    public function buscarPorEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt;
    }
}
