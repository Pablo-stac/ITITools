// ===============================
// Configuración y referencias del tema
// ===============================
const themeToggleButton = document.getElementById('theme-toggle');
const themeStylesheetLink = document.getElementById('theme-stylesheet');

const pageThemeFiles = {
    'administrador.html': {
        light: '../CSS/Modo claro/administrador.css',
        dark: '../CSS/Modo oscuro/administrador dark.css'
    },
    'solicitante.html': {
        light: '../CSS/Modo claro/solicitante.css',
        dark: '../CSS/Modo oscuro/solicitante dark.css'
    },
    'soporte.html': {
        light: '../CSS/Modo claro/soporte.css',
        dark: '../CSS/Modo oscuro/soporte dark.css'
    }
};

// ===============================
// Utilidades de selección y aplicación del tema
// ===============================
function getCurrentPageName() {
    const path = window.location.pathname;
    const fileName = path.substring(path.lastIndexOf('/') + 1);
    return fileName || 'administrador.html';
}

function getThemeFromStorage() {
    const storedTheme = localStorage.getItem('siteTheme');
    return storedTheme === 'dark' ? 'dark' : 'light';
}

function updateThemeButton(theme) {
    if (!themeToggleButton) return;
    if (theme === 'dark') {
        themeToggleButton.textContent = '☀️';
        themeToggleButton.setAttribute('aria-label', 'Cambiar a modo claro');
    } else {
        themeToggleButton.textContent = '🌙';
        themeToggleButton.setAttribute('aria-label', 'Cambiar a modo oscuro');
    }
}

function setTheme(theme) {
    const pageName = getCurrentPageName();
    const themeFiles = pageThemeFiles[pageName];

    if (!themeFiles || !themeStylesheetLink) {
        return;
    }

    const href = themeFiles[theme] || themeFiles.light;
    themeStylesheetLink.setAttribute('href', href);
    localStorage.setItem('siteTheme', theme);
    updateThemeButton(theme);
}

function toggleTheme() {
    const currentTheme = getThemeFromStorage();
    const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
    setTheme(nextTheme);
}

// ===============================
// Inicialización del selector de tema
// ===============================
function initThemeSwitcher() {
    const initialTheme = getThemeFromStorage();
    setTheme(initialTheme);

    if (themeToggleButton) {
        themeToggleButton.addEventListener('click', toggleTheme);
    }
}

initThemeSwitcher();
