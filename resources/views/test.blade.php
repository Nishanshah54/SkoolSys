    <x-layouts.guest.header>
        @php
    $desktopOS = [
        ['label' => 'Windows', 'value' => 25, 'color' => '#4285F4'],
        ['label' => 'macOS', 'value' => 25, 'color' => '#34A853'],
        ['label' => 'Linux', 'value' => 0       , 'color' => '#FBBC05'],
        ['label' => 'Other', 'value' => 50, 'color' => '#EA4335'],
    ];
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<x-ui.pie-chart
    id="osPie"
    :data="$desktopOS"
    :width="300"
    :height="300"
/>

    </x-layouts.guest.header>