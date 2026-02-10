<div class="card shadow">
    <div class="card-header">
        <h4 class="mb-0">🔑 Вход в аккаунт</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="?action=login" autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Логин *</label>
                <input type="text" name="login" class="form-control" required 
                       autocomplete="off" placeholder="Введите логин">
            </div>

            <div class="mb-3">
                <label class="form-label">Пароль *</label>
                <input type="password" name="password" class="form-control" required 
                       autocomplete="off" placeholder="Введите пароль">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Запомнить меня</label>
            </div>

            <button type="submit" name="login" class="btn btn-success w-100">
                🔐 Войти
            </button>
        </form>
    </div>
    
    <div class="card-footer text-center">
        <small class="text-muted">
            Нет аккаунта? <a href="#" onclick="showTab('register')">Зарегистрируйтесь</a>
        </small>
    </div>
</div>