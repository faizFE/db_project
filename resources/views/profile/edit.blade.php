<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-[#C4E2F5] w-full shadow-[0_2px_8px_rgba(0,0,0,0.3)] p-5 rounded-[10px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-[#C4E2F5] w-full shadow-[0_2px_8px_rgba(0,0,0,0.3)] p-5 rounded-[10px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-[#C4E2F5] w-full shadow-[0_2px_8px_rgba(0,0,0,0.3)] p-5 rounded-[10px]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
