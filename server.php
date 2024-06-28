<?php

// Verifica se o parâmetro ?number foi enviado via GET
if(isset($_GET['number'])) {
    // Obtém o número da query string
    $number = $_GET['number'];

    // Monta a URL completa com o número
    $url = "https://chazinsecreto.com/api/api-test.php?number=" . urlencode($number);

    // Faz a solicitação HTTP usando file_get_contents
    $response = file_get_contents($url);

    // Verifica se a solicitação foi bem-sucedida
    if($response !== false) {
        // Decodifica o JSON retornado pela API
        $data = json_decode($response, true);

        // Verifica se a decodificação foi bem-sucedida
        if($data !== null) {
            // Exibe os dados formatados
            echo "Número do WhatsApp: " . $data['wuid'] . "<br>";
            echo "URL da foto de perfil: " . $data['profilePictureUrl'] . "<br>";
        } else {
            // Caso ocorra um erro na decodificação do JSON
            echo "Erro ao decodificar a resposta da API.";
        }
    } else {
        // Caso ocorra algum erro na solicitação
        echo "Erro ao acessar a API.";
    }
} else {
    // Caso o parâmetro ?number não tenha sido fornecido
    echo "Parâmetro ?number não encontrado.";
}

?>
