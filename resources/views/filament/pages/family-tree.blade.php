<x-filament::page>
    <form action="{{ route('family-tree.show') }}" method="GET" id="family-tree-form">
        <label for="family_id">Pilih Kepala Keluarga:</label>
        <select name="family_id" id="family_id" onchange="document.getElementById('family-tree-form').submit()">
            <option value="">-- Pilih Keluarga --</option>
            @foreach ($families as $family)
                <option value="{{ $family->id }}">{{ $family->nama_lengkap }}</option>
            @endforeach
        </select>
    </form>

    <div id="family-tree-container"></div>

    <script>
        document.getElementById('family-tree-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const familyId = document.getElementById('family_id').value;

            if (familyId) {
                fetch(`/family-tree/show?family_id=${familyId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Render pohon keluarga di sini
                        console.log(data); // Ini akan menampilkan data pohon keluarga di console
                    });
            }
        });
    </script>
</x-filament::page>
