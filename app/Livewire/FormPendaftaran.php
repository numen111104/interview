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
            'username' => 'required|email|unique:pendaftarans',
            'password' => 'required|min:6',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:1024',
            'cabangIdn' => 'required',
            'program_idn' => 'required',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.email' => 'Format email tidak valid.',
            'username.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'nama.required' => 'Nama harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',
            'bukti_transfer.required' => 'Bukti transfer harus diunggah.',
            'bukti_transfer.image' => 'File bukti transfer harus berupa gambar.',
            'bukti_transfer.mimes' => 'File bukti transfer harus dalam format JPG, JPEG, atau PNG.',
            'bukti_transfer.max' => 'Ukuran file bukti transfer tidak boleh lebih dari 1 MB.',
            'cabangIdn.required' => 'Cabang harus dipilih.',
            'program_idn.required' => 'Program harus dipilih.',
        ]);

        // Additional custom validation for quota full and email already registered
        $cabang = Cabang::find($this->cabangIdn);
        $program = ProgramIdn::find($this->program_idn);

        if ($this->isQuotaFull($cabang, $program)) {
            session()->flash('error', "Kuota untuk {$program->nama_program} di {$cabang->nama_cabang} sudah penuh, silahkan pilih program yang lain.");
            return;
        }

        if ($this->isEmailRegistered($validatedData['username'])) {
            session()->flash('error', 'Email sudah terdaftar, silahkan login disini.');
            return;
        }

        // Handle file upload
        $filePath = $this->bukti_transfer->store('bukti_transfers', 'public');

        // Save data to database
        Pendaftaran::create([
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'cabang_idn' => $this->cabangIdn,
            'program_idn' => $this->program_idn,
            'bukti_transfer' => $filePath,
        ]);

        session()->flash('message', 'Pendaftaran berhasil.');

        // Reset form
        $this->reset(['username', 'password', 'nama', 'jenis_kelamin', 'cabangIdn', 'program_idn', 'bukti_transfer']);
    }

    private function isQuotaFull($cabang, $program)
    {
        // Check if quota is full
        $quotaField = "kuota_{$program->nama_program}";
        return $cabang->$quotaField <= Pendaftaran::where('cabang_idn', $cabang->id)->where('program_idn', $program->id)->count();
    }

    private function isEmailRegistered($email)
    {
        // Check if email is already registered
        return Pendaftaran::where('username', $email)->exists();
    }

    public function render()
    {
        return view('livewire.form-pendaftaran');
    }
}
