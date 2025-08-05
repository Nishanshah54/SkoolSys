<x-layouts.app :title="__('Create Subject')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <h1 class="text-xl font-semibold">Create Subject</h1>

        <form method="POST" action="{{ route('subjects.store') }}"
              class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow space-y-4">
            @csrf

            <div>
                <label for="name" class="block mb-1 text-sm font-medium">Subject Name</label>
                <x-ui.input type="text" name="name" id="name" value="{{ old('name') }}" required />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('subjects.index') }}">
                    <x-ui.button variant="outline">Cancel</x-ui.button>
                </a>
                <x-ui.button type="submit" variant="solid">Create</x-ui.button>
            </div>
        </form>

    </div>
</x-layouts.app>
