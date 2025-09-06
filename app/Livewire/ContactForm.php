<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $message;
    public $captchaInput;

    public $captchaCode;

    protected $rules = [
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email', 'max:100'],
        'phone' => ['required', 'string', 'min:10', 'max:15'],
        'address' => ['nullable', 'string', 'max:255'],
        'message' => ['required', 'string', 'min:10', 'max:2000'],
        'captchaInput' => ['required', 'integer'],
    ];

    public function mount()
    {
        $this->generateCaptcha();
    }

    public function generateCaptcha()
    {
        $this->captchaCode = rand(100000, 999999);
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->message = '';
        $this->captchaInput = '';
        $this->generateCaptcha();
    }

    public function saveContact()
    {
        $this->validate();

        if ($this->captchaInput != $this->captchaCode) {

            $this->addError('captchaInput', 'Kode CAPTCHA tidak sesuai.');
            return;
        }

        ContactMessage::create([
            'name'    => strip_tags($this->name),
            'email'   => strip_tags($this->email),
            'phone'   => strip_tags($this->phone),
            'address' => strip_tags($this->address),
            'message' => strip_tags($this->message),
        ]);

        session()->flash('success', 'Pesan Anda telah berhasil terkirim. Terima kasih!');

        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
