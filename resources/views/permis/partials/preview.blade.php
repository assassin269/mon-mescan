<div class="preview-root-container">

    <!-- FACE RECTO -->
    <div class="permis-section">
        <div class="permis-header-bar">
            <span class="text-xs font-bold text-emerald-400 tracking-wider uppercase flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Face Recto
            </span>
            <span class="text-[11px] text-gray-400 font-mono">Format A4 Landscape</span>
        </div>

        <div class="permis-card-wrapper">
            <div class="permis-zoom-inner">
                @include('permis.partials.recto')
            </div>
        </div>
    </div>

    <!-- FACE VERSO -->
    <div class="permis-section">
        <div class="permis-header-bar">
            <span class="text-xs font-bold text-emerald-400 tracking-wider uppercase flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                Face Verso
            </span>
            <span class="text-[11px] text-gray-400 font-mono">MeScan Digital ID</span>
        </div>

        <div class="permis-card-wrapper">
            <div class="permis-zoom-inner">
                @include('permis.partials.verso')
            </div>
        </div>
    </div>

</div>

<style>
    /* Conteneur principal forcé au centre */
    .preview-root-container {
        width: 100% !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 1.5rem !important;
        padding: 1rem 0 !important;
        background-color: rgba(3, 7, 18, 0.8) !important;
        border-radius: 1rem !important;
    }

    /* Section bloquée à 850px et centrée */
    .permis-section {
        width: 100% !important;
        max-width: 850px !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        margin: 0 auto !important;
    }

    /* Barre de titre alignée pile sur la largeur de la carte */
    .permis-header-bar {
        width: 100% !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        margin-bottom: 0.5rem !important;
        padding: 0 0.5rem !important;
        box-sizing: border-box !important;
    }

    /* Carte du permis */
    .permis-card-wrapper {
        width: 100% !important;
        background-color: #ffffff !important;
        border-radius: 8px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        overflow: hidden !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    /* Zoom et centrage interne */
    .permis-zoom-inner {
        zoom: 0.68;
        transform-origin: top center;
        width: 100% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    /* Annulation des marges parasites */
    .permis-zoom-inner .cut-line-container-verso,
    .permis-zoom-inner .cut-line-container,
    .permis-zoom-inner .page-container {
        margin: 0 auto !important;
    }

    .permis-zoom-inner * {
        color: #000000 !important;
    }
</style>
