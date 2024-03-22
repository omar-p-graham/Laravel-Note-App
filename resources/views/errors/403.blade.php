<x-app-layout>
    <div class="w-full py-12">
        <div class="px-8 mx-auto max-w-7xl sm:px-6">
            <a href="{{route('dashboard')}}"><x-secondary-button>Cancel</x-secondary-button></a>
        </div>
        <div class="px-8 py-4 mx-auto mt-3 bg-white border-b border-gray-100 rounded-md max-w-7xl sm:px-6 dark:bg-gray-400 dark:text-black">
            <div class="mx-auto max-w-fit">
                <h1 class="mb-2 text-xl font-extrabold text-center">FORBIDDEN REQUEST</h1>
                <p class="mb-4 text-center">You are not authorized to perform this action based on one or more of the following:</p>
                <ul>
                    <li>~ You are not authorized to view this note</li>
                    <li>~ You are not authorized to modify this note</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
