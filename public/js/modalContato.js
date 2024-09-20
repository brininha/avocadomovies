var modalContato = document.getElementById("modalContato");

var btnContato = document.getElementById("abrirContato");

var spanContato = document.getElementsByClassName("fecharContato")[0];

btnContato.onclick = function() {
  modalContato.style.display = "flex";
  document.body.style.overflow = "hidden";
}

spanContato.onclick = function() {
  modalContato.style.display = "none";
  document.body.style.overflow = "auto";
}

window.onclick = function(event) {
  if (event.target == modalContato) {
    modalContato.style.display = "none";
    document.body.style.overflow = "auto";
  }
}
