<div class="card shadow">
    <div class="card-header">
        <h4 class="mb-0">📝 Регистрация</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="?action=register" autocomplete="off">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Имя *</label>
                    <input type="text" name="firstname" class="form-control" required 
                           minlength="2" maxlength="15" pattern="[а-яА-ЯёЁ\-]+"
                           placeholder="Иван" autocomplete="off">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Фамилия *</label>
                    <input type="text" name="lastname" class="form-control" required 
                           minlength="2" maxlength="15" pattern="[а-яА-ЯёЁ\-]+"
                           placeholder="Иванов-Петров" autocomplete="off">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Логин *</label>
                <input type="text" name="login" class="form-control" required 
                       minlength="6" autocomplete="off">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Пароль *</label>
                    <input type="password" name="password" class="form-control" required 
                           minlength="8" autocomplete="off"
                           placeholder="Минимум 8 символов">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Подтверждение пароля *</label>
                    <input type="password" name="password_confirm" class="form-control" 
                           required autocomplete="off">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Пол *</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" 
                               value="male" id="genderMale" required>
                        <label class="form-check-label" for="genderMale">👨 Мужской</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" 
                               value="female" id="genderFemale">
                        <label class="form-check-label" for="genderFemale">👩 Женский</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Возраст *</label>
                <select name="age" class="form-select" required>
                    <option value="">Выберите...</option>
                    <option value="yes">Мне есть 18 лет</option>
                    <option value="no">Мне нет 18 лет</option>
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="rules" class="form-check-input" 
                       id="rulesCheck" required>
                <label class="form-check-label" for="rulesCheck">
                    Я принимаю <a href="#" target="_blank">правила сайта</a> *
                </label>
            </div>

            <button type="submit" name="register" class="btn btn-primary w-100">
                📝 Зарегистрироваться
            </button>
        </form>
    </div>
</div>