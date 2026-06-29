<style>
    /* Tu laisses ici tous tes styles CSS du Verso qu'on a validé ensemble */
    .permit-container-verso { ... }
    .panel-verso { ... }
    .spacer { width: 6mm; }
    .sans-serif-panel { font-family: Arial, sans-serif; font-weight: 600; }
    .renewal-header { height: 11mm; border-bottom: 1px solid #000; display: flex; }
    .header-left-title { width: 47mm; border-right: 1px solid #000; font-size: 6.2pt; font-weight: bold; text-align: center; }
    .header-right-seal { width: 21mm; font-size: 5.2pt; font-weight: bold; text-align: center; }
    .renewal-row { height: 13.8mm; border-bottom: 1px solid #000; display: flex; }
    .renewal-row:last-child { border-bottom: none; }
    .renewal-dates-col { width: 47mm; border-right: 1px solid #000; padding: 1.5mm; display: flex; flex-direction: column; justify-content: space-around; font-size: 6.5pt; }
    .input-line-flex { display: flex; align-items: flex-end; width: 100%; height: 4mm; }
    .dotted-spacer { flex: 1; border-bottom: 1.5px dotted #000; margin: 0 1px; margin-bottom: 0.5mm; }
    .text-cal { padding: 0 1px; }
    .renewal-seal-col { width: 21mm; }

    /* Zones centrales */
    .central-block { border-bottom: 1px solid #000; display: flex; flex-direction: column; align-items: center; }
    .central-block:last-child { border-bottom: none; }
    .block-restrictive { height: 21mm; padding: 2mm 1.5mm 0; justify-content: flex-start; }
    .block-prolongation { height: 50mm; padding: 3.5mm 1.5mm 0; justify-content: flex-start; text-align: center; }
    .block-mentions { height: 21mm; padding: 2mm 1.5mm 0; justify-content: flex-start; }
    .block-title-verso { font-size: 7.2pt; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 1mm; }
    .prolongation-title { font-weight: bold; font-size: 8.5pt; text-transform: uppercase; margin-bottom: 2mm; }
    .prolongation-body { font-size: 7.5pt; line-height: 1.4; }

    /* Écritures Admin */
    .dynamic-value { font-size: 7.5pt; font-weight: normal; color: #111827; text-align: center; width: 100%; line-height: 1.2; text-transform: none; }

    /* Couverture droite */
    .serif-panel { font-family: "Times New Roman", Times, serif; }
    .panel-right-cover { padding: 5mm 2mm; text-align: center; display: flex; flex-direction: column; justify-content: space-between; height: 100%; box-sizing: border-box; }
    .cover-top { width: 100%; }
    .cover-country { font-weight: bold; font-size: 11pt; margin-bottom: 0.5mm; }
    .cover-motto { font-style: italic; font-size: 6.5pt; margin-bottom: 0.5mm; }
    .cover-stars { font-size: 6pt; letter-spacing: 2px; margin-bottom: 2.5mm; }
    .cover-ministry { font-weight: bold; font-size: 8.5pt; border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 1.5mm 0; text-transform: uppercase; }
    .cover-qrcode-absolute { position: absolute; top: 29mm; left: 50%; transform: translateX(-50%); width: 19mm; height: 19mm; z-index: 10; }
    .cover-qrcode-img { height: 100%; width: 100%; object-fit: contain; background-color: #ffffff; padding: 0.5mm; border: 1px solid #000; box-sizing: border-box; }
    .cover-middle { margin-top: 6mm; }
    .cover-main-title { font-weight: bold; font-size: 19pt; line-height: 1.2; }
    .cover-footer { width: 100%; text-align: left; padding-left: 2mm; font-weight: bold; font-size: 9pt; }
</style>

<div class="permit-container-verso">

    <div class="panel-verso sans-serif-panel">
        <div class="renewal-header">
            <div class="header-left-title">RENOUVELLEMENT<br>PERIODIQUES CATEGORIES C,D,E</div>
            <div class="header-right-seal">Sceau et signature<br>de l'autorité</div>
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

    <div class="panel-verso sans-serif-panel">
        <div class="central-block block-restrictive">
            <span class="block-title-verso">Conditions restrictives d'usage</span>
            @if(!empty($permis->conditions_restrictives))
                <div class="dynamic-value">{{ $permis->conditions_restrictives }}</div>
            @endif
        </div>

        <div class="central-block block-prolongation">
            <div class="prolongation-title">Prolongation des permis</div>
            @if(!empty($permis->prolongation_texte))
                <div class="dynamic-value" style="font-weight: bold;">
                    {!! nl2br(e($permis->prolongation_texte)) !!}
                </div>
            @else
                <div class="prolongation-body">
                    DES CATEGORIES : A, A1, A2, B et F<br>
                    DELIVRES A TITRE TEMPORAIRE
                </div>
            @endif
        </div>

        <div class="central-block block-mentions">
            <span class="block-title-verso">Mentions additionnelles éventuelles</span>
            @if(!empty($permis->mentions_additionnelles))
                <div class="dynamic-value">{{ $permis->mentions_additionnelles }}</div>
            @endif
        </div>
    </div>

    <div class="spacer"></div>

    <div class="panel-verso serif-panel">
        <div class="cover-qrcode-absolute">
            @if(!empty($permis->qr_code_base64))
                <img src="data:image/png;base64,{{ $permis->qr_code_base64 }}" class="cover-qrcode-img" alt="QR Code">
            @elseif(!empty($permis->qr_code_url))
                <img src="{{ $permis->qr_code_url }}" class="cover-qrcode-img" alt="QR Code">
            @else
                <div class="cover-qrcode-img" style="display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 5pt; font-weight: bold; text-transform: uppercase; font-family: Arial, sans-serif;">
                    <span>MeScan</span><span>QR Code</span>
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
                <div class="cover-main-title">PERMIS<br>DE CONDUIRE</div>
            </div>
            <div class="cover-footer">
                <span>SERIE A</span>
            </div>
        </div>
    </div>

</div>
