// Pega o modal
var modalEditFilme = document.getElementById("modalFilme");

// Pega o botão que abre o modal
var btnEditFilme = document.getElementById("abrirFilme");

// Pega o elemento <span> que fecha o modal
var spanEditFilme = document.getElementsByClassName("fecharFilme")[0];

// Quando o usuário clicar no botão, abre o modal
btnEditFilme.onclick = function() {
  modalEditFilme.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
spanEditFilme.onclick = function() {
  modalEditFilme.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modalEditFilme) {
    modalEditFilme.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
