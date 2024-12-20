const burgerMenu = document.getElementById('burger-menu');
const navMenu = document.getElementById('nav-menu');

burgerMenu.addEventListener('click', () => {
  // Toggle l'affichage du menu
  navMenu.classList.toggle('show');
  // Ajouter ou enlever la classe 'active' au burger pour l'animation
  burgerMenu.classList.toggle('active');
});
