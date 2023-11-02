<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            URL EDIT
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <form method="post" action="{{ route('urls.update', $url->id) }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="target_url" :value="__('Target URL')" />
                            <x-text-input id="target_url" name="target_url" value="{{ $url->target_url }}" type="text"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('target_url')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
