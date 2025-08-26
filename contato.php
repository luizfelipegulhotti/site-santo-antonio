

<link rel="stylesheet" href="css/contato.css">

<?php include 'includes/header.php'; ?>
<?php
session_start();

$errors = [];
$success = false;
$form_data = [
    'nome' => '',
    'email' => '',
    'telefone' => '',
    'assunto' => '',
    'mensagem' => ''
];

// Função para limpar dados
function limpar_dados($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Função para validar email
function validar_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone brasileiro
function validar_telefone($telefone) {
    $telefone = preg_replace('/\D/', '', $telefone);
    return preg_match('/^(\d{10,11})$/', $telefone);
}

// Processar formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar dados do formulário
    $form_data['nome'] = limpar_dados($_POST['nome'] ?? '');
    $form_data['email'] = limpar_dados($_POST['email'] ?? '');
    $form_data['telefone'] = limpar_dados($_POST['telefone'] ?? '');
    $form_data['assunto'] = limpar_dados($_POST['assunto'] ?? '');
    $form_data['mensagem'] = limpar_dados($_POST['mensagem'] ?? '');

    // Validações
    if (empty($form_data['nome'])) {
        $errors['nome'] = 'Nome é obrigatório';
    } elseif (strlen($form_data['nome']) < 2) {
        $errors['nome'] = 'Nome deve ter pelo menos 2 caracteres';
    }

    if (empty($form_data['email'])) {
        $errors['email'] = 'Email é obrigatório';
    } elseif (!validar_email($form_data['email'])) {
        $errors['email'] = 'Email inválido';
    }

    if (empty($form_data['telefone'])) {
        $errors['telefone'] = 'Telefone é obrigatório';
    } elseif (!validar_telefone($form_data['telefone'])) {
        $errors['telefone'] = 'Telefone deve ter 10 ou 11 dígitos';
    }

    if (empty($form_data['assunto'])) {
        $errors['assunto'] = 'Assunto é obrigatório';
    } elseif (strlen($form_data['assunto']) < 5) {
        $errors['assunto'] = 'Assunto deve ter pelo menos 5 caracteres';
    }

    if (empty($form_data['mensagem'])) {
        $errors['mensagem'] = 'Mensagem é obrigatória';
    } elseif (strlen($form_data['mensagem']) < 10) {
        $errors['mensagem'] = 'Mensagem deve ter pelo menos 10 caracteres';
    }

    // Se não há erros, processar envio
    if (empty($errors)) {
        // Aqui você pode enviar email, salvar no banco, etc.
        // Por exemplo:
        /*
        $to = "seu@email.com";
        $subject = "Contato: " . $form_data['assunto'];
        $message = "Nome: " . $form_data['nome'] . "\n";
        $message .= "Email: " . $form_data['email'] . "\n";
        $message .= "Telefone: " . $form_data['telefone'] . "\n";
        $message .= "Mensagem: " . $form_data['mensagem'];
        $headers = "From: " . $form_data['email'];
        
        if (mail($to, $subject, $message, $headers)) {
            $success = true;
        }
        */
        
        $success = true; // Simulando sucesso
        
        // Limpar dados após sucesso
        if ($success) {
            $form_data = [
                'nome' => '',
                'email' => '',
                'telefone' => '',
                'assunto' => '',
                'mensagem' => ''
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    
</head>
<body>
    <div class="container6">
        <h1 class="form-title">Entre em Contato</h1>
        <p class="form-subtitle">Preencha todos os campos abaixo para enviar sua mensagem</p>

        <?php if ($success): ?>
            <div class="success-message">
                Mensagem enviada com sucesso! Entraremos em contato em breve.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="error-summary">
                <h4>Por favor, corrija os seguintes erros:</h4>
                <ul style="margin-left: 20px;">
                    <?php foreach ($errors as $field => $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="" novalidate>
            <div class="form-group">
                <label for="nome">Nome Completo *</label>
                <input 
                    type="text" 
                    id="nome" 
                    name="nome" 
                    class="form-control <?php echo isset($errors['nome']) ? 'error' : (isset($_POST['nome']) && empty($errors['nome']) ? 'success' : ''); ?>"
                    value="<?php echo htmlspecialchars($form_data['nome']); ?>"
                    placeholder="Digite seu nome completo"
                    required
                >
                <?php if (isset($errors['nome'])): ?>
                    <div class="error-message"><?php echo $errors['nome']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control <?php echo isset($errors['email']) ? 'error' : (isset($_POST['email']) && empty($errors['email']) ? 'success' : ''); ?>"
                    value="<?php echo htmlspecialchars($form_data['email']); ?>"
                    placeholder="seu@email.com"
                    required
                >
                <?php if (isset($errors['email'])): ?>
                    <div class="error-message"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input 
                    type="tel" 
                    id="telefone" 
                    name="telefone" 
                    class="form-control <?php echo isset($errors['telefone']) ? 'error' : (isset($_POST['telefone']) && empty($errors['telefone']) ? 'success' : ''); ?>"
                    value="<?php echo htmlspecialchars($form_data['telefone']); ?>"
                    placeholder="(11) 99999-9999"
                    required
                >
                <?php if (isset($errors['telefone'])): ?>
                    <div class="error-message"><?php echo $errors['telefone']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="assunto">Assunto *</label>
                <input 
                    type="text" 
                    id="assunto" 
                    name="assunto" 
                    class="form-control <?php echo isset($errors['assunto']) ? 'error' : (isset($_POST['assunto']) && empty($errors['assunto']) ? 'success' : ''); ?>"
                    value="<?php echo htmlspecialchars($form_data['assunto']); ?>"
                    placeholder="Qual o motivo do seu contato?"
                    required
                >
                <?php if (isset($errors['assunto'])): ?>
                    <div class="error-message"><?php echo $errors['assunto']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="mensagem">Mensagem *</label>
                <textarea 
                    id="mensagem" 
                    name="mensagem" 
                    class="form-control <?php echo isset($errors['mensagem']) ? 'error' : (isset($_POST['mensagem']) && empty($errors['mensagem']) ? 'success' : ''); ?>"
                    placeholder="Digite sua mensagem aqui..."
                    required
                ><?php echo htmlspecialchars($form_data['mensagem']); ?></textarea>
                <?php if (isset($errors['mensagem'])): ?>
                    <div class="error-message"><?php echo $errors['mensagem']; ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">
                Enviar Mensagem
            </button>
        </form>
    </div>

    <script>
        // Máscara para telefone
        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                if (value.length <= 10) {
                    value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                } else {
                    value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                }
                e.target.value = value;
            }
        });

        // Remover classe de erro ao digitar
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorMessage = this.parentNode.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            });
        });

        // Validação em tempo real
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });

        function validateField(field) {
            const value = field.value.trim();
            const fieldName = field.name;
            let isValid = true;
            let errorMessage = '';

            switch(fieldName) {
                case 'nome':
                    if (value.length < 2) {
                        isValid = false;
                        errorMessage = 'Nome deve ter pelo menos 2 caracteres';
                    }
                    break;
                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Email inválido';
                    }
                    break;
                case 'telefone':
                    const phoneRegex = /\(\d{2}\) \d{4,5}-\d{4}/;
                    if (!phoneRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Telefone inválido';
                    }
                    break;
                case 'assunto':
                    if (value.length < 5) {
                        isValid = false;
                        errorMessage = 'Assunto deve ter pelo menos 5 caracteres';
                    }
                    break;
                case 'mensagem':
                    if (value.length < 10) {
                        isValid = false;
                        errorMessage = 'Mensagem deve ter pelo menos 10 caracteres';
                    }
                    break;
            }

            if (isValid) {
                field.classList.remove('error');
                field.classList.add('success');
            } else {
                field.classList.remove('success');
                field.classList.add('error');
            }
        }
    </script>
</body>
</html>

<?php include 'includes/footer.php'; ?>