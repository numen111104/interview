<div class="section-body">
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Pendaftaran</h4>
                </div>
                <div class="card-body" x-data="{ programs: @entangle('programs'), cabangIdn: @entangle('cabangIdn') }">
                    <form wire:submit.prevent="submitForm">

                        <!-- Username Field -->
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="email" class="form-control" id="username" wire:model.defer="username"
                                required>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" wire:model.defer="password"
                                required>
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
                            <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki"
                                wire:model.defer="jenis_kelamin" required>
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
                            <select {{ $cabangIdn ? 'disabled' : '' }} class="form-control" id="cabangIdn"
                                wire:model="cabangIdn" required>
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
                            <input type="file" class="form-control" id="bukti_transfer" wire:model="bukti_transfer"
                                required>
                            @error('bukti_transfer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div wire:loading wire:target="bukti_transfer" class="mt-2">
                                <span class="text-info">Uploading...</span>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button @disabled(!$cabangIdn) type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Bukti Transfer</h4>
                </div>
                <div class="card-body">
                    <div class="img mb-3 text-center p-5">
                        @if ($bukti_transfer)
                            <img src="{{ $bukti_transfer->temporaryUrl() }}" alt="Bukti Transfer"
                                style="max-width: 200px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
