<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Permis Numérique - MeScan</title>
    <style>
        /* Configuration de la page d'impression */
        @page {
            size: A4 landscape;
            margin: 0;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 297mm;
            background-color: #ffffff;
            -webkit-print-color-adjust: exact;

            /* On force un empilement vertical strict */
            display: flex;
            flex-direction: column;
        }

        /* Conteneur global pour chaque face */
        .page-container {
            width: 297mm;  /* Largeur A4 Paysage */
            height: 210mm; /* Hauteur A4 Paysage exacte */

            /* On centre le permis à l'intérieur de sa page dédiée */
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;

            /* Directives de saut de page critiques pour Spatie/Chromium */
            page-break-inside: avoid;
            break-inside: avoid;
            page-break-after: always;
            break-after: page;
        }

        /* Empêche la création d'une page blanche inutile à la fin */
        .page-container:last-child {
            page-break-after: avoid;
            break-after: avoid;
        }
    </style>
</head>
<body>

    <div class="page-container">
        @include('permis.partials.recto')
    </div>

    <div class="page-container">
        @include('permis.partials.verso')
    </div>

</body>
</html>
