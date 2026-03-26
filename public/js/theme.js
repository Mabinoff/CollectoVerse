(() => {
  const root = document.documentElement;
  const btn = document.getElementById("theme-toggle");
  if (!btn) return;

  const storageKey = "theme";

  const applyTheme = (theme) => {
    root.setAttribute("data-theme", theme);
    btn.setAttribute("aria-pressed", theme === "light" ? "true" : "false");
  };

  const saved = localStorage.getItem(storageKey);
  if (saved === "light" || saved === "dark") {
    applyTheme(saved);
  } else {
    const prefersLight = window.matchMedia?.("(prefers-color-scheme: light)")?.matches;
    applyTheme(prefersLight ? "light" : "dark");
  }

  btn.addEventListener("click", () => {
    const current = root.getAttribute("data-theme") || "dark";
    const next = current === "dark" ? "light" : "dark";
    applyTheme(next);
    localStorage.setItem(storageKey, next);
  });
})();