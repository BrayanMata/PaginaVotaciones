<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloGeneral.css">
    <link rel="stylesheet" href="css/estiloVotacion.css">
    <title>Votaciones</title>
</head>
<body>
    <header>
        <h3>Torneo Academia Stem</h3>
        <a href="php/logout.php"><img src="img/logoPagina.png" alt="Logo De pagina"></a>
    </header>
    <main>
        <div>
            <h4>Votos por proyectos</h4>
            <h4>Categoria iOT</h4>
        </div>
        <div>
            <div class="contadores">
                <div class="conTexto">
                    <p>ITCJ:</p>
                    <p id="conta1">0</p>
                </div>
                <div class="conTexto">
                    <p>TEC:</p>
                    <p id="conta2">0</p>
                </div>
                <div class="conTexto">
                    <p>URN:</p>
                    <p id="conta3">0</p>
                </div>
                <div class="conTexto">
                    <p>UACJ:</p>
                    <p id="conta4">0</p>
                </div>
                <div class="conTexto">
                    <p>UACH:</p>
                    <p id="conta5">0</p>
                </div>
            </div>
            <div class="votar">
                <div>
                    <img src="img/ITCJ_LOGO.png" alt="logo">
                    <input type="button" value="Votar" id="miBtn1">
                </div>
                <div>
                    <img src="img/TEC_LOGO.png" alt="logo">
                    <input type="button" value="Votar" id="miBtn2">
                </div>
                <div>
                    <img src="img/URN_LOGO.png" alt="logo">
                    <input type="button" value="Votar" id="miBtn3">
                </div>
                <div>
                    <img src="img/UACJ_LOGO.png" alt="logo">
                    <input type="button" value="Votar" id="miBtn4">
                </div>
                <div>
                    <img src="img/UACH_LOGO.png" alt="logo">
                    <input type="button" value="Votar" id="miBtn5">
                </div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>