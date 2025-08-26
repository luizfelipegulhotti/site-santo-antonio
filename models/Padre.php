<?php
class Padre
{
    private $conn;
    private $table_name = "padre";

    private int $id;
    private string $nome;
    private null $foto;
    private string $especialidade;
    private string $telefone;

    public function __construct(
        PDO $db,
        int $id,
        string $nome,
        null $foto,
        string $especialidade,
        string $telefone
    ) {
        $this->conn = $db;
    }

    // Buscar todos os padres
    public function listarTodos()
    {
        $query = "SELECT id, nome, especialidade, telefone FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um padre específico
    public function buscarPorId($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
