<x-layouts::app.sidebar :title="$title ?? null">
@livewireStyles

    {{-- ===== HEADER PT COFFTAQI ===== --}}
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .cofftaqi-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 28px;
        height: 52px;
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        position: relative;
        z-index: 100;
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-sizing: border-box;
        width: 100%;
    }

    .cofftaqi-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 180px;
        height: 2px;
        background: linear-gradient(90deg, #2d6a4f, transparent);
    }

    .cofftaqi-header-company {
        font-size: 14px;
        font-weight: 700;
        color: #1a3d2b;
        letter-spacing: 0.1px;
    }

    .cofftaqi-header-right {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #f0faf4;
        border: 1px solid #d1fae5;
        border-radius: 7px;
        padding: 4px 10px;
    }

    .cofftaqi-header-right svg {
        color: #2d6a4f;
        flex-shrink: 0;
    }

    .cofftaqi-sep {
        width: 1px;
        height: 13px;
        background: #bbf7d0;
    }

    #header-date {
        font-size: 12px;
        font-weight: 500;
        color: #4b5563;
    }

    #header-time {
        font-size: 12px;
        font-weight: 500;
        color: #4b5563;
        letter-spacing: 0.5px;
        font-variant-numeric: tabular-nums;
    }

    /* MOBILE = HEADER HILANG */
    @media (max-width: 1200px) {
        .cofftaqi-header {
            display: none;
        }
    }
</style>

<header class="cofftaqi-header">

    <span class="cofftaqi-header-company">
        PT Cofftaqi Sumatra Indonesia
    </span>

    <div class="cofftaqi-header-right">

        {{-- ICON CALENDAR --}}
        <svg width="13" height="13" viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             stroke-linecap="round"
             stroke-linejoin="round">

            <rect x="3" y="4" width="18" height="18" rx="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>

        </svg>

        <span id="header-date"></span>

        <div class="cofftaqi-sep"></div>

        {{-- ICON CLOCK --}}
        <svg width="13" height="13" viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             stroke-linecap="round"
             stroke-linejoin="round">

            <circle cx="12" cy="12" r="10"/>
            <polyline points="12 6 12 12 16 14"/>

        </svg>

        <span id="header-time"></span>

    </div>

</header>

<script>
    (function () {

        var days = [
            'Minggu','Senin','Selasa',
            'Rabu','Kamis','Jumat','Sabtu'
        ];

        var months = [
            'Jan','Feb','Mar','Apr',
            'Mei','Jun','Jul','Agu',
            'Sep','Okt','Nov','Des'
        ];

        function updateClock() {

            var now = new Date();

            var elDate = document.getElementById('header-date');
            var elTime = document.getElementById('header-time');

            if (elDate) {
                elDate.textContent =
                    days[now.getDay()] + ', ' +
                    now.getDate() + ' ' +
                    months[now.getMonth()] + ' ' +
                    now.getFullYear();
            }

            if (elTime) {

                var hh = String(now.getHours()).padStart(2, '0');
                var mm = String(now.getMinutes()).padStart(2, '0');
                var ss = String(now.getSeconds()).padStart(2, '0');

                elTime.textContent =
                    hh + ':' + mm + ':' + ss + ' WIB';
            }

        }

        updateClock();

        setInterval(updateClock, 1000);

    })();
</script>
{{-- ===== END HEADER ===== --}}

    <flux:main>
        {{ $slot }}
    </flux:main>

    {{-- SWEET ALERT CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SWEET ALERT LIVEWIRE --}}
    <script>
        document.addEventListener('livewire:init', () => {

            /* =========================
               KONFIRMASI HAPUS
            ========================== */
            Livewire.on('show-delete-confirmation', () => {

                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: 'Data akan dihapus permanen',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {

                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed')
                    }

                });

            });

            /* =========================
               ALERT DELETE BERHASIL
            ========================== */
            Livewire.on('deleted', () => {

                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data berhasil dihapus',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });

            });

            /* =========================
               ALERT SAVE BERHASIL
            ========================== */
            Livewire.on('saved', (event) => {

                Swal.fire({
                    title: 'Berhasil',
                    text: event[0].message,
                    icon: 'success',
                    confirmButtonColor: '#4F8B6A'
                }).then(() => {

                    if (event[0].url) {
                        window.location.href = event[0].url
                    }

                });

            });

            /* =========================
               ALERT ERROR
            ========================== */
            Livewire.on('swal:error', (event) => {

                Swal.fire({
                    title: event[0].title ?? 'Gagal',
                    text: event[0].text ?? 'Terjadi kesalahan',
                    icon: 'error',
                    confirmButtonColor: '#d33'
                });

            });

            /* =========================
               ALERT CUSTOM UNIVERSAL
            ========================== */
            Livewire.on('swal', (event) => {

                Swal.fire({
                    title: event.title ?? 'Informasi',
                    html: event.text ?? '',
                    icon: event.icon ?? 'success',
                    confirmButtonColor: '#4F8B6A'
                });

            });

        });
    </script>
@livewireScripts
</x-layouts::app.sidebar>