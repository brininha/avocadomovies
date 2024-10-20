function getGeolocationAndSend(cep, numero, nome, telefone, dataInauguracao, createCinemaUrl) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(viacepData => {
            if (viacepData.erro) {
                alert('CEP inválido.');
                return;
            }

            const logradouro = viacepData.logradouro;
            const cidade = viacepData.localidade;
            const estado = viacepData.uf;
            const bairro = viacepData.bairro;

            const formattedAddress = `${logradouro}, ${numero}, ${cidade}, ${estado}, Brasil`;
            fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(formattedAddress)}&key=`)
                .then(response => response.json())
                .then(geoData => {
                    if (geoData.status === 'OK') {
                        const location = geoData.results[0].geometry.location;
                        const latitude = location.lat;
                        const longitude = location.lng;

                        sendDataToController(nome, telefone, numero, logradouro, bairro, cidade, estado, cep, latitude, longitude, dataInauguracao, createCinemaUrl);
                    } else {
                        alert("Geocodificação falhou: " + geoData.status);
                    }
                })
                .catch(error => console.error('Erro ao buscar geolocalização:', error));
        })
        .catch(error => console.error('Erro ao buscar dados do CEP:', error));
}

function sendDataToController(nome, telefone, numero, logradouro, bairro, cidade, estado, cep, latitude, longitude, dataInauguracao, createCinemaUrl) {
    fetch(createCinemaUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            nomeCinema: nome,
            telefoneCinema: telefone,
            numLogradouroCinema: numero,
            logradouroCinema: logradouro,
            bairroCinema: bairro,
            cidadeCinema: cidade,
            estadoCinema: estado,
            cepCinema: cep,
            latitudeCinema: latitude,
            longitudeCinema: longitude,
            dataInauguracao: dataInauguracao
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Cinema salvo com sucesso!');
            window.location.reload();
        } else {
            alert('Falha ao salvar o cinema.');
        }
    })
    .catch(error => console.error('Erro ao enviar os dados:', error));
}
