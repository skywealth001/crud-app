class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || 'light';
        this.init();
    }

    init() {
        this.applyTheme();
        this.createToggle();
    }

    applyTheme() {
        document.documentElement.setAttribute('data-theme', this.theme);
    }

    createToggle() {
        const navLinks = document.querySelector('.nav-links');
        if (!navLinks) return;

        const toggle = document.createElement('button');
        toggle.className = 'theme-toggle';
        toggle.innerHTML = this.theme === 'dark' ? '☀️' : '🌙';
        toggle.title = 'Toggle theme';
        
        toggle.addEventListener('click', () => {
            this.theme = this.theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', this.theme);
            this.applyTheme();
            toggle.innerHTML = this.theme === 'dark' ? '☀️' : '🌙';
        });

        navLinks.appendChild(toggle);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ThemeManager();
});