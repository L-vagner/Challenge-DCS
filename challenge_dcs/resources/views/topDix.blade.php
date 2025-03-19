@extends('layout/master')
@section('title')
    <title>Top Dix</title>
@endsection

@section('content')
<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    let data = JSON.parse(' {!! json_encode($val) !!} ');

    new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [
                {
                    data: data,
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, ticks) {
                            return Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]) + '€';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>