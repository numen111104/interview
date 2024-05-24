<div x-data="{ branchQuota: @entangle('branchQuota') }" class="card-body">
    <div class="form-group">
        <label>Pilih Cabang</label>
        <select class="form-control" x-on:change="$wire.updateSelectedBranch($event.target.value)">
            @foreach($cabang as $branch)
                <option value="{{ $branch->id }}" {{ $selectedBranch == $branch->id ? 'selected' : '' }}>
                    {{ $branch->nama_cabang }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="badges">
        <div class="card-title primary">
            <h5 class="h5">Sisa Kuota</h5>
        </div>
        <x-badges color='primary'>TKJ: <span x-text="branchQuota.TKJ"></span></x-badges>
        <x-badges color='success'>RPL: <span x-text="branchQuota.RPL"></span></x-badges>
        <x-badges color='info'>DKV: <span x-text="branchQuota.DKV"></span></x-badges>
        <x-badges color='warning'>SMP: <span x-text="branchQuota.SMP"></span></x-badges>
    </div>
</div>
