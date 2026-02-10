document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle') || document.getElementById('themeToggleBtn');
    const body = document.body;
    
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            body.setAttribute('data-theme', newTheme);
            
            // Обновляем текст кнопки
            if (currentTheme === 'light') {
                themeToggle.textContent = '☀️ Переключить на светлую тему';
            } else {
                themeToggle.textContent = '🌙 Переключить на тёмную тему';
            }
            
            // Сохраняем тему в localStorage (можно использовать для сохранения между сессиями)
            localStorage.setItem('theme', newTheme);
            
            // Отправляем AJAX-запрос на сервер для сохранения темы в сессии
            fetch('?action=toggle_theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({theme: newTheme})
            }).catch(console.error);
        });
    }
    
    // Восстанавливаем тему из localStorage при загрузке
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        body.setAttribute('data-theme', savedTheme);
        const themeToggleText = document.getElementById('themeToggle') || document.getElementById('themeToggleBtn');
        if (themeToggleText) {
            themeToggleText.textContent = savedTheme === 'light' ? '🌙 Темная' : '☀️ Светлая';
        }
    }
});