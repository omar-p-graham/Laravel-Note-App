<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Note: View') }}
        </h2>
    </x-slot>

    <div class="w-full px-4 py-12">
        @session('message')
            <div class="mx-auto mb-4 lg:px-8 max-w-7xl sm:px-6 animate-disappear">
                <x-alert>{{session('message')}}</x-alert>
            </div>
        @endsession
        <div class="mx-auto lg:px-8 max-w-7xl sm:px-6">
            <a href="{{route('dashboard')}}"><x-secondary-button>Cancel</x-secondary-button></a>
        </div>
        <div class="p-4 mx-auto mt-3 bg-white border-b border-gray-100 rounded-md lg:px-8 max-w-7xl sm:px-6 dark:bg-gray-400 dark:border-black dark:text-black">
            <div class="flex justify-end mb-3">
                <a href="{{route('note.pdf',$note)}}" target="_blank">
                    <x-secondary-button class="dark:border-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"></path><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z"></path></svg>
                        PDF
                    </x-secondary-button>
                </a>
            </div>
            <div class="flex justify-between">
                <div class="">
                    <h1 class="text-lg underline">NOTE CREATED</h1>
                    <p>{{$note->created_at->format('F d, Y [h:i:s A]')}}</p>
                </div>
                @if ($note->created_at != $note->updated_at)
                    <div class="">
                        <h1 class="text-lg underline">LAST MODIFIED</h1>
                        <p>{{$note->updated_at->format('F d, Y [h:i:s A]')}}</p>
                    </div>
                @endif
            </div>
            <div class="mt-6">
                <h1 class="text-lg underline">NOTE TITLE</h1>
                <p>{{$note->title}}</p>
            </div>
            <div class="mt-6">
                <h1 class="text-lg underline">NOTE DETAILS</h1>
                <p>{{$note->note}}</p>
            </div>
            <hr class="mt-4 mb-2">
            <div class="flex gap-4 py-2">
                <a href="{{route('note.edit',$note->id)}}"><x-primary-button>Edit</x-primary-button></a>
                <form action="{{route('note.destroy',$note)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a onclick="return confirm('Are you sure?')" href="#"><x-danger-button>Delete</x-danger-button></a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
