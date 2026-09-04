<style>
    /* =========================================================================
       LIGNE DE DÉCOUPAGE ET CONSTRUCTEUR GLOBAL
       ========================================================================= */
    /* Ce conteneur simule la ligne de découpe avec les 0.7cm de distance */
    .cut-line-container {
        width: 232mm; /* 218mm (permis) + 7mm (gauche) + 7mm (droite) */
        height: 107mm; /* 93mm (permis) + 7mm (haut) + 7mm (bas) */
        border: 1px dashed #000; /* Ligne de découpage */
        padding: 7mm; /* Distance exacte de 0.7cm */
        box-sizing: border-box;
        margin: 0 auto;
    }

    .permit-container {
        width: 218mm; /* Longueur voulue : 21.8cm */
        height: 93mm; /* Hauteur voulue : 9.3cm */
        display: flex;
        box-sizing: border-box;
        background-color: #ffffff; /* Ajustable si impression sur papier rose */
        position: relative;
        font-family: Arial, sans-serif;
        font-size: 8.5pt;
        color: #000000;
        -webkit-print-color-adjust: exact;
        justify-content: space-between;
    }

    /* Les 3 panneaux font 72mm de large (total 216mm). Reste 2mm pour les marges/plis */
    .panel-left, .panel-center, .panel-right {
        width: 72mm;
        height: 93mm;
        border: 1px solid #000;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        background-color: transparent;
    }

    .spacer {
        width: 1mm; /* Espace minimal pour le pliage */
    }

    /* =========================================================================
       PANNEAU GAUCHE
       ========================================================================= */
    .panel-left {
        padding: 2mm;
        position: relative;
    }

    .input-group {
        margin-bottom: 1.2mm;
        font-size: 8pt;
        line-height: 1.2;
    }
    .label-text { font-weight: normal; color: #000; }

    .value-text {
        font-weight: bold;
        text-transform: uppercase;
        font-family: "Courier New", Courier, monospace;
        font-size: 10pt;
        border-bottom: 1px dotted #000000;
        padding-left: 1mm;
        display: inline-block;
    }

    .photo-signature-row {
        display: flex;
        justify-content: space-between;
        margin-top: 1mm;
        height: 36mm; /* Ajusté pour laisser respirer la photo */
        border-bottom: 1px solid #000;
        padding-bottom: 1mm;
    }

    .signature-box {
        width: 31mm;
        height: 35mm;
        font-size: 8pt;
        position: relative;
        box-sizing: border-box;
    }
    .signature-box .signature-title { display: block; margin-bottom: 1mm; }

    .photo-box {
        width: 35mm;  /* Photo voulue : 3.5cm */
        height: 35mm; /* Photo voulue : 3.5cm */
        border: 1px solid #000;
        background-color: rgba(255, 255, 255, 0.3);
        text-align: center;
        position: relative;
        box-sizing: border-box;
    }
    .photo-box .photo-img { width: 100%; height: 100%; object-fit: cover; }
    .photo-box .photo-placeholder { line-height: 35mm; color: #374151; font-size: 9pt; }

    /* Zone administrative basse */
    .bottom-administrative-zone {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5mm;
        height: 19mm;
    }
    .delivery-authority-section { width: 33mm; font-size: 7pt; line-height: 1.1; }
    .delivery-grid { margin-top: 0.5mm; }
    .delivery-row { display: flex; align-items: baseline; margin-bottom: 0.5mm; }
    .delivery-label { width: 4mm; font-weight: bold; font-size: 7pt; }
    .delivery-value { font-weight: bold; font-family: "Courier New", Courier, monospace; border-bottom: 1px dotted #000; flex-grow: 1; padding-left: 0.5mm; font-size: 9pt; }

    .stamp-authority-box { width: 34mm; text-align: center; display: flex; flex-direction: column; justify-content: flex-start; box-sizing: border-box; }
    .stamp-title-italic { font-size: 6pt; font-style: italic; margin-bottom: 0.5mm; }
    .stamp-authority-title { font-weight: bold; font-size: 6pt; line-height: 1.1; }
    .signature-director-placeholder { flex-grow: 1; min-height: 6mm; }

    .directeur-name-footer {
        width: 100%;
        text-align: center;
        font-weight: bold;
        font-size: 8pt;
        text-transform: uppercase;
        margin-top: auto;
        padding-top: 0.5mm;
        letter-spacing: 0.5px;
    }

    .mescan-security-footer { position: absolute; bottom: -3mm; left: 0; width: 67mm; display: flex; justify-content: space-between; align-items: center; font-size: 5pt; color: #1f2937; font-family: monospace; border-top: 0.5px dashed rgba(0, 0, 0, 0.3); padding-top: 0.5mm; }

    /* =========================================================================
       PANNEAU CENTRAL : TABLEAU DES CATEGORIES
       ========================================================================= */
    .center-header {
        text-align: center;
        font-weight: bold;
        font-size: 7.5pt;
        line-height: 1.2;
        padding: 1mm;
        border-bottom: 1px solid #000;
        height: 9mm;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .categories-table {
        width: 100%;
        border-collapse: collapse;
        height: 84mm; /* 93mm de hauteur totale - 9mm pour le header */
        table-layout: fixed;
    }
    .category-row {
        border-bottom: 1px solid #000;
        height: 10.5mm; /* 84mm divisé par 8 lignes = 10.5mm par ligne */
        box-sizing: border-box;
    }
    .category-row:last-child {
        border-bottom: none;
    }
    .category-letter {
        width: 9mm;
        font-weight: bold;
        font-size: 13pt;
        text-align: center;
        border-right: 1px solid #000;
        vertical-align: middle;
    }

    .category-description-container {
        padding: 0.3mm 1mm 0.3mm 1.5mm;
        font-size: 6pt;
        line-height: 1.05;
        vertical-align: top;
        position: relative;
        font-weight: bold;
        box-sizing: border-box;
    }
    .incrusted-permit-number {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 0.2mm;
        font-family: "Courier New", Courier, monospace;
        font-weight: bold;
        font-size: 7.5pt;
        color: #000;
        line-height: 1;
    }

    /* =========================================================================
       PANNEAU DROIT : VALIDITES ET TAMPONS
       ========================================================================= */
    .right-header { height: 9mm; border-bottom: 1px solid #000; display: flex; box-sizing: border-box; }
    .header-type-block { width: 50mm; border-right: 1px solid #000; display: flex; flex-direction: column; text-align: center; font-weight: bold; font-size: 6.5pt; justify-content: space-between; }
    .header-main-title { padding-top: 0.5mm; }
    .header-sub-titles { display: flex; border-top: 1px solid #000; font-size: 6pt; }
    .sub-title-item { width: 50%; padding: 0.3mm 0; }
    .sub-title-item:first-child { border-right: 1px solid #000; }

    .header-seal-title { width: 22mm; text-align: center; font-size: 6.5pt; font-weight: bold; display: flex; align-items: center; justify-content: center; line-height: 1.1; }

    .validity-row { height: 10.5mm; border-bottom: 1px solid #000; display: flex; box-sizing: border-box; }
    .validity-row:last-child { border-bottom: none; }
    .validity-dates-container { width: 50mm; border-right: 1px solid #000; display: flex; box-sizing: border-box; font-size: 6pt; font-weight: bold; }
    .temporary-column { width: 50%; border-right: 1px solid #000; padding: 0.5mm; display: flex; flex-direction: column; justify-content: space-between; color: #000000; }
    .permanent-column { width: 50%; display: flex; align-items: center; justify-content: center; position: relative; padding: 1mm; box-sizing: border-box; }
    .permanent-stamp { font-size: 13pt; font-weight: 900; color: #000; border: 1.8px solid #000; padding: 0.1mm 2.5mm; border-radius: 1px; transform: rotate(-3deg); }
    .temporary-black-box { width: 100%; height: 100%; min-height: 8mm; background-color: #000000; border-radius: 1px; }

    .seal-column { width: 22mm; display: flex; align-items: center; justify-content: center; position: relative; }
</style>

@php
    $categoriesCodes = ['A', 'A1', 'A2', 'B', 'C', 'D', 'E', 'F'];
    $alwaysTemporaryCategories = ['C', 'D', 'E'];

    $descriptions = [
        'A'  => 'Motocyclette avec sans side-car à moteur<br>De plus 125 cm³',
        'A1' => 'Vélomoteur et véhicules à moteur de cylindrée<br>50 cm³ sans excéder 125 cm³',
        'A2' => "Cyclomoteur et véhicules pourvus d'un moteur<br>dont la cylindrée ne dépasse pas 50 cm³",
        'B'  => "Véhicule de moins de 10 places et d'un poids total<br>autorisé en charge n'excédant pas 3.500 kgs",
        'C'  => "Véhicule affecté au transport des marchandises ou<br>de matériel de plus de 3.500 kgs PTAC",
        'D'  => "Véhicule affecté au transport des personnes et<br>Comportant plus de 9 places assises",
        'E'  => "Véhicules des catégories BCD ou F attelés d'une<br>remorque de plus de 750 kgs de PTAC",
        'F'  => "Véhicules de catégorie A, A1, A2, ou B<br>spécialement aménagés"
    ];

    $categoriesWithStatus = $permis->getCategoriesWithStatusAttribute();
    $obtainedCategories = array_column($categoriesWithStatus, 'code');
    $dateEmission = $permis->date_d_emission ? \Carbon\Carbon::parse($permis->date_d_emission)->format('d.m.Y') : '';
@endphp

<div class="cut-line-container">
    <div class="permit-container">

        <div class="panel-left">
            <div class="input-group"><span class="label-text">1. Nom</span> <span class="value-text" style="width: 53mm;">{{ $permis->nom }}</span></div>
            <div class="input-group"><span class="label-text">2. Prénom</span> <span class="value-text" style="width: 49mm;">{{ $permis->prenom }}</span></div>
            <div class="input-group">
                <span class="label-text">3. Date et lieu de naissance</span>
                <span class="value-text" style="width: 30mm;">{{ $permis->date_de_naissance ? \Carbon\Carbon::parse($permis->date_de_naissance)->format('d.m.Y') : '' }}</span>
            </div>
            <div class="input-group" style="margin-top: -1mm;"><span class="value-text" style="width: 63mm;">{{ $permis->lieu_de_naissance }}</span></div>
            <div class="input-group"><span class="label-text">4. Domicile</span> <span class="value-text" style="width: 49mm;">{{ $permis->domicile }}</span></div>

            <div class="photo-signature-row">
                <div class="signature-box"><span class="signature-title">Signature du Titulaire</span></div>
                <div class="photo-box">
                    @if($permis->photo_du_conducteur)
                        <img src="{{ asset('storage/'.$permis->photo_du_conducteur) }}" class="photo-img" alt="Photo">
                    @else
                        <div class="photo-placeholder">Photo</div>
                    @endif
                </div>
            </div>

            <div class="bottom-administrative-zone">
                <div class="delivery-authority-section">
                    <span>5. Délivré par Le Chef du<br>Centre d'Immatriculation</span>
                    <div class="delivery-grid">
                        <div class="delivery-row"><span class="delivery-label">A</span><span class="delivery-value">{{ $permis->centre_d_emission }}</span></div>
                        <div class="delivery-row"><span class="delivery-label">Le</span><span class="delivery-value">{{ $dateEmission }}</span></div>
                        <div class="delivery-row"><span class="delivery-label">N°</span><span class="delivery-value">{{ $permis->numero_du_permis }}</span></div>
                    </div>
                </div>

                <div class="stamp-authority-box">
                    <div class="stamp-title-italic">Signature et sceau de l'autorité</div>
                    <div class="stamp-authority-title">LE DIRECTEUR GENERAL<br>DES INFRASTRUCTURES</div>
                    <div class="signature-director-placeholder"></div>
                </div>
            </div>

            <div class="directeur-name-footer">
                {{ $permis->nom_du_directeur_general }}
            </div>

            <div class="mescan-security-footer"><span>SYSTEME NUMERIQUE MESCAN</span><span>UUID: {{ substr($permis->uuid, 0, 10) }}...</span></div>
        </div>

        <div class="spacer"></div>

        <div class="panel-center">
            <div class="center-header">CATEGORIE DE VEHICULES<br>POUR LESQUELS LE PERMIS EST VALABLE</div>
            <table class="categories-table">
                @foreach($categoriesCodes as $code)
                    <tr class="category-row">
                        <td class="category-letter">{{ $code }}</td>
                        <td class="category-description-container">
                            {!! $descriptions[$code] !!}
                            @if(in_array($code, $obtainedCategories))
                                <div class="incrusted-permit-number"><span>N° {{ $permis->numero_du_permis }}</span><span>COMORES</span></div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="spacer"></div>

        <div class="panel-right">
            <div class="right-header">
                <div class="header-type-block">
                    <div class="header-main-title">PERMIS DELIVRE A TITRE</div>
                    <div class="header-sub-titles"><div class="sub-title-item">TEMPORAIRE</div><div class="sub-title-item">PERMANENT</div></div>
                </div>
                <div class="header-seal-title">Sceau et<br>Signature de<br>l'autorité</div>
            </div>

            @foreach($categoriesCodes as $code)
                @php
                    $possede = in_array($code, $obtainedCategories);
                    $isTemporary = in_array($code, $alwaysTemporaryCategories) ?: $permis->isCategoryTemporary($code);
                    $expiration = $permis->getCategoryExpiration($code);
                @endphp
                <div class="validity-row">
                    <div class="validity-dates-container">
                        <div class="temporary-column">
                            @if($possede && $isTemporary)
                                <span>Le : {{ $dateEmission }}</span>
                                <span>Valable jusqu'au : {{ $expiration ? \Carbon\Carbon::parse($expiration)->format('d.m.Y') : '..............' }}</span>
                            @else
                                <span>Le : .................</span>
                                <span>Valable jusqu'au : ......</span>
                            @endif
                        </div>
                        <div class="permanent-column">
                            @if($possede && !$isTemporary)
                                <div class="permanent-stamp">P</div>
                            @elseif(in_array($code, $alwaysTemporaryCategories))
                                <div class="temporary-black-box"></div>
                            @endif
                        </div>
                    </div>
                    <div class="seal-column"></div>
                </div>
            @endforeach
        </div>

    </div>
</div>
