<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeScan : Modernisation du Permis Comorien</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 7.5pt;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            -webkit-print-color-adjust: exact;
            color: #111827;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* --- BLOC GLOBAL DU PERMIS (Strictement 23,1 cm x 10,6 cm) --- */
        .permit-container {
            width: 231mm;
            height: 106mm;
            display: flex;
            box-sizing: border-box;
            background-color: #ffffff; /* Couleur rose du carton */
            padding-top: 6mm;
            padding-bottom: 6mm;
            padding-left: 6mm;
            position: relative;
        }

        /* --- VOLET GAUCHE : Grand cadre unique (6,9 cm x 9,4 cm) --- */
        .panel-left {
            width: 69mm;
            height: 94mm;
            border: 1px solid #000; /* Le grand carré unique demandé */
            box-sizing: border-box;
            padding: 2mm;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .input-group {
            margin-bottom: 2mm;
            font-size: 7.5pt;
            line-height: 1.2;
        }

        .label-text {
            font-weight: normal;
            color: #000;
        }

        .value-text {
            font-weight: bold;
            text-transform: uppercase;
            font-family: "Courier New", Courier, monospace;
            font-size: 8.5pt;
            border-bottom: 1px dotted #374151;
            padding-left: 1mm;
            display: inline-block;
        }

        /* Ligne contenant la signature du titulaire à gauche et la photo à droite */
        .photo-signature-row {
            display: flex;
            justify-content: space-between;
            margin-top: 1mm;
            height: 28mm;
            border-bottom: 1px solid #000; /* Ligne de séparation sous la photo selon l'image */
            padding-bottom: 2mm;
        }

        .signature-box {
            width: 35mm;
            height: 26mm;
            font-size: 7pt;
            position: relative;
            box-sizing: border-box;
        }

        .signature-box .signature-title {
            display: block;
            margin-bottom: 1mm;
        }

        .signature-box .signature-img {
            position: absolute;
            bottom: 1mm;
            left: 0;
            width: 100%;
            max-height: 18mm;
            object-fit: contain;
        }

        .photo-box {
            width: 26mm;
            height: 26mm; /* Devient carrée pour s'aligner parfaitement */
            border: 1px solid #000;
            background-color: rgba(255, 255, 255, 0.3);
            text-align: center;
            position: relative;
            box-sizing: border-box;
        }

        .photo-box .photo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-box .photo-placeholder {
            line-height: 26mm;
            color: #374151;
            font-size: 8pt;
        }

        /* Section du bas : Délivrance à gauche, Signature Directeur à droite */
        .bottom-administrative-zone {
            display: flex;
            justify-content: space-between;
            margin-top: 2mm;
            flex-grow: 1;
        }

        .delivery-authority-section {
            width: 34mm;
            font-size: 6.8pt;
            line-height: 1.2;
        }

        .delivery-grid {
            margin-top: 1mm;
        }

        .delivery-row {
            display: flex;
            align-items: baseline;
            margin-bottom: 1mm;
        }

        .delivery-label {
            width: 5mm;
        }

        .delivery-value {
            font-weight: bold;
            font-family: "Courier New", Courier, monospace;
            border-bottom: 1px dotted #000;
            flex-grow: 1;
            padding-left: 0.5mm;
            font-size: 7.5pt;
        }

        /* Bloc Directeur de l'image (aligné à droite) */
        .stamp-authority-box {
            width: 30mm;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            box-sizing: border-box;
        }

        .stamp-title-italic {
            font-size: 6pt;
            font-style: italic;
            margin-bottom: 1mm;
        }

        .stamp-authority-title {
            font-weight: bold;
            font-size: 5.8pt;
            line-height: 1.1;
        }

        /* Espace blanc préservé pour sa signature physique ou électronique */
        .stamp-signature-container {
            margin-top: auto;
            height: 12mm;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signature-directeur-img {
            max-height: 12mm;
            max-width: 100%;
            object-fit: contain;
        }

        .mescan-security-footer {
            position: absolute;
            bottom: -4mm;
            left: 0;
            width: 65mm;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 5pt;
            color: #1f2937;
            font-family: monospace;
            border-top: 0.5px dashed rgba(0, 0, 0, 0.3);
            padding-top: 0.5mm;
        }

        /* --- ESPACE STRICT ENTRE LES TABLEAUX (0,6 cm) --- */
        .spacer {
            width: 6mm;
        }

        /* --- VOLET CENTRAL : Liste fixe des catégories (6,9 cm x 9,4 cm) --- */
        .panel-center {
            width: 69mm;
            height: 94mm;
            border: 1px solid #000;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
        }

        .center-header {
            text-align: center;
            font-weight: bold;
            font-size: 6.5pt;
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
            flex-grow: 1;
        }

        .category-row {
            border-bottom: 1px solid #000;
            height: 10.625mm;
        }

        .category-row:last-child {
            border-bottom: none;
        }

        .category-letter {
            width: 8mm;
            font-weight: bold;
            font-size: 11pt;
            text-align: center;
            border-right: 1px solid #000;
            vertical-align: middle;
        }

        .category-description-container {
            padding: 0.5mm 1.5mm;
            font-size: 5.8pt;
            line-height: 1.1;
            vertical-align: top;
            position: relative;
        }

        .incrusted-permit-number {
            display: block;
            margin-top: 0.5mm;
            font-family: "Courier New", Courier, monospace;
            font-weight: bold;
            font-size: 7.5pt;
            color: #000;
        }

        /* --- VOLET DROIT : Droits de conduite et Sceaux (6,9 cm x 9,4 cm) --- */
        .panel-right {
            width: 69mm;
            height: 94mm;
            border: 1px solid #000;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
        }

        .right-header {
            height: 9mm;
            border-bottom: 1px solid #000;
            display: flex;
            box-sizing: border-box;
        }

        .header-type-block {
            width: 47mm;
            border-right: 1px solid #000;
            display: flex;
            flex-direction: column;
            text-align: center;
            font-weight: bold;
            font-size: 6pt;
            justify-content: space-between;
        }

        .header-main-title {
            padding-top: 0.5mm;
        }

        .header-sub-titles {
            display: flex;
            border-top: 1px solid #000;
            font-size: 5.5pt;
        }

        .sub-title-item {
            width: 50%;
            padding: 0.3mm 0;
        }

        .sub-title-item:first-child {
            border-right: 1px solid #000;
        }

        .header-seal-title {
            width: 21mm;
            text-align: center;
            font-size: 5.5pt;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.1;
        }

        .validity-row {
            height: 10.625mm;
            border-bottom: 1px solid #000;
            display: flex;
            box-sizing: border-box;
        }

        .validity-row:last-child {
            border-bottom: none;
        }

        .validity-dates-container {
            width: 47mm;
            border-right: 1px solid #000;
            display: flex;
            box-sizing: border-box;
            font-size: 5.5pt;
        }

        .temporary-column {
            width: 50%;
            border-right: 1px solid #000;
            padding: 0.5mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #374151;
        }

        .permanent-column {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .permanent-stamp {
            font-size: 11pt;
            font-weight: 900;
            color: #000;
            border: 1.5px solid #000;
            padding: 0.2mm 2mm;
            border-radius: 1px;
            transform: rotate(-3deg);
        }

        .seal-column {
            width: 21mm;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .administrative-red-seal {
            width: 17mm;
            height: 17mm;
            border: 1.5px double #dc2626;
            border-radius: 50%;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #dc2626;
            font-size: 3.5pt;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            line-height: 1;
            transform: rotate(15deg);
            background: rgba(253, 242, 248, 0.4);
            z-index: 10;
        }

        .administrative-red-seal .seal-center {
            border-top: 0.5px solid #dc2626;
            border-bottom: 0.5px solid #dc2626;
            padding: 0.2mm 0;
            margin-top: 0.2mm;
            font-size: 4.5pt;
        }
    </style>
</head>
<body>

<div class="permit-container">

    <!-- =========================================================================
         VOLET GAUCHE : GRAND RECTANGLE UNIQUE (Conforme à IMG_20260407_134208_3.jpg)
         ========================================================================= -->
    <div class="panel-left">

        <!-- Informations État Civil -->
        <div class="input-group">
            <span class="label-text">1. Nom</span>
            <span class="value-text" style="width: 53mm;">{{ $permis->nom }}</span>
        </div>
        <div class="input-group">
            <span class="label-text">2. Prénom</span>
            <span class="value-text" style="width: 49mm;">{{ $permis->prenom }}</span>
        </div>
        <div class="input-group">
            <span class="label-text">3. Date et lieu de naissance</span>
                   <span class="value-text" style="width: 30mm;">
                {{ \Carbon\Carbon::parse($permis->date_naissance)->format('d.m.Y') }}
            </span>
        </div>
        <div class="input-group" style="margin-top: -1mm;">

            <span class="value-text" style="width: 63mm;">
                {{ $permis->lieu_de_naissance}}
            </span>
        </div>
        <div class="input-group">
            <span class="label-text">4. Domicile</span>
            <span class="value-text" style="width: 49mm;">{{ $permis->domicile }}</span>
        </div>

        <!-- Zone Signature Titulaire et Emplacement Photo -->
        <div class="photo-signature-row">
            <div class="signature-box">
                <span class="signature-title">Signature du Titulaire</span>

            </div>

            <div class="photo-box">
                @if($permis->photo_du_conducteur)
                    <img src="{{ asset('storage/'.$permis->photo_du_conducteur) }}" class="photo-img" alt="Photo">
                @else
                    <div class="photo-placeholder">Photo</div>
                @endif
            </div>
        </div>

        <!-- Zone Administrative Basse (Délivrance + Directeur côte à côte) -->
        <div class="bottom-administrative-zone">

            <!-- Bloc Délivrance à gauche -->
            <div class="delivery-authority-section">
                <span>5. Délivré par Le Chef du<br>Centre d'Immatriculation</span>

                <div class="delivery-grid">
                    <div class="delivery-row">
                        <span class="delivery-label">A</span>
                        <span class="delivery-value">{{ $permis->centre_d_emission}}</span>
                    </div>
                    <div class="delivery-row">
                        <span class="delivery-label">Le</span>
                        <span class="delivery-value">
                            {{ \Carbon\Carbon::parse($permis->date_d_emission)->format('d.m.Y') }}
                        </span>
                    </div>
                    <div class="delivery-row">
                        <span class="delivery-label">N°</span>
                        <span class="delivery-value">{{ $permis->numero_du_permis }}</span>
                    </div>
                </div>
            </div>

            <!-- Bloc Directeur à droite (avec espace blanc préservé dessous) -->
            <div class="stamp-authority-box">
                <div class="stamp-title-italic">Signature et sceau de l'autorité</div>
                <div class="stamp-authority-title">
                    LE DIRECTEUR GENERAL<br>
                    DES ROUTES ET DES<br>
                    TRANSPORTS ROUTIERS
                </div>

                <!-- Espace libre pour accueillir l'image ou rester vide pour impression -->
            </div>

        </div>

        <!-- Identifiant de sécurité MeScan en dehors ou intégré discrètement -->
        <div class="mescan-security-footer">
            <span>SYSTEME NUMERIQUE MESCAN</span>
            <span>UUID: {{ substr($permis->uuid, 0, 10) }}...</span>
        </div>
    </div>

    <div class="spacer"></div>

    <!-- =========================================================================
         VOLET CENTRAL : Descriptions des catégories (Inchangé)
         ========================================================================= -->
    <div class="panel-center">
        <div class="center-header">
            CATEGORIE DE VEHICULES<br>
            POUR LESQUELS LE PERMIS EST VALABLE
        </div>

        <table class="categories-table">
            <tr class="category-row">
                <td class="category-letter">A</td>
                <td class="category-description-container">
                    Motocyclette avec sans side-car à moteur<br>Des plus 125 cm³
                    @if($permis->categorie === 'A' || (is_array($permis->categories) && in_array('A', $permis->categories)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">A1</td>
                <td class="category-description-container">
                    Vélomoteur et véhicules à moteur de cylindrée<br>50 cm³ sans excéder 125 cm³
                    @if($permis->categorie === 'A1' || (is_array($permis->categories_obtenues) && in_array('A1', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">A2</td>
                <td class="category-description-container">
                    Cyclomoteur et véhicules pourvus d'un moteur<br>dont la cylindrée ne dépasse pas 50 cm³
                    @if($permis->categorie === 'A2' || (is_array($permis->categories_obtenues) && in_array('A2', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">B</td>
                <td class="category-description-container">
                    Véhicule de moins de 10 places et d'un poids total<br>autorisé en charge n'excédant pas 3.500 kgs
                    @if($permis->categorie === 'B' || (is_array($permis->categories_obtenues) && in_array('B', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">C</td>
                <td class="category-description-container">
                    Véhicule affecté au transport des marchandises ou<br>de matériel de plus de 3.500 kgs PTAC
                    @if($permis->categorie === 'C' || (is_array($permis->categories_obtenues) && in_array('C', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">D</td>
                <td class="category-description-container">
                    Véhicule affecté au transport des personnes et<br>Comportant plus de 9 places assises
                    @if($permis->categorie === 'D' || (is_array($permis->categories_obtenues) && in_array('D', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">E</td>
                <td class="category-description-container">
                    Véhicules des catégories BCD ou F attelés d'une<br>remorque de plus de 750 kgs de PTAC
                    @if($permis->categorie === 'E' || (is_array($permis->categories_obtenues) && in_array('E', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>

            <tr class="category-row">
                <td class="category-letter">F</td>
                <td class="category-description-container">
                    Véhicules de catégorie A, A1, A2, ou B<br>spécialement aménagés
                    @if($permis->categorie === 'F' || (is_array($permis->categories_obtenues) && in_array('F', $permis->categories_obtenues)))
                        <span class="incrusted-permit-number">N° {{ $permis->numero_du_permis }} &nbsp;&nbsp;&nbsp; COMORES</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="spacer"></div>

    <!-- =========================================================================
         VOLET DROIT : Validité et cachets de validation (Inchangé)
         ========================================================================= -->
    <div class="panel-right">
        <div class="right-header">
            <div class="header-type-block">
                <div class="header-main-title">PERMIS DELIVRE A TITRE</div>
                <div class="header-sub-titles">
                    <div class="sub-title-item">TEMPORAIRE</div>
                    <div class="sub-title-item">PERMANENT</div>
                </div>
            </div>
            <div class="header-seal-title">
                Sceau et<br>Signature de<br>l'autorité
            </div>
        </div>

        @php
            $categoriesCodes = ['A', 'A1', 'A2', 'B', 'C', 'D', 'E', 'F'];
            $categoriesObtenues = is_array($permis->categories_obtenues)
                ? $permis->categories_obtenues
                : [$permis->categorie];
        @endphp

        @foreach($categoriesCodes as $code)
            @php
                $possede = in_array($code, $categoriesObtenues);
            @endphp
            <div class="validity-row">
                <div class="validity-dates-container">
                    <div class="temporary-column">
                        <span>Le : .................</span>
                        <span>Valable jusqu'au : ......</span>
                    </div>

                    <div class="permanent-column">
                        @if($possede)
                            <div class="permanent-stamp">P</div>
                        @endif
                    </div>
                </div>

                <div class="seal-column">
                    @if($possede)
                        <div class="administrative-red-seal">
                            <span style="font-size: 2.8pt;">UNION DES COMORES</span>
                            <div class="seal-center">MINISTÈRE</div>
                            <span style="font-size: 2.8pt;">DES TRANSPORTS</span>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>
</body>
</html>
