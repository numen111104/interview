<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cabang;

class CabangKuotaCard extends Component
{
    public $selectedBranch;
    public $branchQuota = [];

    public function mount()
    {
        $this->selectedBranch = 1; // ID Defaul Cabang Jonggol
        $this->updateQuota(); 
    }

    public function updateSelectedBranch($value)
    {
        $this->selectedBranch = $value;
        $this->updateQuota();
    }

    public function updateQuota()
    {
        $branch = Cabang::find($this->selectedBranch);
        if ($branch) {
            $this->branchQuota = [
                'TKJ' => $branch->kuota_tkj ?? 'Kuota Habis',
                'RPL' => $branch->kuota_rpl ?? 'Kuota Habis',
                'DKV' => $branch->kuota_dkv ?? 'Kuota Habis',
                'SMP' => $branch->kuota_smp ?? 'Kuota Habis'
            ];
        } else {
            $this->branchQuota = [
                'TKJ' => 'Kuota Habis',
                'RPL' => 'Kuota Habis',
                'DKV' => 'Kuota Habis',
                'SMP' => 'Kuota Habis'
            ];
        }
    }

    public function render()
    {
        $branches = Cabang::all();
        return view('livewire.cabang-kuota-card', [
            'cabang' => $branches
        ]);
    }
}
