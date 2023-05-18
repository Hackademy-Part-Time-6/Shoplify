const darkModeButton = document.getElementById('darkModeButton');
const dayModeIcon = document.getElementById('dayModeIcon');
const nightModeIcon = document.getElementById('nightModeIcon');

let isDarkMode = false;

darkModeButton.addEventListener('click', toggleDarkMode);

function toggleDarkMode() {
  isDarkMode = !isDarkMode;
  document.body.classList.toggle('dark-mode');
  
  if (isDarkMode) {
    dayModeIcon.style.display = 'none';
    nightModeIcon.style.display = 'inline-block';
  } else {
    dayModeIcon.style.display = 'inline-block';
    nightModeIcon.style.display = 'none';
  }
}