@props([
    'id' => 'pieChart',
    'width' => 200,
    'height' => 200,
    'data' => [],
    'formatter' => null,
])

<canvas id="{{ $id }}" width="{{ $width }}" height="{{ $height }}"></canvas>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('{{ $id }}').getContext('2d');

        const chartData = @json($data);

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartData.map(item => item.label),
                datasets: [{
                    data: chartData.map(item => item.value),
                    backgroundColor: chartData.map(item => item.color || '#888'),
                }],
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                @if ($formatter)
                                    return {!! $formatter !!}(value);
                                @else
                                    return value;
                                @endif
                            }
                        }
                    }
                }
            }
        });
    });
</script>
