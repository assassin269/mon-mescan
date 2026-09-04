<style>
    /* =========================================================================
       LIGNE DE DÉCOUPAGE ET CONSTRUCTEUR GLOBAL (VERSO)
       ========================================================================= */
    .cut-line-container-verso {
        width: 232mm; /* 218mm (permis) + 7mm (gauche) + 7mm (droite) */
        height: 107mm; /* 93mm (permis) + 7mm (haut) + 7mm (bas) */
        border: 1px dashed #000;
        padding: 7mm;
        box-sizing: border-box;
        margin: 0 auto;
    }

    .body-verso {
        margin: 0;
        padding: 0;
        background-color: transparent;
        -webkit-print-color-adjust: exact;
        color: #000000;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* --- BLOC GLOBAL DU PERMIS (Strictement 21.8 cm x 9.3 cm) --- */
    .body-verso .permit-container-verso {
        width: 218mm;
        height: 93mm;
        display: flex;
        box-sizing: border-box;
        background-color: #ffffff;
        position: relative;
        justify-content: space-between;
    }

    /* --- STRUCTURE DES TROIS VOLETS (7,2 cm x 9,3 cm) --- */
    .body-verso .panel-verso {
        width: 72mm;
        height: 93mm;
        border: 1px solid #000;
        box-sizing: border-box;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
    }

    /* --- SPACER : Espace minimal pour le pliage --- */
    .body-verso .permit-container-verso .spacer {
        width: 1mm;
    }

    /* =========================================================================
       VOLETS GAUCHE & CENTRAL : Police Sans-Serif
       ========================================================================= */
    .body-verso .sans-serif-panel {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
    }

    .body-verso .renewal-header {
        height: 11mm;
        border-bottom: 1px solid #000;
        display: flex;
        box-sizing: border-box;
    }

    .body-verso .header-left-title {
        width: 49mm;
        border-right: 1px solid #000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: bold;
        font-size: 7.2pt;
        line-height: 1.2;
        padding: 0.5mm;
        text-transform: uppercase;
    }

    .body-verso .header-right-seal {
        width: 22mm;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 6.2pt;
        font-weight: bold;
        line-height: 1.1;
        padding: 0.5mm;
    }

    .body-verso .renewal-row {
        height: 13.66mm;
        border-bottom: 1px solid #000;
        display: flex;
        box-sizing: border-box;
    }

    .body-verso .renewal-row:last-child {
        border-bottom: none;
    }

    .body-verso .renewal-dates-col {
        width: 49mm;
        border-right: 1px solid #000;
        padding: 1.5mm 1.5mm 1mm 1.5mm;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        font-size: 7.5pt;
        box-sizing: border-box;
    }

    .body-verso .input-line-flex {
        display: flex;
        align-items: flex-end;
        width: 100%;
        height: 4mm;
    }

    .body-verso .dotted-spacer {
        flex: 1;
        border-bottom: 1.5px dotted #000;
        margin: 0 1px;
        margin-bottom: 0.5mm;
    }

    .body-verso .text-cal {
        padding-left: 1px;
        padding-right: 1px;
        font-family: "Courier New", Courier, monospace;
        font-size: 8.5pt;
    }

    .body-verso .renewal-seal-col {
        width: 22mm;
    }

    /* --- VOLET CENTRAL --- */
    .body-verso .central-block {
        border-bottom: 1px solid #000;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .body-verso .central-block:last-child {
        border-bottom: none;
    }

    .body-verso .block-restrictive {
        height: 20.5mm;
        padding: 2mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
    }

    .body-verso .block-prolongation {
        height: 51.5mm;
        padding: 5mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
        text-align: center;
    }

    .body-verso .block-mentions {
        height: 21mm;
        padding: 2mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
    }

    .body-verso .block-title-verso {
        font-size: 8pt;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .body-verso .prolongation-title {
        font-weight: bold;
        font-size: 9.5pt;
        text-transform: uppercase;
        margin-bottom: 3mm;
        letter-spacing: 0.3px;
    }

    .body-verso .prolongation-body {
        font-size: 8.5pt;
        line-height: 1.4;
        letter-spacing: 0.1px;
    }

    .body-verso .dynamic-value-verso {
        font-size: 9pt;
        font-family: "Courier New", Courier, monospace;
        font-weight: bold;
        color: #000000;
        margin-top: 2mm;
        text-align: center;
        width: 100%;
        word-break: break-word;
    }

    /* =========================================================================
       VOLET DROIT : Couverture (Times New Roman)
       ========================================================================= */
    .body-verso .serif-panel {
        font-family: "Times New Roman", Times, serif;
    }

    .body-verso .panel-right-cover {
        padding: 5mm 2mm;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
        height: 100%;
    }

    .body-verso .cover-top {
        width: 100%;
    }

    .body-verso .cover-country {
        font-weight: bold;
        font-size: 12pt;
        letter-spacing: 0.5px;
        margin-bottom: 0.5mm;
    }

    .body-verso .cover-motto {
        font-style: italic;
        font-size: 7.5pt;
        margin-bottom: 0.5mm;
    }

    .body-verso .cover-stars {
        font-size: 7pt;
        letter-spacing: 2px;
        margin-bottom: 2.5mm;
    }

    .body-verso .cover-ministry {
        font-weight: bold;
        font-size: 9.5pt;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 1.5mm 0;
        text-transform: uppercase;
        letter-spacing: 0.2px;
    }

    /* --- AJUSTEMENT DU QR CODE MESCAN --- */
    .body-verso .cover-qrcode-absolute {
        position: absolute;
        top: 31mm;
        left: 50%;
        transform: translateX(-50%);
        width: 21mm;
        height: 21mm;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .body-verso .cover-qrcode-img {
        height: 100%;
        width: 100%;
        object-fit: contain;
        background-color: #ffffff;
        padding: 0.8mm;
        border: 1px solid #9ca3af;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .body-verso .cover-middle {
        margin-top: 31mm;
    }

    .body-verso .cover-main-title {
        font-weight: bold;
        font-size: 21pt;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .body-verso .cover-footer {
        width: 100%;
        text-align: left;
        padding-left: 2mm;
        font-weight: bold;
        font-size: 10pt;
    }
</style>

<div class="cut-line-container-verso">
    <div class="body-verso">
        <div class="permit-container-verso">

            <!-- VOLET GAUCHE -->
            <div class="panel-verso sans-serif-panel">
                <div class="renewal-header">
                    <div class="header-left-title">
                        RENOUVELLEMENTS<br>PERIODIQUES CATEGORIES C,D,E
                    </div>
                    <div class="header-right-seal">
                        Sceau et signature<br>de l'autorité
                    </div>
                </div>

                @for ($i = 0; $i < 6; $i++)
                <div class="renewal-row">
                    <div class="renewal-dates-col">
                        <div class="input-line-flex">
                            <span>Le</span><div class="dotted-spacer"></div><span class="text-cal">cal</span><div class="dotted-spacer" style="flex: 0.4;"></div>
                        </div>
                        <div class="input-line-flex">
                            <span>Valable jusqu'au</span><div class="dotted-spacer"></div>
                        </div>
                    </div>
                    <div class="renewal-seal-col"></div>
                </div>
                @endfor
            </div>

            <div class="spacer"></div>

            <!-- VOLET CENTRAL -->
            <div class="panel-verso sans-serif-panel">
                <div class="central-block block-restrictive">
                    <span class="block-title-verso">Conditions restrictives d'usage</span>
                    <div class="dynamic-value-verso">
                        {{ $permis->conditions_restrictives_d_usage }}
                    </div>
                </div>

                <div class="central-block block-prolongation">
                    <div class="prolongation-title">Prolongation des permis</div>
                    <div class="prolongation-body">
                        DES CATEGORIES : A, A1, A2, B et F<br>
                        DELIVRES A TITRE TEMPORAIRE
                    </div>
                </div>

                <div class="central-block block-mentions">
                    <span class="block-title-verso">Mentions additionnelles éventuelles</span>
                    <div class="dynamic-value-verso">
                        {{ $permis->mentions_additionnelles }}
                    </div>
                </div>
            </div>

            <div class="spacer"></div>

            <!-- VOLET DROIT (COUVERTURE) -->
            <div class="panel-verso serif-panel">

                <div class="cover-qrcode-absolute">
                    @if(isset($qrCodeImage))
                        <img src="{{ $qrCodeImage }}" class="cover-qrcode-img" alt="QR Code">
                    @else
                        <div class="cover-qrcode-img" style="display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 5pt; font-weight: bold; text-transform: uppercase; color: #000; font-family: Arial, sans-serif;">
                            <span>MeScan</span>
                            <span>QR Code</span>
                        </div>
                    @endif
                </div>

                <div class="panel-right-cover">
                    <div class="cover-top">
                        <div class="cover-country">UNION DES COMORES</div>
                        <div class="cover-motto">Unité - Solidarité - Développement</div>
                        <div class="cover-stars">*****************</div>
                        <div class="cover-ministry">Ministère de l'Équipement</div>
                    </div>

                    <div class="cover-middle">
                        <div class="cover-main-title">
                            PERMIS<br>DE CONDUIRE
                        </div>
                    </div>

                    <div class="cover-footer">
                        <span>{{ 'SERIE '.$permis->serie }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
