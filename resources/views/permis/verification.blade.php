<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ME_SCAN | Vérification Officielle - {{ $permis->nom }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .permis-card {
            width: 100%;
            max-width: 450px;
            min-height: 275px;
            background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 60%, #fecdd3 100%);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(225, 29, 72, 0.15);
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            color: #0f172a;
        }

        .data-label {
            font-size: 9.5px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #be123c;
            font-weight: 700;
            display: block;
            margin-bottom: -1px;
        }
    </style>
</head>
<body class="bg-white text-slate-800 min-h-screen antialiased flex flex-col justify-between m-0 p-0">

    <main class="w-full max-w-4xl mx-auto px-4 py-6 md:py-12 flex-1 flex flex-col justify-center">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-slate-100 pb-6 mb-8 gap-4 text-center md:text-left">
            <div>
                <span class="text-[10px] font-bold tracking-widest text-rose-600 uppercase bg-rose-50 px-3 py-1 rounded-full border border-rose-100">
                    Ministère de l'Intérieur - Infrastructure Numérique
                </span>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight mt-2">
                    Contrôle de Conformité
                </h1>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <span class="w-full sm:w-auto justify-center bg-emerald-50 text-emerald-700 border border-emerald-100 px-4 py-2.5 rounded-xl font-bold text-xs flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    PERMIS VALIDE
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 xl:gap-10 justify-items-center">

            <div class="permis-card p-5 flex flex-col justify-between">
                <div class="absolute -right-4 -bottom-8 text-rose-500/5 text-8xl font-black select-none pointer-events-none tracking-tighter">COMORES</div>

                <div class="flex justify-between items-start border-b border-rose-100 pb-2">
                    <div>
                        <h2 class="text-[9px] font-black tracking-widest text-rose-900/60 uppercase">Union des Comores</h2>
                        <p class="text-[11px] font-extrabold text-rose-700 tracking-tight">PERMIS DE CONDUIRE</p>
                    </div>
                    <div class="bg-slate-900 text-rose-100 font-mono px-2 py-0.5 rounded text-xs font-bold tracking-wider">
                        N° {{ $permis->numero_du_permis }}
                    </div>
                </div>

                <div class="flex justify-between items-center my-auto py-3 gap-2">

                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <div class="w-20 h-24 bg-slate-50 rounded-xl overflow-hidden border border-rose-200/60 shadow-xs flex-shrink-0">
                            @if($permis->photo_du_conducteur)
                                @php
                                    $photoPath = $permis->photo_du_conducteur;
                                    if (is_string($photoPath) && str_starts_with($photoPath, '[')) {
                                        $decoded = json_decode($photoPath, true);
                                        $photoPath = $decoded[0] ?? $photoPath;
                                    }
                                @endphp
                                <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $photoPath) }}');"></div>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-50">
                                    <i class="fa-solid fa-user text-xl"></i>
                                </div>
                            @endif
                        </div>

                        <div class="space-y-1 text-xs min-w-0">
                            <div>
                                <span class="data-label">Nom</span>
                                <span class="font-black text-sm text-slate-900 uppercase tracking-tight leading-tight block">{{ $permis->nom }}</span>
                            </div>
                            <div>
                                <span class="data-label">Prénom(s)</span>
                                <span class="font-bold text-slate-800 text-[12px] tracking-tight leading-tight block truncate">{{ $permis->prenom }}</span>
                            </div>

                            <div class="flex gap-4 mt-0.5">
                                <div class="flex-shrink-0">
                                    <span class="data-label">Né(e) le</span>
                                    <span class="font-bold text-slate-800 text-[10.5px] block leading-tight">{{ \Carbon\Carbon::parse($permis->date_de_naissance)->format('d/m/Y') }}</span>
                                </div>
                                <div class="min-w-0">
                                    <span class="data-label">À</span>
                                    <span class="font-bold text-slate-800 text-[10.5px] block leading-tight whitespace-normal break-words">{{ $permis->lieu_de_naissance }}</span>
                                </div>
                            </div>

                            <div>
                                <span class="data-label">Domicile</span>
                                <span class="font-bold text-slate-700 text-[11px] leading-tight block truncate">{{ $permis->domicile }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-right flex flex-col justify-center flex-shrink-0 pl-2 border-l border-rose-200/60 h-20 justify-items-center">
                        <span class="text-[8px] text-rose-900 font-black uppercase tracking-tight leading-tight block">
                            Le Directeur Général
                        </span>
                        <span class="text-[8px] text-rose-900 font-black uppercase tracking-tight leading-tight block">
                            des Routes et des
                        </span>
                        <span class="text-[8px] text-rose-900 font-black uppercase tracking-tight leading-tight block mb-1">
                            Transports Routiers
                        </span>

                        <span class="text-slate-700 font-extrabold uppercase text-[9.5px] block tracking-tight leading-tight">
                            {{ $permis->nom_du_directeur_general }}
                        </span>
                    </div>

                </div>

                <div class="flex justify-between items-center border-t border-rose-100 pt-2 text-[9px] font-bold text-slate-600">
                    <div>
                        <span class="text-rose-700 uppercase text-[7.5px] font-extrabold">Centre :</span>
                        <span class="text-slate-900 font-black uppercase text-[10px]">{{ $permis->centre_d_emission }}</span>
                    </div>
                    <div class="text-center">
                        <span class="text-rose-700 uppercase text-[7.5px] font-extrabold">Série :</span>
                        <span class="text-slate-900 font-black uppercase text-[10px]">{{ $permis->serie ?? '--' }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-rose-700 uppercase text-[7.5px] font-extrabold">Délivré le :</span>
                        <span class="text-slate-900 font-black text-[10px]">{{ \Carbon\Carbon::parse($permis->date_d_emission)->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="permis-card p-5 flex flex-col justify-between">

                <div class="w-full text-[10px]">
                    <div class="grid grid-cols-4 bg-slate-900 text-rose-100 font-bold p-1.5 rounded-t-xl text-center uppercase tracking-wider text-[8px]">
                        <div>Catégorie</div>
                        <div>Délivrance</div>
                        <div>Expiration</div>
                        <div>Statut</div>
                    </div>
                    <div class="divide-y divide-rose-100/50 bg-white/50 rounded-b-xl border border-rose-200/40 overflow-hidden">
                        @if($permis->categorie)
                            @foreach($permis->categorie as $item)
                                <div class="grid grid-cols-4 p-2 text-center font-bold items-center text-slate-900">
                                    <div class="text-xs font-black bg-slate-900/10 w-6 h-6 flex items-center justify-center rounded-full mx-auto text-slate-900">{{ $item['categorie_id'] ?? '--' }}</div>
                                    <div class="text-[11px]">{{ \Carbon\Carbon::parse($permis->date_d_emission)->format('d/m/Y') }}</div>
                                    <div class="text-slate-700 text-[10px]">{{ isset($item['date_d_expiration']) ? \Carbon\Carbon::parse($item['date_d_expiration'])->format('d/m/Y') : 'PERMANENT' }}</div>
                                    <div>
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase {{ ($item['statut'] ?? '') === 'Permanent' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                            {{ $item['statut'] ?? 'Valide' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="flex justify-between items-end gap-4 mt-2">
                    <div class="flex-1 text-[10px] text-rose-950 font-medium border-l border-rose-300 pl-2 min-w-0">
                        <p class="truncate leading-tight"><strong>Restrictions :</strong> {{ $permis->conditions_restrictives_d_usage ?? 'Aucune restriction' }}</p>
                    </div>

                    <div class="w-14 h-14 bg-white rounded-xl p-1 flex items-center justify-center border border-rose-200/60 flex-shrink-0">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&color=0f172a&data={{ urlencode(url('/verifier/' . $permis->uuid)) }}" alt="QR Code" class="w-full h-full">
                    </div>
                </div>

                <div class="border-t border-rose-100 pt-2 text-center">
                    <p class="text-[8px] font-bold tracking-widest text-rose-900/40 uppercase leading-none">Infrastructures Numériques ME_SCAN</p>
                </div>
            </div>

        </div>

    </main>

    <footer class="w-full text-center py-4 bg-white border-t border-slate-50 text-slate-400 text-[11px] mt-auto">
        &copy; 2026 - Direction Générale des Transports Routiers | Sécurisé par ME_SCAN
    </footer>

</body>
</html>
