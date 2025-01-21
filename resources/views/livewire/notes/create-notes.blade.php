<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit(){

      $validated=$this->validate([
         'noteTitle'=>'required|string|min:5',
         'noteBody'=>'required|string|min:20',
         'noteRecipient'=>'required|email',
         'noteSendDate'=>'required|date',
   
      ]);

      auth()->user()->notes()->create([
         'title'=> $this->noteTitle,
         'body'=>$this->noteBody,
         'recipient'=>$this->noteRecipient,
         'send_date'=>$this->noteSendDate,
         'is_published'=>false,
         
      ]);
      redirect(route('notes.index'));
    }
}; ?>

<div>
   <form wire:submit='submit' class="space-y-4">
      <x-input label="Title" wire:model="noteTitle" placeholder="It's been a great day"/>
      <x-textarea label="Your Note"  wire:model="noteBody" placeholder="Share all you want"/>
      <x-input icon="user" label="Recipient"  wire:model="noteRecipient" placeholder="yourfriend@email.com"/>
      <x-input icon="calendar" label="Send Date" wire:model="noteSendDate" type="date"/>
      <div class='pt-4'>
      <x-button wire:click='submit' primary icon="calendar" spinner> Submit</x-button>
      </div>
      <x-errors />
   </form>
</div>
