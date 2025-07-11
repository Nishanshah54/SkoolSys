    <x-layouts.guest.header>
        @php
    $desktopOS = [
        ['label' => 'Windows', 'value' => 25, 'color' => '#4285F4'],
        ['label' => 'macOS', 'value' => 25, 'color' => '#34A853'],
        ['label' => 'Linux', 'value' => 0       , 'color' => '#FBBC05'],
        ['label' => 'Other', 'value' => 50, 'color' => '#EA4335'],
    ];
@endphp
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


<x-ui.pie-chart
    id="osPie"
    :data="$desktopOS"
    :width="300"
    :height="300"
/>
<script src="//unpkg.com/alpinejs" defer></script>
<div class="w-64 h-screen bg-gray-800 p-4 space-y-2" x-data="{ openIndex: null }" @toggle-sidebar.window="openIndex = $event.detail.index">

    <a href="" class="block px-4 py-2 hover:bg-gray-700 rounded text-white">Dashboard</a>

 <x-sidebar-dropdown title="Users" :index="1" :active-index="1">
        <a href=""  class="block px-4 py-2 hover:bg-gray-600 rounded text-white">All Users</a>
        <a href=""  class="block px-4 py-2 hover:bg-gray-600 rounded text-white">Add New</a>
    </x-sidebar-dropdown>

    <x-sidebar-dropdown title="Settings" :index="2" :active-index="null">
        <a href="" class="block px-4 py-2 hover:bg-gray-600 rounded text-white">Profile</a>
        <a href="" class="block px-4 py-2 hover:bg-gray-600 rounded text-white">Account</a>
    </x-sidebar-dropdown>
</div>


    </x-layouts.guest.header>
