<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Cabang;
use App\Models\ProgramIdn;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Hash;

class FormPendaftaran extends Component
{
    use WithFileUploads;

    public $username, $password, $nama, $jenis_kelamin, $cabang_idn, $program_idn, $bukti_transfer;
    public $cabangs = [];
    public $programs = [];

    protected $rules = [
        'username' => 'required|email|unique:pendaftarans,username',
        'password' => 'required|min:6',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required',
        'cabang_idn' => 'required',
        'program_idn' => 'required',
        'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:1024'
    ];

    public function mount()
    {
        $this->cabangs = Cabang::all();
    }

    public function updatedCabangIdn()
    {
        $this->program_idn = null; // Reset program_idn on cabang change
        $this->updatePrograms();
    }

    public function updatePrograms()
    {
        if ($this->cabang_idn) {
            $this->programs = ProgramIdn::where('cabang_idn', $this->cabang_idn)->get();
        } else {
            $this->programs = [];
        }
    }

    public function updatedBuktiTransfer()
    {
        $this->dispatch('livewire-upload-start');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $cabang = Cabang::find($this->cabang_idn);
        $program = ProgramIdn::find($this->program_idn);

        if ($this->isQuotaFull($cabang, $program)) {
            $this->addError('program_idn', "Kuota untuk {$program->nama_program} di {$cabang->nama_cabang} sudah penuh, silahkan pilih program yang lain");
            return;
        }

        $filePath = $this->bukti_transfer->store('bukti_transfer');

        Pendaftaran::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'cabang_idn' => $this->cabang_idn,
            'program_idn' => $this->program_idn,
            'bukti_transfer' => $filePath,
        ]);

        session()->flash('message', 'Selamat! Pendaftaran Berhasil');
        return redirect()->route('home');
    }

    private function isQuotaFull($cabang, $program)
    {
        $quotaField = "kuota_{$program->nama_program}";
        return $cabang->$quotaField <= Pendaftaran::where('cabang_idn', $cabang->id)->where('program_idn', $program->id)->count();
    }

    public function render()
    {
        return view('livewire.form-pendaftaran');
    }
}
