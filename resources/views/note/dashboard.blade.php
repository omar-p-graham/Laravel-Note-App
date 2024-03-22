<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full py-12">
        @session('message')
            <div class="mx-auto mb-4 lg:px-8 max-w-7xl sm:px-6 animate-disappear">
                <x-alert>{{session('message')}}</x-alert>
            </div>
        @endsession
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{route('note.create')}}"><x-primary-button type="button" class="dark:border-white">New Note</x-primary-button></a>
        </div>
        <div class="grid justify-center gap-4 p-4 mx-auto mt-4 border-t-4 border-gray-700 md:grid-cols-3 sm:grid-cols-2 max-w-7xl sm:px-6 lg:px-8">
            @foreach ($notes as $note)
                <div class="grid px-3 py-2 bg-white border border-black border-solid rounded-md dark:bg-gray-400 hover:shadow-lg dark:hover:shadow-slate-300">
                    <small class="block mb-2 text-end">{{$note->created_at->format('Y-m-d')}}</small>
                    <h3 class="py-0 font-semibold border-y-2">{{$note->title}}</h3>
                    <div class="my-6">
                        {{Str::words($note->note, 30)}}
                    </div>
                    <div class="py-2 mt-2">
                        <a href="{{route('note.show', $note->id)}}"><x-primary-button>View</x-primary-button></a>
                        <a href="{{route('note.edit', $note->id)}}"><x-secondary-button>Edit</x-secondary-button></a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$notes->links()}}
    </div>
</x-app-layout>
