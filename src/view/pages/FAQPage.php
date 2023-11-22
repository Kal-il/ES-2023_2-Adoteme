<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/src/view/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/FAQPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://rawcdn.githack.com/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />
    <title>FAQ - Perguntas Frequentes</title>
</head>

<body>
    <header>
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php")
            ?>
    </header>
    <h1>FAQ - Perguntas Frequentes</h1>

    
        <div class="faq-container">
            <?php
            $faqs = array(
                "O que é o Adoteme?" => "O Adoteme é um site dedicado à adoção de gatos que residem na Universidade Federal do Tocantins (UFT). ",
                "Como faço para adotar um gato?" => "Para adotar um gato, você pode preencher o formulário de adoção disponível no site e aguardar contato da equipe do Adoteme.",
                "Os gatos disponíveis para adoção são da UFT?" => "Sim, os gatos disponíveis para adoção são resgatados na UFT e estão em busca de um lar amoroso.",
                "Posso adotar morando fora de Palmas?" => "Sim, o Adoteme aceita adoções de pessoas que moram fora de Palmas, desde que haja um processo de análise e organização da logística de transporte.",
                "Como sei que meu pedido de adoção foi aceito?" => "Após preencher o formulário de adoção, a equipe do Adoteme entrará em contato para informar sobre o status do seu pedido.",
                "Posso adotar sem estudar na UFT?"=> "Sim, a adoção não é restrita a estudantes da UFT. Qualquer pessoa interessada em proporcionar um lar para um gatinho pode participar do processo de adoção.",
                "Preciso pagar alguma coisa?"=> "Não é necessário efetuar pagamento para adotar um gato. O Adoteme preza pela adoção responsável e sem custos financeiros.",
                "Como é feito o cuidado dos gatos disponíveis para adoção?"=> "Os gatos disponíveis para adoção são cuidados pela equipe do Adoteme, recebendo tratamento veterinário e todo o cuidado necessário antes de serem encaminhados para adoção.",
                // Adicione mais perguntas e respostas conforme necessário
            );

            foreach ($faqs as $pergunta => $resposta) {
                echo "<div class='question' onclick='toggleAnswer(this)'>$pergunta</div>";
                echo "<div class='answer'>$resposta</div>";
            }
            ?>
        </div>
    
    <script>
        function toggleAnswer(element) {
            var answers = document.querySelectorAll('.answer');
            answers.forEach(function (answer) {
                answer.style.display = 'none';
            });

            var answer = element.nextElementSibling;
            answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>

</html>