// Pega o modal
var modalLogin = document.getElementById("modalLogin");

// Pega o botão que abre o modal
var btnLogin = document.getElementById("abrirLogin");

// Pega o elemento <span> que fecha o modal
var spanLogin = document.getElementsByClassName("fecharLogin")[0];

// Quando o usuário clicar no botão, abre o modal
btnLogin.onclick = function() {
  modalLogin.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
spanLogin.onclick = function() {
  modalLogin.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modalLogin) {
    modalLogin.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
