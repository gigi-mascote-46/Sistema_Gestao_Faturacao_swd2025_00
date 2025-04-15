<footer class="footer mt-auto py-3 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="text-uppercase">Contato</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone me-2"></i> +351 123 456 789</li>
                    <li><i class="fas fa-envelope me-2"></i> contacto@empresa.com</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> Rua Exemplo, 123, Braga</li>
                </ul>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="text-uppercase">Links Úteis</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none">Sobre Nós</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-decoration-none">Política de Privacidade</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="text-uppercase">Redes Sociais</h5>
                <div class="social-links">
                    <a href="https://www.facebook.com/" class="me-2" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/" class="me-2" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/" class="me-2" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/" class="me-2" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</footer>
