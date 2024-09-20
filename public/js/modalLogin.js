// Pega o modal
var modal = document.getElementById("modalContato");

// Pega o botão que abre o modal
var btn = document.getElementById("abrirContato");

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão, abre o modal
btn.onclick = function() {
  modal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Quando o usuário clicar no <span> (x), fecha o modal
span.onclick = function() {
  modal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
