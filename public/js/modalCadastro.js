// Pega o modal
var modalCadastro = document.getElementById("modalCadastro");

// Pega o botão que abre o modal
var btnCadastro = document.getElementById("abrirCadastro");

// Pega o elemento <span> que fecha o modal
var spanCadastro = document.getElementsByClassName("fecharCadastro")[0];

// Quando o usuário clicar no botão, abre o modal
btnCadastro.onclick = function() {
  modalCadastro.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
spanCadastro.onclick = function() {
  modalCadastro.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modalCadastro) {
    modalCadastro.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
