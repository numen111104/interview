<div class="card card-body">
    @if (session()->has('message'))
        <script>
            toastr.success("{{ session('message') }}");
        </script>
    @endif

    <form wire:submit.prevent="submit" x-data="{ progress: 0 }" x-init="Livewire.on('livewire-upload-start', () => {
        progress = 0;
    });
    Livewire.on('livewire-upload-finish', () => {
        progress = 100;
    });
    Livewire.on('livewire-upload-error', () => {
        progress = 0;
    });
    Livewire.on('livewire-upload-progress', event => {
        progress = event.detail.progress;
    });">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="email" id="username" class="form-control" wire:model.defer="username">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" wire:model.defer="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Santri:</label>
            <input type="text" id="nama" class="form-control" wire:model.defer="nama">
            @error('nama')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <input type="radio" id="laki-laki" value="L" class="form-check-input"
                    wire:model.defer="jenis_kelamin">
                <label for="laki-laki" class="form-check-label">Laki-Laki</label>
            </div>
            <div class="form-check">
                <input type="radio" id="perempuan" value="P" class="form-check-input"
                    wire:model.defer="jenis_kelamin">
                <label for="perempuan" class="form-check-label">Perempuan</label>
            </div>
            @error('jenis_kelamin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cabang_idn">Cabang IDN:</label>
            <select id="cabang_idn" class="form-control" wire:model="cabang_idn">
                <option value="">Pilih Cabang</option>
                @foreach ($cabangs as $cabang)
                    <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                @endforeach
            </select>
            @error('cabang_idn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="program_idn">Program IDN:</label>
            <select id="program_idn" class="form-control" wire:model.defer="program_idn">
                <option value="">Pilih Program</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                @endforeach
            </select>
            @error('program_idn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="bukti_transfer">Bukti Transfer:</label>
            <input type="file" id="bukti_transfer" class="form-control" wire:model="bukti_transfer">
            @error('bukti_transfer')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div x-show="progress > 0" class="mt-2">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                        :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        @if ($bukti_transfer)
            <img src="{{ $bukti_transfer->temporaryUrl() }}" alt="Bukti Transfer" style="max-width: 200px;">
        @endif

        <button type="submit">Daftar</button>
    </form>
</div>

@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iziToast/1.4.0/js/iziToast.min.js"></script>
<script>
    window.addEventListener('success', event => {
        iziToast.success({
            title: 'Success',
            message: event.detail.message,
            position: 'topRight'
        });
    });
</script>
