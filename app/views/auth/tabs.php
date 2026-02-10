<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="register-tab" data-bs-toggle="tab" 
                        data-bs-target="#register" type="button">
                    📝 Регистрация
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="login-tab" data-bs-toggle="tab" 
                        data-bs-target="#login" type="button">
                    🔑 Вход
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="register">
                <?php include __DIR__ . '/register.php'; ?>
            </div>
            <div class="tab-pane fade" id="login">
                <?php include __DIR__ . '/login.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
function showTab(tabName) {
    const tabTrigger = new bootstrap.Tab(document.getElementById(`${tabName}-tab`));
    tabTrigger.show();
}
</script>