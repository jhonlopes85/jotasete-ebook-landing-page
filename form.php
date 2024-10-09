<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Ebook</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        /* Reset de CSS para garantir consistência */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo com uma cor de fundo suave */
        body {
            background-color: #f4f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        /* Container do formulário */
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        /* Transições de hover */
        .container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .container h1 {
            margin-bottom: 25px;
            color: #00c7c4;
            font-family: 'Helvetica', sans-serif;
            font-weight: bold;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .container img {
            width: 150px; /* Aumentando a logo */
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
        }

        /* Estilização dos campos */
        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border 0.3s ease, background-color 0.3s ease;
            background-color: #f9f9f9;
        }

        /* Animação de foco */
        input:focus, select:focus {
            border-color: #00c7c4;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 199, 196, 0.2);
        }

        /* Estilização dos botões de seleção de marketplaces */
        .marketplace-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .marketplace-button {
            flex: 1;
            margin: 0 5px;
            padding: 10px;
            background-color: #e0e0e0;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .marketplace-button.active {
            background-color: #00c7c4;
            color: white;
            transform: scale(1.05);
        }

        /* Botão de envio com animação */
        .submit-btn {
            background-color: #00c7c4;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #009b99;
        }

        /* Modal de sucesso */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 90%;
            max-width: 400px;
            animation: fadeIn 0.5s ease;
        }

        .modal-content h2 {
            color: #00c7c4;
            margin-bottom: 20px;
        }

        .modal-content p {
            font-size: 16px;
            color: #555;
        }

        .close-btn {
            background-color: #00c7c4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .close-btn:hover {
            background-color: #009b99;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
                width: 100%;
            }

            input, select {
                font-size: 14px;
                padding: 10px;
            }

            .submit-btn {
                font-size: 16px;
                padding: 12px;
            }
        }

        /* Animação de fade in para o modal */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Solicite Seu Ebook</h1>
        <form id="form" action="salvar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" required>

            <label for="segmento">Qual segmento da empresa ou qual setor que trabalha?</label>
            <input type="text" id="segmento" name="segmento" required>

            <label for="ebook">Qual ebook que você quer?</label>
            <select id="ebook" name="ebook" required>
                <option value="Ecommerce">Ecommerce</option>
                <option value="Marketplace">Marketplace</option>
            </select>

            <label>Já vende em algum marketplace?</label>
            <div class="marketplace-buttons">
                <button type="button" class="marketplace-button" onclick="toggleMarketplace(this)">Amazon</button>
                <button type="button" class="marketplace-button" onclick="toggleMarketplace(this)">Mercado Livre</button>
                <button type="button" class="marketplace-button" onclick="toggleMarketplace(this)">Magalu</button>
                <button type="button" class="marketplace-button" onclick="toggleMarketplace(this)">Shopee</button>
                <button type="button" class="marketplace-button" onclick="toggleMarketplace(this)">Outros</button>
            </div>

            <label for="email">E-mail*:</label>
            <input type="email" id="email" name="email" required>

            <label for="whatsapp">WhatsApp*:</label>
            <input type="text" id="whatsapp" name="whatsapp" required>

            <button type="submit" class="submit-btn">Enviar</button>
        </form>
    </div>

    <!-- Modal de sucesso -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <h2>Formulário Enviado!</h2>
            <p>Obrigado por solicitar o ebook. Entraremos em contato em breve.</p>
            <button class="close-btn" onclick="closeModal()">Fechar</button>
        </div>
    </div>

    <script>
        const form = document.getElementById('form');
        const successModal = document.getElementById('successModal');

        form.onsubmit = function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário
            // Coletando dados do formulário
            const formData = new FormData(form);
            const data = {
                nome: formData.get('nome'),
                sobrenome: formData.get('sobrenome'),
                segmento: formData.get('segmento'),
                ebook: formData.get('ebook'),
                marketplaces: [...document.querySelectorAll('.marketplace-button.active')].map(btn => btn.innerText),
                email: formData.get('email'),
                whatsapp: formData.get('whatsapp')
            };

            // Enviar os dados para o PHP usando fetch
            fetch('salvar.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (response.ok) {
                    successModal.style.display = 'flex'; // Mostra o modal
                    form.reset(); // Reseta o formulário ao fechar o modal
                    const buttons = document.querySelectorAll('.marketplace-button');
                    buttons.forEach(button => button.classList.remove('active')); // Reseta os botões
                } else {
                    alert('Erro ao enviar o formulário. Tente novamente.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao enviar o formulário. Tente novamente.');
            });
        }

        function toggleMarketplace(button) {
            button.classList.toggle('active');
        }

        function closeModal() {
            successModal.style.display = 'none';
        }
    </script>

</body>
</html>
