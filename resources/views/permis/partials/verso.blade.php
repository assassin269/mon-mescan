<style>
    /* ============================================================
       CONTENEUR VERSO - Dimensions exactes 231mm x 106mm
       ============================================================ */
    .permit-container-verso {
        width: 231mm;
        height: 106mm;
        display: flex;
        box-sizing: border-box;
        background-color: #ffffff;
        padding: 5mm 4mm 5mm 6mm;
        position: relative;
        border: 1px solid #000;
    }

    .panel-verso {
        width: 69mm;
        height: 96mm;
        border: 1px solid #000;
        box-sizing: border-box;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
    }

    .spacer {
        width: 6mm;
    }

    .sans-serif-panel {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
    }

    .renewal-header {
        height: 10mm;
        border-bottom: 1px solid #000;
        display: flex;
        box-sizing: border-box;
    }

    .header-left-title {
        width: 47mm;
        border-right: 1px solid #000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: bold;
        font-size: 6.5pt;
        line-height: 1.2;
        padding: 0.5mm;
        text-transform: uppercase;
    }

    .header-right-seal {
        width: 21mm;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 5.5pt;
        font-weight: bold;
        line-height: 1.1;
        padding: 0.5mm;
    }

    .renewal-row {
        height: 12.4mm;
        border-bottom: 1px solid #000;
        display: flex;
        box-sizing: border-box;
    }

    .renewal-row:last-child {
        border-bottom: none;
    }

    .renewal-dates-col {
        width: 47mm;
        border-right: 1px solid #000;
        padding: 1mm 1.5mm 0.5mm 1.5mm;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        font-size: 6.5pt;
        box-sizing: border-box;
    }

    .input-line-flex {
        display: flex;
        align-items: flex-end;
        width: 100%;
        height: 3.5mm;
    }

    .dotted-spacer {
        flex: 1;
        border-bottom: 1.5px dotted #000;
        margin: 0 1px;
        margin-bottom: 0.5mm;
    }

    .text-cal {
        padding-left: 1px;
        padding-right: 1px;
    }

    .renewal-seal-col {
        width: 21mm;
    }

    .central-block {
        border-bottom: 1px solid #000;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .central-block:last-child {
        border-bottom: none;
    }

    .block-restrictive {
        height: 19mm;
        padding: 2mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
    }

    .block-prolongation {
        height: 46mm;
        padding: 3.5mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
        text-align: center;
    }

    .block-mentions {
        height: 19mm;
        padding: 2mm 1.5mm 0 1.5mm;
        justify-content: flex-start;
    }

    .block-title-verso {
        font-size: 7.5pt;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        font-weight: bold;
    }

    .prolongation-title {
        font-weight: bold;
        font-size: 8.5pt;
        text-transform: uppercase;
        margin-bottom: 1.5mm;
        letter-spacing: 0.3px;
    }

    .prolongation-body {
        font-size: 7.5pt;
        line-height: 1.4;
        letter-spacing: 0.1px;
    }

    .dynamic-value-verso {
        font-size: 7pt;
        font-weight: normal;
        color: #000000;
        margin-top: 1mm;
        text-align: center;
        width: 100%;
        word-break: break-word;
    }

    .serif-panel {
        font-family: "Times New Roman", Times, serif;
    }

    .panel-right-cover {
        padding: 5mm 2mm;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
        height: 100%;
    }

    .cover-top {
        width: 100%;
    }

    .cover-country {
        font-weight: bold;
        font-size: 11pt;
        letter-spacing: 0.5px;
        margin-bottom: 0.5mm;
    }

    .cover-motto {
        font-style: italic;
        font-size: 6.5pt;
        margin-bottom: 0.5mm;
    }

    .cover-stars {
        font-size: 6pt;
        letter-spacing: 2px;
        margin-bottom: 2mm;
    }

    .cover-ministry {
        font-weight: bold;
        font-size: 8.5pt;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 1.5mm 0;
        text-transform: uppercase;
        letter-spacing: 0.2px;
    }

    .cover-qrcode-absolute {
        position: absolute;
        top: 28mm;
        left: 50%;
        transform: translateX(-50%);
        width: 18mm;
        height: 18mm;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .cover-qrcode-img {
        height: 100%;
        width: 100%;
        object-fit: contain;
        background-color: #ffffff;
        padding: 0.5mm;
        border: 1px solid #000;
        box-sizing: border-box;
    }

    .cover-middle {
        margin-top: 5mm;
    }

    .cover-main-title {
        font-weight: bold;
        font-size: 19pt;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .cover-footer {
        width: 100%;
        text-align: left;
        padding-left: 2mm;
        font-weight: bold;
        font-size: 9pt;
    }
</style>

<div class="permit-container-verso">

    <div class="panel-verso sans-serif-panel">
        <div class="renewal-header">
            <div class="header-left-title">
                RENOUVELLEMENT<br>PERIODIQUES CATEGORIES C,D,E
            </div>
            <div class="header-right-seal">
                Sceau et signature<br>de l'autorité
            </div>
        </div>

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
    </div>

    <div class="spacer"></div>

    <div class="panel-verso sans-serif-panel">
        <div class="central-block block-restrictive">
            <span class="block-title-verso">Conditions restrictives d'usage</span>
            <div class="dynamic-value-verso">
                {{ $permis->conditions_restrictives_d_usage ?? 'NEANT' }}
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
                {{ $permis->mentions_additionnelles ?? 'NEANT' }}
            </div>
        </div>
    </div>

    <div class="spacer"></div>

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
                <span>{{ $permis->serie ?? 'SERIE A' }}</span>
            </div>
        </div>

    </div>

</div>
