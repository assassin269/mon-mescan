<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aperçu du Permis - MeScan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .toolbar {
            display: flex;
            gap: 12px;
            margin-bottom: 25px;
            padding: 15px 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            max-width: 800px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .toolbar .btn {
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .toolbar .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-pdf {
            background: #2563eb;
            color: white;
        }
        .btn-print {
            background: #059669;
            color: white;
        }
        .btn-close {
            background: #6b7280;
            color: white;
        }
        .btn-close:hover {
            background: #4b5563;
        }

        .permit-wrapper {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 100%;
            overflow: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 80px;
        }

        .permit-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .permit-section-title {
            font-size: 18px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 15px;
            background: #e5e7eb;
            padding: 8px 24px;
            border-radius: 20px;
        }

        .permit-scale {
            transform: scale(1.15);
            transform-origin: top center;
            width: 231mm;
            height: 106mm;
        }

        .permit-scale * {
            color: #000000 !important;
        }

        .permit-scale .panel-left,
        .permit-scale .panel-center,
        .permit-scale .panel-right,
        .permit-scale .permit-container,
        .permit-scale .permit-container-verso {
            border-color: #000000 !important;
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 0;
            }

            html, body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                background: white;
                display: block;
            }

            .toolbar {
                display: none !important;
            }

            .permit-section {
                width: 210mm;
                height: 297mm;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                page-break-after: always;
                break-after: page;
                padding: 0;
                margin: 0;
                background: white;
            }

            .permit-section:last-child {
                page-break-after: avoid;
                break-after: avoid;
            }

            .permit-section-title {
                display: none !important;
            }

            .permit-wrapper {
                box-shadow: none;
                padding: 0;
                border-radius: 0;
                gap: 0;
                background: transparent;
                display: block;
                width: 100%;
                height: 100%;
            }

            .permit-scale {
                transform: scale(0.85) !important;
                width: 240mm;
                height: 120mm;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .permit-container,
            .permit-container-verso {
                margin: 0 auto;
            }

            .permit-scale * {
                color: #000000 !important;
            }
        }

        @media (max-width: 1400px) {
            .permit-scale {
                transform: scale(1.0);
            }
        }

        @media (max-width: 1200px) {
            .permit-scale {
                transform: scale(0.9);
            }
        }

        @media (max-width: 900px) {
            .permit-scale {
                transform: scale(0.75);
            }
        }

        @media (max-width: 600px) {
            .permit-scale {
                transform: scale(0.55);
            }
            .toolbar .btn {
                padding: 8px 14px;
                font-size: 12px;
            }
            .permit-wrapper {
                padding: 20px;
                gap: 50px;
            }
        }
    </style>
</head>
<body>

    <div class="toolbar">
        <a href="{{ route('permis.pdf', ['uuid' => $permis->uuid]) }}"
           target="_blank"
           class="btn btn-pdf">
            📥 Télécharger PDF
        </a>
        <button onclick="window.print()" class="btn btn-print">
            🖨️ Imprimer
        </button>
        <button onclick="window.close()" class="btn btn-close">
            ✕ Fermer
        </button>
    </div>

    <div class="permit-wrapper">

        <!-- RECTO -->
        <div class="permit-section">
            <div class="permit-section-title">📄 RECTO</div>
            <div class="permit-scale">
                @include('permis.partials.recto')
            </div>
        </div>

        <!-- VERSO -->
        <div class="permit-section">
            <div class="permit-section-title">📄 VERSO</div>
            <div class="permit-scale">
                @include('permis.partials.verso')
            </div>
        </div>

    </div>

</body>
</html>
