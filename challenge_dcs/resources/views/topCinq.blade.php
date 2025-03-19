@extends('layout/master')

@section('title')
<title>Top Cinq</title>
@endsection
@section('content')


<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    var data = JSON.parse(' {!! json_encode($val) !!} ');
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [
                @foreach ($val as $key => $_)
                    {
                        label: 'Client {!! $key !!}',
                        data: data[{!! $key !!}],
                    },
                @endforeach
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks:{
                        callback:function(value, index, ticks){
                            return Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]) +'€';
                        }
                    }
                }
            }
        }
    });
</script>

@endsection