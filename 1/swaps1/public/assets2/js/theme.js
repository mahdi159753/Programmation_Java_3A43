// Récupérez l'URL actuelle
var currentUrl = window.location.href;

// Vérifiez si l'URL contient déjà une chaîne de requête

  // Si l'URL ne contient pas encore de chaîne de requête, ajoutez "?theme=3" à la fin de l'URL
  window.history.replaceState({}, '', currentUrl + "?theme=3");

