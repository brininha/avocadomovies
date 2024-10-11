var btnsEditFilme = document.getElementsByClassName("abrirExclusao");

for (var i = 0; i < btnsEditFilme.length; i++) {
  btnsEditFilme[i].addEventListener('click', function() {
    var idExclusao = this.id.replace('abrirExclusao', '');

    var modalExclusao = document.getElementById('modalExclusao' + idExclusao);
    
    modalExclusao.style.display = "flex";
    document.body.style.overflow = "hidden";

    var spanExclusao = modalExclusao.getElementsByClassName("fecharExclusao")[0];

    spanExclusao.onclick = function() {
      modalExclusao.style.display = "none";
      document.body.style.overflow = "auto";
    };
  });
}

window.onclick = function(event) {
  var modals = document.getElementsByClassName("modal");
  for (var i = 0; i < modals.length; i++) {
    if (event.target == modals[i]) {
      modals[i].style.display = "none";
      document.body.style.overflow = "auto";
    }
  }
};
