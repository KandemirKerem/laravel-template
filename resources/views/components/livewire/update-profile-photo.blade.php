<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
new class extends Component {

    use WithFileUploads;

    public $photo;

    public function updatedPhoto()
    {


        $this->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // Max 1MB

        ]);

        $path = $this->photo->store('profile-photos', 'public');

        auth()->user()->update([
            'profile_photo' => $path
        ]);

        $this->dispatch('profile-updated');
    }



    public function deletePhoto()
    {
        $user = auth()->user();


        if ($user->profile_photo) {

        if (Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

            $user->update([
                'profile_photo' => null
            ]);

            $this->photo = null;

            $this->dispatch('profile-updated');
        }
    }
};

?>

<div class="relative w-28 h-28 mx-auto">
    <img
        src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('storage/profile-photos/default_pp.jpg') }}"
        class="w-28 h-28 rounded-3xl object-cover" alt="Profil">

    <label
        class="hover:shadow-lg transition-all duration-300 absolute -bottom-5 -right-10 px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold shadow-sm cursor-pointer">
        Change
        <input type="file" wire:model="photo" class="hidden">
    </label>

    <div class="hover:shadow-lg transition-all duration-300 absolute -bottom-5 -left-5 right--2 px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold shadow-sm cursor-pointer">
        <button
            type="button"
            wire:click="deletePhoto"
            wire:confirm="Profil fotoğrafınızı silmek istediğinize emin misiniz kanka?"
            class="text-xs font-medium text-red-500 hover:text-red-700 transition-colors duration-200"
        >
            Clear
        </button>
    </div>
</div>
