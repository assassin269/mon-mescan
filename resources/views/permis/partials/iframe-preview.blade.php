<div class="w-full flex justify-center bg-gray-900 p-2 rounded-xl">
    <iframe
        src="{{ route('permis.preview', ['uuid' => $record->uuid]) }}"
        class="w-full h-[700px] border-0 rounded-lg shadow-2xl bg-white"
        style="max-width: 1000px;"
    ></iframe>
</div>
