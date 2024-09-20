// Pega todos os botões de exclusão (com classe "abrirExclusao")
var btnsExclusao = document.getElementsByClassName("abrirExclusao");

// Itera sobre todos os botões de exclusão
for (var i = 0; i < btnsExclusao.length; i++) {
  btnsExclusao[i].addEventListener('click', function() {
    // Extrai o ID do cliente a partir do ID do botão
    var userId = this.id.replace('abrirExclusao', '');
    
    // Pega o modal específico deste usuário
    var modalExclusao = document.getElementById('modalExclusao' + userId);
    
    // Exibe o modal
    modalExclusao.style.display = "flex";
    document.body.style.overflow = "hidden";

    // Pega o elemento <span> dentro deste modal para fechar
    var spanExclusao = modalExclusao.getElementsByClassName("fecharExclusao")[0];

    // Quando o usuário clicar no <span> (x), fecha o modal
    spanExclusao.onclick = function() {
      modalExclusao.style.display = "none";
      document.body.style.overflow = "auto";
    };
  });
}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function(event) {
  var modals = document.getElementsByClassName("modal");
  for (var i = 0; i < modals.length; i++) {
    if (event.target == modals[i]) {
      modals[i].style.display = "none";
      document.body.style.overflow = "auto";
    }
  }
};
