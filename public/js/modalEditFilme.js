var btnsEditFilme = document.getElementsByClassName("abrirEditFilme");

for (var i = 0; i < btnsEditFilme.length; i++) {
  btnsEditFilme[i].addEventListener('click', function() {
    var idEditFilme = this.id.replace('abrirEditFilme', '');

    var modalEditFilme = document.getElementById('modalEditFilme' + idEditFilme);
    
    modalEditFilme.style.display = "flex";
    document.body.style.overflow = "hidden";

    var spanEditFilme = modalEditFilme.getElementsByClassName("fecharEditFilme")[0];

    spanEditFilme.onclick = function() {
      modalEditFilme.style.display = "none";
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
