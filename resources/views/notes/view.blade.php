<x-guest-layout>

    <div class="flex justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{$note->title}}
        </h2>
    </div>
    <p class="mt-4 ">{{$note->body}}</p>
    <div class="flex items-center justify-end mt-12 ">
        <h3 class="mr-2 text-sm">Sent form {{$user->name}}</h3>
        <livewire:heartreact :note="$note">
    </div>
<x-button flat icon="arrow-left" class="mt-8" href="{{route('notes.index')}}">All Notes</x-button>
</x-guest-layout>
 