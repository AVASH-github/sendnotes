<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
     public Note $note;
     public $heartCount;

        public function mount(Note $note){

            $this->note=$note;
            $this->heartCount= $note->heart_count;
        }

        public function increaseHeartCount()
        {
         // Increment the heart count in the database
    $this->note->increment('heart_count');

    // Retrieve the updated heart count and store it in $heartCount
    $this->heartCount = $this->note->heart_count;
        }

}; ?>

<div>
    <x-button xs wire:click='increaseHeartCount' rose icon="heart" spinner>{{$heartCount}}</x-button>
</div>
