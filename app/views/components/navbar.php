<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">🔐 Auth System</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">👤 <?= htmlspecialchars($_SESSION['user_name']) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">🚪 Выйти</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">📝 Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">🔑 Вход</a>
                    </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <button class="btn btn-outline-secondary btn-sm ms-2" id="themeToggle">
                        <?= $_SESSION['theme'] === 'light' ? '🌙 Темная' : '☀️ Светлая' ?>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>