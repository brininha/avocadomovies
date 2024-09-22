// Pega o modal
var modalGenero = document.getElementById("modalGenero");

// Pega o botão que abre o modal
var btnGenero = document.getElementById("abrirGenero");

// Pega o elemento <span> que fecha o modal
var spanGenero = document.getElementsByClassName("fecharGenero")[0];

// Quando o usuário clicar no botão, abre o modal
btnGenero.onclick = function() {
  modalGenero.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
spanGenero.onclick = function() {
  modalGenero.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modalGenero) {
    modalGenero.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
