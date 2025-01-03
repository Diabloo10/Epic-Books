document.addEventListener("DOMContentLoaded", function () {
  // Theme toggle buttons
  const lightModeBtn = document.getElementById("toggle-light");
  const darkModeBtn = document.getElementById("toggle-dark");

  // Stylesheets
  const lightModeCSS = document.getElementById("light-mode-css");
  const darkModeCSS = document.getElementById("dark-mode-css");

  // Load preferred theme on page load
  const theme = localStorage.getItem("theme");
  if (theme === "light") {
    lightModeCSS.disabled = false;
    darkModeCSS.disabled = true;
  } else {
    lightModeCSS.disabled = true;
    darkModeCSS.disabled = false;
  }

  // Function to save theme preference via AJAX
  function saveThemePreference(theme) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_theme_preference.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Theme preference saved:", xhr.responseText);
        } else {
          console.error("Error saving theme preference:", xhr.status, xhr.statusText);
        }
      }
    };
    xhr.send("theme=" + encodeURIComponent(theme));
  }

  // Light mode event
  lightModeBtn.addEventListener("click", function () {
    lightModeCSS.disabled = false;
    darkModeCSS.disabled = true;
    saveThemePreference("N"); // Save to database as 'N' (light mode)
  });

  // Dark mode event
  darkModeBtn.addEventListener("click", function () {
    lightModeCSS.disabled = true;
    darkModeCSS.disabled = false;
    saveThemePreference("Y"); // Save to database as 'Y' (dark mode)
  });
});
