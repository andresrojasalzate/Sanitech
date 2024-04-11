<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/main.scss'])
    <title>justificante</title>
</head>

<body class="body-justificante">
    <div class="justificante">
        <div class="justificante-titulo">
            <h3 class="medionegrita">JUSTIFICANT D' ASSISTÈNCIA</h3>
        </div>
        <div class="justificante-subtitulo medionegrita">Dades del pacient</div>
        <div>Nom i cognoms:</div>
        <div>DNI:</div>
        <div class="justificante-subtitulo medionegrita">Data</div>
        <div>Data:</div>
        <div>Hora inici d'atenció:</div>
        <div class="justificante-subtitulo medionegrita">Centre</div>
        <div></div>
        <div>*nom del centre*</div>
        <div class="justificante-subtitulo medionegrita">Motiu</div>
        <div class="justificante-motivo">
            <div>La persona mencionada ha estat present en aquest centre pel motiu següent:</div>
            <div class="justificante-motivo-tipo">
                <div class="justificante-motivo-tipo-und">
                    <input type="checkbox" id="visita">
                    <label for="visita">Visita</label>
                </div>
                <div class="justificante-motivo-tipo-und">
                    <input type="checkbox" id="prueba">
                    <label for="prueba">Proves</label>
                </div>
                <div class="justificante-motivo-tipo-und">
                    <input type="checkbox" id="urgencia">
                    <label for="urgencia">Urgències</label>
                </div>
                <div class="justificante-motivo-tipo-und">
                    <input type="checkbox" id="cirugia">
                    <label for="cirugia">Intervenció quirúrgica ambulatòria</label>
                </div>
                <div class="justificante-motivo-tipo-und">
                    <input type="checkbox" id="hospital_dia">
                    <label for="hospital_dia">Hospital de Dia</label>
                </div>
            </div>
        </div>
        <div class="justificante-horaImpresion">Data i hora impressió justificant:</div>
    </div>
</body>
