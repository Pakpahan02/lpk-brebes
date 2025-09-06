<?php

namespace App\Livewire\CMS;

use App\Models\Footer;
use Livewire\Component;

class FooterSettings extends Component
{
    public $address;
    public $facebook;
    public $instagram;
    public $linkedin;

    public function mount()
    {
        $footer = Footer::firstOrNew([]);

        $this->address = $footer->address;
        $this->facebook = $footer->facebook;
        $this->instagram = $footer->instagram;
        $this->linkedin = $footer->linkedin;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'address' => ['nullable', 'string'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
        ]);

        Footer::updateOrCreate(['id' => 1], $validatedData);

        session()->flash('success', 'Data footer berhasil diperbaharui');
    }

    public function render()
    {
        return view('livewire.c-m-s.footer-settings');
    }
}
