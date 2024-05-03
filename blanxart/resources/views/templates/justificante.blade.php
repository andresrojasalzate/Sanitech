<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justificante</title>
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif
        }
        .body-justificante {
            margin: 30px 50px;
        }
        .body-justificante div+ :not(div .justificante-subtitulo, div .justificante-motivo-tipo, .justificante-horaImpresion) {
            margin: 5px 0;
        }
        .body-justificante label {
            font-size: 16px;
            padding: 0 10px;
        }
        .justificante {
            display: grid;
        }
        .justificante-titulo {
            text-align: center;
            margin: 40px 0;
        }
        .justificante-subtitulo {
            border-bottom: 1px solid black;
            padding: 10px 0;
            margin: 20px 0;
            font-weight: bold;
        }
        .justificante-motivo-tipo {
            display: grid;
            margin: 40px;
            justify-content: center;
        }
        .justificante-motivo-tipo-und {
            /* display: flex; */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
        .justificante-horaImpresion {
            text-align: right;
            padding-top: 60px;
        }
    </style>
</head>

<body class="body-justificante">
    <div class="justificante">
        <div class="justificante-titulo">
            <h3 class="medionegrita">JUSTIFICANT D' ASSISTÈNCIA</h3>
        </div>
        <div class="justificante-subtitulo medionegrita">Dades del pacient</div>
        <div>Nom i cognoms: {{ auth()->user()->name }} {{ auth()->user()->lastName }}</div>
        <div>DNI: {{ auth()->user()->dni }}</div>
        <div class="justificante-subtitulo medionegrita">Data</div>
        <div>Data: {{ $cita[0]->date }}</div>
        <div>Hora inici d'atenció: {{$cita[0]->time}}</div>
        <div class="justificante-subtitulo medionegrita">Centre</div>
        <div></div>
        <div>*nom del centre*</div>
        <div class="justificante-subtitulo medionegrita">Motiu</div>
        <div class="justificante-motivo">
            <div>La persona mencionada ha estat present en aquest centre pel motiu següent:</div>
            <div class="justificante-motivo-tipo">
                @if ($cita[0]->name !== null)
                    <div class="justificante-motivo-tipo-und">
                        <input type="checkbox" id="visita" checked>
                        <label for="visita">Visita</label>
                    </div>
                    <div class="justificante-motivo-tipo-und">
                        <input type="checkbox" id="prueba">
                        <label for="prueba">Proves</label>
                    </div>
                @else
                    <div class="justificante-motivo-tipo-und">
                        <input type="checkbox" id="visita">
                        <label for="visita">Visita</label>
                    </div>
                    <div class="justificante-motivo-tipo-und">
                        <input type="checkbox" id="prueba" checked>
                        <label for="prueba">Proves</label>
                    </div>
                @endif
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
        <div class="justificante-horaImpresion">Data i hora impressió justificant: {{ now() }}</div>
    </div>
</body>