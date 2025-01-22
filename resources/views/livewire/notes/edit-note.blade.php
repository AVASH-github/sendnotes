<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component{

    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

public function mount(Note $note)
{
    if (!$note) {
        abort(404, 'Note not found');
    }
    $this->authorize('update', $note);

    // Bind the passed Note instance
    $this->note = $note;

    // Initialize individual properties
    $this->noteTitle = $note->title;
    $this->noteBody = $note->body;
    $this->noteRecipient = $note->recipient;
    $this->noteSendDate = $note->send_date;
    $this->noteIsPublished = $note->is_published;
}


 public function savenote()
{
    $validated = $this->validate([
        'noteTitle' => 'required|string|min:5',
        'noteBody' => 'required|string|min:20',
        'noteRecipient' => 'required|email',
        'noteSendDate' => 'required|date',
    ]);

    // Update the note instance
    $this->note->update([
        'title' => $this->noteTitle,
        'body' => $this->noteBody,
        'recipient' => $this->noteRecipient,
        'send_date' => $this->noteSendDate,
        'is_published' => $this->noteIsPublished,
    ]);

    $this->dispatch('note-saved');
}

    

};?>


    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-3xl mx-auto space-y-4 sm:px-6 lg:px-8 ">              
                    <form wire:submit='savenote' class="space-y-4">
     <x-input label="Note Title" wire:model="noteTitle" />
      <x-textarea label="Your Note"  wire:model="noteBody" />
      <x-input icon="user" label="Recipient"  wire:model="noteRecipient" type="email"/>
      <x-input icon="calendar" label="Send Date" wire:model="noteSendDate" type="date"/>
      <x-checkbox  label="Note Published " wire:model='noteIsPublished' />
      <div class='flex justify-between pt-4'>
      <x-button type="submit" secondary spinner="savenote">Save Notes</x-button>
      <x-button href="{{route('notes.index')}}" flat negative>Back to Notes</x-button>
      </div>
      <x-action-message on="note-saved" />
      <x-errors />
        </form>
                </div>
            </div>
        


