<div class="flex justify-center px-4 py-6">
    <div class="w-full max-w-md bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-gray-700 rounded-xl p-4 sm:p-6">
        <form wire:submit.prevent="{{ $this->isEdit ? 'update' : 'store' }}" class="space-y-4">
            {{-- Success Flash Message --}}
            @if (session()->has('success'))
                <div class="p-2 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100 text-sm rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input wire:model.defer="name" type="text" required placeholder="Full Name"
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
                @error('name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input wire:model.defer="email" type="email" required placeholder="Email Address"
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
                @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                <input wire:model.defer="mobile_number" type="text" required placeholder="e.g. +1234567890"
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
                @error('mobile_number') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                <select wire:model.defer="gender" required
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                @error('gender') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- DOB --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                <input wire:model.defer="dob" type="date" required
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
                @error('dob') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                <textarea wire:model.defer="address" required rows="2"
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100"></textarea>
                @error('address') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Qualification --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Qualification</label>
                <select wire:model.defer="qualification" required
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
                    <option value="">Select Qualification</option>
                    <option value="B.Ed">B.Ed</option>
                    <option value="M.Ed">M.Ed</option>
                    <option value="Ph.D">Ph.D</option>
                    <option value="M.Sc">M.Sc</option>
                </select>
                @error('qualification') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Specialization --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Specialization</label>
                <input wire:model.defer="specialization" type="text" required placeholder="e.g. Mathematics"
                    class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
                @error('specialization') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Submit Button --}}
            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 border border-gray-300 dark:border-gray-700 rounded-md hover:opacity-90 transition">
                    {{ $this->isEdit ? 'Update Teacher' : 'Add Teacher' }}
                </button>
            </div>
        </form>
    </div>
</div>
