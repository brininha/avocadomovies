<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
    <title>Avocado | E-mail de resposta</title>
</head>
<body>
    <img class="img-banner" src="{{ url('https://private-user-images.githubusercontent.com/105254225/345165988-79abbfc4-51c3-4505-91a2-3c29ae7b96a8.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3Mjg3ODY4NDcsIm5iZiI6MTcyODc4NjU0NywicGF0aCI6Ii8xMDUyNTQyMjUvMzQ1MTY1OTg4LTc5YWJiZmM0LTUxYzMtNDUwNS05MWEyLTNjMjlhZTdiOTZhOC5wbmc_WC1BbXotQWxnb3JpdGhtPUFXUzQtSE1BQy1TSEEyNTYmWC1BbXotQ3JlZGVudGlhbD1BS0lBVkNPRFlMU0E1M1BRSzRaQSUyRjIwMjQxMDEzJTJGdXMtZWFzdC0xJTJGczMlMkZhd3M0X3JlcXVlc3QmWC1BbXotRGF0ZT0yMDI0MTAxM1QwMjI5MDdaJlgtQW16LUV4cGlyZXM9MzAwJlgtQW16LVNpZ25hdHVyZT02YTYzNDc2NmFlMDQ4NmE0ODQ3YzhkYmVjNTU4ODYxYTFiZGMxODg4MjU5NzNiMGRkYzJkNjk0OTBiYTJhNjlkJlgtQW16LVNpZ25lZEhlYWRlcnM9aG9zdCJ9.mfnS6niWGSgDBSK5fkbeq_04e7SeQUETJ6B4fn3ir1Y') }}" style="width: 100%;
    background-color: rgb(255, 255, 255);">
    <h1 style="font-size: 2rem">Mensagem de contato</h1>
    <p style="font-size: 1.5rem">{{ $mensagem }}</p>
</body>
</html>
