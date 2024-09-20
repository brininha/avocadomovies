// Pega o modal
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
