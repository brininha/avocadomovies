function mascaraTelefone(input) {
    let v = input.value.replace(/\D/g, "");
    
    // máscara para telefone fixo
    if (v.length <= 10) {
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
        v = v.replace(/(\d{4})(\d)/, "$1-$2");
    } 
    // máscara para celular
    else {
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
        v = v.replace(/(\d{5})(\d)/, "$1-$2");
    }
    
    input.value = v;
}
