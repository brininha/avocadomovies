function configurarModal(modalId, abrirId, fecharClass) {
    // Pega o modal
    var modal = document.getElementById(modalId);
    // Pega o botão que abre o modal
    var btn = document.getElementById(abrirId);
    // Pega o elemento <span> que fecha o modal
    var span = document.getElementsByClassName(fecharClass)[0];

    // Quando o usuário clicar no botão, abre o modal
    btn.onclick = function () {
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";
    };

    // Quando o usuário clicar no <span> (x), fecha o modal
    span.onclick = function () {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    };

    // Quando o usuário clicar fora do modal, fecha-o
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    };
}

// Configura modais de exclusão com ID dinâmico
var btnsExclusao = document.getElementsByClassName("abrirExclusao");
for (var i = 0; i < btnsExclusao.length; i++) {
    btnsExclusao[i].addEventListener("click", function () {
        var idExclusao = this.id.replace("abrirExclusao", "");
        var modalExclusao = document.getElementById(
            "modalExclusao" + idExclusao
        );

        modalExclusao.style.display = "flex";
        document.body.style.overflow = "hidden";

        var spanExclusao =
            modalExclusao.getElementsByClassName("fecharExclusao")[0];
        spanExclusao.onclick = function () {
            modalExclusao.style.display = "none";
            document.body.style.overflow = "auto";
        };
    });
}

// Configura modais de edição com ID dinâmico
var btnsEditFilme = document.getElementsByClassName("abrirEditFilme");
for (var i = 0; i < btnsEditFilme.length; i++) {
    btnsEditFilme[i].addEventListener("click", function () {
        var idEditFilme = this.id.replace("abrirEditFilme", "");
        var modalEditFilme = document.getElementById(
            "modalEditFilme" + idEditFilme
        );

        modalEditFilme.style.display = "flex";
        document.body.style.overflow = "hidden";

        var spanEditFilme =
            modalEditFilme.getElementsByClassName("fecharEditFilme")[0];
        spanEditFilme.onclick = function () {
            modalEditFilme.style.display = "none";
            document.body.style.overflow = "auto";
        };
    });
}

// Configura modais de envio de email com ID dinâmico
var btnsSendEmail = document.getElementsByClassName("abrirEmail");
for (var i = 0; i < btnsSendEmail.length; i++) {
    btnsSendEmail[i].addEventListener("click", function () {
        var idEmail = this.id.replace("abrirEmail", "");
        var modalEmail = document.getElementById(
            "modalEmail" + idEmail
        );

        modalEmail.style.display = "flex";
        document.body.style.overflow = "hidden";

        var spanEmail =
            modalEmail.getElementsByClassName("fecharEmail")[0];
        spanEmail.onclick = function () {
            modalEmail.style.display = "none";
            document.body.style.overflow = "auto";
        };
    });
}

// Modal de alerta exibido ao carregar a página
var modalAlert = document.getElementById("modalAlert");
var modalContent = document.getElementById("modalContentAlert");
var spanAlert = document.getElementsByClassName("fecharMensagem")[0];

// Exibe o modal se houver mensagem de sucesso
window.onload = function () {
    if (modalAlert) {
        modalAlert.style.display = "flex";
        document.body.style.overflow = "hidden";
    }
};

// Fechar modal de alerta
if (spanAlert != null) {
    spanAlert.onclick = function () {
        modalAlert.style.display = "none";
        document.body.style.overflow = "auto";
    };
}

// Fecha o modal ao clicar fora da área do modal
window.onclick = function (event) {
    if (event.target == modalAlert && !modalContent.contains(event.target)) {
        modalAlert.style.display = "none";
        document.body.style.overflow = "auto";
    }
};
