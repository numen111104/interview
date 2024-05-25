@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

<div class="card card-body" x-data="{ programs: @entangle('programs'), cabangIdn: @entangle('cabangIdn') }">
    <form wire:submit.prevent="submitForm">
        <!-- Username Field -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="email" class="form-control" id="username" wire:model.defer="username" required>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" wire:model.defer="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nama Field -->
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" wire:model.defer="nama" required>
            @error('nama')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Jenis Kelamin Field -->
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label><br>
            <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" wire:model.defer="jenis_kelamin"
                required>
            <label for="laki_laki">Laki-laki</label><br>
            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"
                wire:model.defer="jenis_kelamin">
            <label for="perempuan">Perempuan</label><br>
            @error('jenis_kelamin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Cabang IDN Field -->
        <div class="form-group">
            <label for="cabangIdn">Cabang IDN:</label>
            <select @disabled($programs) class="form-control" id="cabangIdn" wire:model="cabangIdn" required>
                <option value="">Pilih Cabang IDN</option>
                @foreach ($cabangIdns as $cabang)
                    <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                @endforeach
            </select>
            @error('cabangIdn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Program IDN Field -->
        <div class="form-group" x-show="cabangIdn && programs.length > 0">
            <label for="program_idn">Program IDN:</label>
            <select class="form-control" id="program_idn" wire:model="program_idn" required>
                <option value="">Pilih Program IDN</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                @endforeach
            </select>
            @error('program_idn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bukti Transfer Field -->
        <div class="form-group">
            <label for="bukti_transfer">Bukti Transfer:</label>
            <input type="file" class="form-control" id="bukti_transfer" wire:model="bukti_transfer" required>
            @error('bukti_transfer')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div wire:loading wire:target="bukti_transfer" class="mt-2">
                <div class="progress"></div>
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" @disabled(!$programs) id="toastr-1" class="btn btn-success">Daftar</button>
    </form>

    @if (session()->has('message'))
        <script>
            iziToast.success("{{ session('message') }}");
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            iziToast.error("{{ session('error') }}");
        </script>
    @endif
</div>

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>
@endpush
