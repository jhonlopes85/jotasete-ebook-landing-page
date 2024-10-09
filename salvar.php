<?php
// Define o nome do arquivo JSON
$jsonFile = 'dt.json';

// Obtém os dados JSON da solicitação
$data = json_decode(file_get_contents('php://input'), true);

// Verifica se os dados são válidos
if (isset($data['nome'], $data['sobrenome'], $data['segmento'], $data['ebook'], $data['email'], $data['whatsapp'])) {
    // Cria um array para os dados a serem salvos
    $dataToSave = [
        'nome' => $data['nome'],
        'sobrenome' => $data['sobrenome'],
        'segmento' => $data['segmento'],
        'ebook' => $data['ebook'],
        'marketplaces' => $data['marketplaces'],
        'email' => $data['email'],
        'whatsapp' => $data['whatsapp'],
        'data_hora' => date('Y-m-d H:i:s')
    ];

    // Lê o conteúdo atual do arquivo JSON
    if (file_exists($jsonFile)) {
        $currentData = json_decode(file_get_contents($jsonFile), true);
        $currentData[] = $dataToSave; // Adiciona os novos dados ao array existente
    } else {
        $currentData = [$dataToSave]; // Cria um novo array se o arquivo não existir
    }

    // Salva os dados atualizados de volta no arquivo JSON
    file_put_contents($jsonFile, json_encode($currentData, JSON_PRETTY_PRINT));

    // Responde com sucesso
    http_response_code(200);
    echo json_encode(['message' => 'Dados salvos com sucesso!']);
} else {
    // Responde com erro se os dados não forem válidos
    http_response_code(400);
    echo json_encode(['message' => 'Dados inválidos!']);
}
?>
