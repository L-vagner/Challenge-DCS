@extends('layout/master')

@section('title')
    <title>Evolution des volumes</title>
@endsection

@section('content')
<h2 style="text-align: center;">Evolution des volumes des produits 1_1 et 1_4</h2>
<div>
    <canvas id="myChart" style="max-height: 75vh;"></canvas>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        let data = JSON.parse(' {!! json_encode($val) !!}  ');
        console.log(data);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: '',
                datasets: [
                    @foreach ($val as $key => $_)
                                                {
                        label: '{{ $key }}',
                        data: data.{{ $key }}
                                },
                    @endforeach
                            ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection