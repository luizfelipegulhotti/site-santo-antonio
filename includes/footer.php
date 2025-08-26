<?php
// Configurações do footer
$current_year = date('Y');
$company_name = "Santo Antonio";
$company_slogan = "Slogan da igreja";

// Links das redes sociais
$social_links = [
    'facebook' => 'https://facebook.com/suaempresa',
    'instagram' => 'https://instagram.com/suaempresa',
    'twitter' => 'https://twitter.com/suaempresa',
    'linkedin' => 'https://linkedin.com/company/suaempresa'
];

// Links úteis
$useful_links = [
    
    'Serviços' => 'servicos.php',
    'Home' => 'home.php',
    'Contato' => 'contato.php',
    'Dizimo' => 'dizimo.php',
    'Eventos' => 'eventos.php',
    'Santos' => 'santos.php',
    'Orações' => 'oracoes.php',
    'Perguntas' => 'Perguntas.php',
];


?>

<footer class="modern-footer">
    <div class="footer-container">
        <!-- Seção principal do footer -->
        <div class="footer-main">
            <div class="footer-section company-info">
                <div class="logo-section">
                    <h3 class="company-logo"><?php echo $company_name; ?></h3>
                    <p class="company-slogan"><?php echo $company_slogan; ?></p>
                </div>
                <p class="company-description">
                    COLOCAR ALGUMA DESCRIÇÃO OU FRASE LEGAL.
                </p>
                <div class="social-links">
                    <?php foreach($social_links as $platform => $url): ?>
                        <a href="<?php echo $url; ?>" class="social-link" target="_blank" rel="noopener">
                            <i class="fab fa-<?php echo $platform; ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="footer-section">
                <h4 class="section-title">Links Úteis</h4>
                <ul class="footer-links">
                    <?php foreach($useful_links as $title => $url): ?>
                        <li><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="footer-section">
                <h4 class="section-title">Contato</h4>
                <div class="contact-info">
                    <p><i class="fas fa-envelope"></i> contato@suaempresa.com</p>
                    <p><i class="fas fa-phone"></i> (11) 9999-9999</p>
                    <p><i class="fas fa-map-marker-alt"></i> São Paulo, SP</p>
                </div>
            </div>

            <div class="footer-section newsletter">
                <h4 class="section-title">Newsletter</h4>
                <p>Receba novidades e dicas exclusivas</p>
                <form class="newsletter-form" action="/newsletter" method="POST">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Seu melhor e-mail" required>
                        <button type="submit" class="btn-subscribe">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Linha decorativa -->
        <div class="footer-divider">
            <div class="divider-line"></div>
        </div>

        <!-- Footer bottom -->
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo $current_year; ?> <?php echo $company_name; ?>. Todos os direitos reservados.</p>
            </div>
           
            <div class="made-with-love">
                <p>Feito por  Luiz Felipe Gulhotti</p>
            </div>
        </div>
    </div>

    <!-- Partículas decorativas -->
    <div class="footer-particles">
        <?php for($i = 0; $i < 20; $i++): ?>
            <div class="particle" style="
                left: <?php echo rand(0, 100); ?>%; 
                animation-delay: <?php echo rand(0, 5); ?>s;
                animation-duration: <?php echo rand(3, 8); ?>s;"></div>
        <?php endfor; ?>
    </div>
</footer>

<style>
.modern-footer {
    background-color:#271b12;
    color: #D4B06A;
    position: relative;
    overflow: hidden;
    margin-top: 70px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px 20px;
    position: relative;
    z-index: 2;
}

.footer-main {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 40px;
    margin-bottom: 40px;
}

@media (max-width: 768px) {
    .footer-main {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
    }
}

.footer-section h4.section-title {
    font-size: 1.2em;
    font-weight: 600;
    margin-bottom: 20px;
    color:#D4B06A;
    position: relative;
}

.footer-section h4.section-title::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(90deg, #ffd89b, #19547b);
    border-radius: 2px;
}

@media (max-width: 768px) {
    .footer-section h4.section-title::after {
        left: 50%;
        transform: translateX(-50%);
    }
}

.company-logo {
    font-size: 1.8em;
    font-weight: 700;
    margin-bottom: 5px;
    background: linear-gradient(45deg, #ffd89b, #19547b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.company-slogan {
    font-size: 0.9em;
    opacity: 0.8;
    margin-bottom: 15px;
    font-style: italic;
}

.company-description {
    line-height: 1.6;
    opacity: 0.9;
    margin-bottom: 25px;
}

.social-links {
    display: flex;
    gap: 15px;
}

@media (max-width: 768px) {
    .social-links {
        justify-content: center;
    }
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.1);
    color: #D4B06A;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.social-link:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color:#D4B06A;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
}

.footer-links a:hover {
    color: #ffd89b;
    padding-left: 5px;
}

.contact-info p {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    opacity: 0.9;
}

.contact-info i {
    margin-right: 10px;
    width: 20px;
    color: #ffd89b;
}

.newsletter-form {
    margin-top: 15px;
}

.input-group {
    display: flex;
    border-radius: 25px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.input-group input {
    flex: 1;
    padding: 12px 20px;
    border: none;
    background: transparent;
    color: white;
    outline: none;
}

.input-group input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.btn-subscribe {
    padding: 12px 20px;
    background: linear-gradient(45deg, #ffd89b, #19547b);
    border: none;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-subscribe:hover {
    background: linear-gradient(45deg, #19547b, #ffd89b);
    transform: scale(1.05);
}

.footer-divider {
    margin: 40px 0 30px;
}

.divider-line {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

@media (max-width: 768px) {
    .footer-bottom {
        flex-direction: column;
        text-align: center;
    }
}

.copyright p {
    opacity: 0.8;
    margin: 0;
}

.legal-links {
    display: flex;
    gap: 20px;
}

@media (max-width: 768px) {
    .legal-links {
        flex-wrap: wrap;
        justify-content: center;
    }
}

.legal-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 0.9em;
    transition: color 0.3s ease;
}

.legal-links a:hover {
    color: #ffd89b;
}

.made-with-love {
    opacity: 0.8;
}

.heart {
    color: #ff6b6b;
    animation: heartbeat 1.5s ease-in-out infinite;
}

@keyframes heartbeat {
    0% { transform: scale(1); }
    14% { transform: scale(1.2); }
    28% { transform: scale(1); }
    42% { transform: scale(1.2); }
    70% { transform: scale(1); }
}

.footer-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    animation: float infinite ease-in-out;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0; }
    50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
}
</style>

<!-- Font Awesome para os ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">