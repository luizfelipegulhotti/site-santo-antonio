<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Agendamento.php';
require_once __DIR__ . '/../models/Usuario.php';

class AgendamentoController
{
    public function salvarAgendamento($dados)
    {
        $database = new Database();
        $db = $database->getConnection();

        $agendamento = new Agendamento(
            db: $db,
            motivo: $dados['motivo'],
            id: $dados['id'],
            padre: $dados['padre'],
            tipo_atendimento: $dados['tipo-atendimento'],
            data_preferencial: new DateTime($dados['data-preferencial']),
            horario_preferencial: new DateTime($dados['horario-preferencial']),
            alternativa: $dados['alternativa'],
            urgencia: $dados['urgencia'],
            outro_tipo: isset($dados['outro-tipo']) ? $dados['outro-tipo'] : null

        );
        $usuario = new Usuario(
            db: $db,
            nome: $dados['nome'],
            email: $dados['email'],
            telefone: $dados['telefone']
        );

        $padre = new Padre(
            db: $db,
            id: $dados['id'],
            nome: $dados['nome'],
            foto: null,
            especialidade: $dados['especialidade'],
            telefone: $dados['telefone']
        );


        $agendamento->usuario = $dados['nome'];
        $agendamento->usuario = $dados['telefone'];
        $agendamento->usuario = $dados['email'];

        if ($agendamento->salvar()) {
            return "✅ Agendamento realizado com sucesso!";
        } else {
            return "❌ Erro ao salvar agendamento.";
        }
    }
}
