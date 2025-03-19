<div>
    <canvas id="myChart"></canvas>
</div>
<pre>
    {{$val}}
</pre>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '{{$val[0]}}',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            },
                {
                    label: '{{$val[1]}}',
                    data: [1,2,3,4]
                }]
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
