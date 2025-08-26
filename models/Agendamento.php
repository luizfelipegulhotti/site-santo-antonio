<?php
class Agendamento {
    private $conn;
    private $table_name = "agendamentos";

    private int $id;
    public Usuario $usuario;
    public Padre $padre;
    private string $tipo_atendimento;
    private DateTime $data_preferencial;
    private DateTime $horario_preferencial;
    private string $alternativa;
    private string $motivo;
    private string $urgencia;
    private string $outro_tipo;

    public function __construct(PDO $db, string $motivo, int $id, string $padre, string $tipo_atendimento,
                                DateTime $data_preferencial, DateTime $horario_preferencial,
                                string $alternativa, string $urgencia, string $outro_tipo) {
        $this->conn = $db;
        $this->motivo = $motivo;
        $this->id = $id;
        $this->tipo_atendimento = $tipo_atendimento;
        $this->data_preferencial = $data_preferencial;
        $this->horario_preferencial = $horario_preferencial;
        $this->alternativa = $alternativa;
        $this->urgencia = $urgencia;
        $this->outro_tipo = $outro_tipo;
        

    }

    public function salvar() {
        $query = "INSERT INTO " . $this->table_name . "
            (nome, telefone, email, padre, tipo_atendimento, data_preferencial,
             horario_preferencial, alternativa, motivo, urgencia, outro_tipo)
            VALUES
            (:nome, :telefone, :email, :padre, :tipo_atendimento, :data_preferencial,
             :horario_preferencial, :alternativa, :motivo, :urgencia, :outro_tipo)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->usuario);
        $stmt->bindParam(":telefone", $this->usuario);
        $stmt->bindParam(":email", $this->usuario);
        $stmt->bindParam(":padre", $this->padre);
        $stmt->bindParam(":tipo_atendimento", $this->tipo_atendimento);
        $stmt->bindParam(":data_preferencial", $this->data_preferencial);
        $stmt->bindParam(":horario_preferencial", $this->horario_preferencial);
        $stmt->bindParam(":alternativa", $this->alternativa);
        $stmt->bindParam(":motivo", $this->motivo);
        $stmt->bindParam(":urgencia", $this->urgencia);
        $stmt->bindParam(":outro_tipo", $this->outro_tipo);

        return $stmt->execute();
    }
}
