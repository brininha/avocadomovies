// Pega o modal
var modalFilme = document.getElementById("modalGenero");

// Pega o botão que abre o modal
var btnFilme = document.getElementById("abrirGenero");

// Pega o elemento <span> que fecha o modal
var spanFilme = document.getElementsByClassName("fecharGenero")[0];

// Quando o usuário clicar no botão, abre o modal
btnFilme.onclick = function() {
  modalFilme.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
spanFilme.onclick = function() {
  modalFilme.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modalFilme) {
    modalFilme.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
