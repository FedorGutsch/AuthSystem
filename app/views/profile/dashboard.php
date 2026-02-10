<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">👋 Личный кабинет</h4>
                <span class="badge bg-primary">ID: <?= $_SESSION['user_id'] ?></span>
            </div>
            
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5>Привет, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h5>
                    <p class="text-muted">Вы успешно вошли в систему</p>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6>🔧 Настройки</h6>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary" id="themeToggleBtn">
                                        <?= $_SESSION['theme'] === 'light' ? '🌙 Переключить на тёмную тему' : '☀️ Переключить на светлую тему' ?>
                                    </button>
                                    <a href="?action=logout" class="btn btn-outline-danger">
                                        🚪 Выйти из аккаунта
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>ℹ️ Информация</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Тема интерфейса:</span>
                                        <span class="badge bg-secondary"><?= $_SESSION['theme'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Дата входа:</span>
                                        <span class="text-muted"><?= date('d.m.Y H:i') ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>