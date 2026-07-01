<style>
    /* STYLES DES CONTENEURS ET DU PANNEAU GAUCHE */
    .permit-container { width: 231mm; height: 106mm; display: flex; box-sizing: border-box; background-color: #ffffff; padding: 6mm 0 6mm 6mm; position: relative; font-family: Arial, sans-serif; font-size: 7.5pt; color: #111827; -webkit-print-color-adjust: exact; }
    .panel-left { width: 69mm; height: 94mm; border: 1px solid #000; box-sizing: border-box; padding: 2mm; display: flex; flex-direction: column; position: relative; }
    .input-group { margin-bottom: 2mm; font-size: 7.5pt; line-height: 1.2; }
    .label-text { font-weight: normal; color: #000; }
    .value-text { font-weight: bold; text-transform: uppercase; font-family: "Courier New", Courier, monospace; font-size: 8.5pt; border-bottom: 1px dotted #374151; padding-left: 1mm; display: inline-block; }
    .photo-signature-row { display: flex; justify-content: space-between; margin-top: 1mm; height: 28mm; border-bottom: 1px solid #000; padding-bottom: 2mm; }
    .signature-box { width: 35mm; height: 26mm; font-size: 7pt; position: relative; box-sizing: border-box; }
    .signature-box .signature-title { display: block; margin-bottom: 1mm; }
    .photo-box { width: 26mm; height: 26mm; border: 1px solid #000; background-color: rgba(255, 255, 255, 0.3); text-align: center; position: relative; box-sizing: border-box; }
    .photo-box .photo-img { width: 100%; height: 100%; object-fit: cover; }
    .photo-box .photo-placeholder { line-height: 26mm; color: #374151; font-size: 8pt; }
    .bottom-administrative-zone { display: flex; justify-content: space-between; margin-top: 2mm; flex-grow: 1; }
    .delivery-authority-section { width: 34mm; font-size: 6.8pt; line-height: 1.2; }
    .delivery-grid { margin-top: 1mm; }
    .delivery-row { display: flex; align-items: baseline; margin-bottom: 1mm; }
    .delivery-label { width: 5mm; }
    .delivery-value { font-weight: bold; font-family: "Courier New", Courier, monospace; border-bottom: 1px dotted #000; flex-grow: 1; padding-left: 0.5mm; font-size: 7.5pt; }
    .stamp-authority-box { width: 30mm; text-align: center; position: relative; display: flex; flex-direction: column; justify-content: flex-start; box-sizing: border-box; height: 100%; }
    .stamp-title-italic { font-size: 6pt; font-style: italic; margin-bottom: 1mm; }
    .stamp-authority-title { font-weight: bold; font-size: 5.8pt; line-height: 1.1; }
    .directeur-name { font-weight: bold; font-size: 6pt; text-transform: uppercase; margin-top: auto; padding-top: 1mm; text-align: center; width: 100%; display: block; }
    .mescan-security-footer { position: absolute; bottom: -4mm; left: 0; width: 65mm; display: flex; justify-content: space-between; align-items: center; font-size: 5pt; color: #1f2937; font-family: monospace; border-top: 0.5px dashed rgba(0, 0, 0, 0.3); padding-top: 0.5mm; }
    .spacer { width: 6mm; }

    /* PANNEAU CENTRAL */
    .panel-center { width: 69mm; height: 94mm; border: 1px solid #000; box-sizing: border-box; display: flex; flex-direction: column; background-color: #ffffff; }
    .center-header { text-align: center; font-weight: bold; font-size: 6.5pt; line-height: 1.2; padding: 1mm; border-bottom: 1px solid #000; height: 9mm; box-sizing: border-box; display: flex; align-items: center; justify-content: center; }
    .categories-table { width: 100%; border-collapse: collapse; flex-grow: 1; }
    .category-row { border-bottom: 1px solid #000; height: 10.625mm; }
    .category-row:last-child { border-bottom: none; }
    .category-letter { width: 8mm; font-weight: bold; font-size: 11pt; text-align: center; border-right: 1px solid #000; vertical-align: middle; }
    .category-description-container { padding: 0.5mm 1.5mm; font-size: 5.8pt; line-height: 1.1; vertical-align: top; position: relative; }
    .incrusted-permit-number { display: flex; justify-content: space-between; width: 100%; margin-top: 0.5mm; font-family: "Courier New", Courier, monospace; font-weight: bold; font-size: 7.5pt; color: #000; }

    /* PANNEAU DROIT */
    .panel-right { width: 69mm; height: 94mm; border: 1px solid #000; box-sizing: border-box; display: flex; flex-direction: column; background-color: #ffffff; }
    .right-header { height: 9mm; border-bottom: 1px solid #000; display: flex; box-sizing: border-box; }
    .header-type-block { width: 47mm; border-right: 1px solid #000; display: flex; flex-direction: column; text-align: center; font-weight: bold; font-size: 6pt; justify-content: space-between; }
    .header-main-title { padding-top: 0.5mm; }
    .header-sub-titles { display: flex; border-top: 1px solid #000; font-size: 5.5pt; }
    .sub-title-item { width: 50%; padding: 0.3mm 0; }
    .sub-title-item:first-child { border-right: 1px solid #000; }
    .header-seal-title { width: 21mm; text-align: center; font-size: 5.5pt; font-weight: bold; display: flex; align-items: center; justify-content: center; line-height: 1.1; }
    .validity-row { height: 10.625mm; border-bottom: 1px solid #000; display: flex; box-sizing: border-box; }
    .validity-row:last-child { border-bottom: none; }
    .validity-dates-container { width: 47mm; border-right: 1px solid #000; display: flex; box-sizing: border-box; font-size: 5.5pt; }
    .temporary-column { width: 50%; border-right: 1px solid #000; padding: 0.5mm; display: flex; flex-direction: column; justify-content: space-between; color: #374151; }
    .permanent-column { width: 50%; display: flex; align-items: center; justify-content: center; position: relative; padding: 1mm; box-sizing: border-box; }
    .permanent-stamp { font-size: 11pt; font-weight: 900; color: #000; border: 1.5px solid #000; padding: 0.2mm 2mm; border-radius: 1px; transform: rotate(-3deg); }
    .temporary-black-box { width: 100%; height: 100%; min-height: 8mm; background-color: #000000; border-radius: 1px; }
    .seal-column { width: 21mm; display: flex; align-items: center; justify-content: center; position: relative; }
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
                    <img src="{{ public_path('storage/'.$permis->photo_du_conducteur) }}" class="photo-img" alt="Photo">
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
                <div class="stamp-authority-title">LE DIRECTEUR GENERAL<br>DES ROUTES ET DES<br>TRANSPORTS ROUTIERS</div>
                <div class="directeur-name">{{ $permis->nom_du_directeur_general }}</div>
            </div>
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
