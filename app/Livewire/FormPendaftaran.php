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

    public $username;
    public $password;
    public $nama;
    public $jenis_kelamin;
    public $cabangIdn;
    public $program_idn;
    public $bukti_transfer;
    public $cabangIdns;
    public $programs = [];

    public function mount()
    {
        $this->cabangIdns = Cabang::all();
    }

    public function updatedCabangIdn($value)
    {
        $this->programs = ProgramIdn::where('cabang_idn', $value)->get();
    }

    public function submitForm()
    {
        $validatedData = $this->validate([
            'username' => 'required|unique:pendaftarans',
            'password' => 'required',
            'nama' => 'required',
            'bukti_transfer' => 'required|image|max:1048',
            'cabangIdn' => 'required',
            'program_idn' => 'required',
            'jenis_kelamin' => 'required',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'bukti_transfer.required' => 'Bukti transfer harus diisi.',
            'cabangIdn.required' => 'Cabang harus diisi.',
            'program_idn.required' => 'Program harus diisi.',
            'bukti_transfer.image' => 'File bukti transfer harus berupa gambar.',
            'bukti_transfer.max' => 'File bukti transfer maksimal 1 MB.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
        ]);

        // Handle file upload
        if ($this->bukti_transfer) {
            $this->bukti_transfer->store('bukti_transfers', 'public');
        }
        

        // Save data to database
        Pendaftaran::create([
            'username' => $this->username,
            'password' => bcrypt($this->password), // Encrypt the password before saving
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'cabang_idn' => $this->cabangIdn,
            'program_idn' => $this->program_idn,
            'bukti_transfer' => $validatedData['bukti_transfer'],
        ]);

        session()->flash('message', 'Pendaftaran berhasil.');

        // Reset form
        $this->reset(['username', 'password', 'nama', 'jenis_kelamin', 'cabangIdn', 'program_idn', 'bukti_transfer']);
    }
    public function updatedBuktiTransfer()
    {
        $this->dispatch('livewire-upload-start');
    }

    public function render()
    {
        return view('livewire.form-pendaftaran');
    }
}
