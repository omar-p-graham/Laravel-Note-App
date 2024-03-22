<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="w-full px-4 py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{route('dashboard')}}"><x-secondary-button>Cancel</x-secondary-button></a>
        </div>
        <div class="px-4 mx-auto mt-3 bg-white rounded-md max-w-7xl sm:px-6 lg:px-8 dark:bg-gray-400">
            <form action="{{route('note.store')}}" method="POST" class="p-4 mx-auto lg:w-1/2 sm:w-3/4 ">
                @csrf
                <div class="w-full">
                    <x-input-label for="title">Note Title</x-input-label>
                    <x-text-input id="title" name="title" class="w-full dark:bg-gray-400 dark:border-black dark:text-black"></x-text-input>
                    <x-input-error-field>
                        @if($errors->has('title'))
                            {{$errors->first('title')}}
                        @endif
                    </x-input-error-field>
                </div>
                <div class="w-full">
                    <x-input-label for="note">Note Detail</x-input-label>
                    <x-text-area id="note" name="note" class="w-full" rows="10"></x-text-area>
                    <x-input-error-field>
                        @if($errors->has('note'))
                            {{$errors->first('note')}}
                        @endif
                    </x-input-error-field>
                </div>
                <div class="mt-3`">
                    <x-primary-button>Create</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
