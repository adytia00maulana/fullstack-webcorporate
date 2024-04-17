<script>
  if(document.getElementById("myChart")){
    var statistics_chart = document.getElementById("myChart").getContext('2d');

    var myChart = new Chart(statistics_chart, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
          label: 'Statistics',
          data: [
            <?= $countVisitorUserJanuary ?? 0 ?>,
            <?= $countVisitorUserFebruary ?? 0 ?>,
            <?= $countVisitorUserMarch ?? 0 ?>,
            <?= $countVisitorUserApril ?? 0 ?>,
            <?= $countVisitorUserMay ?? 0 ?>,
            <?= $countVisitorUserJune ?? 0 ?>,
            <?= $countVisitorUserJuly ?? 0 ?>,
            <?= $countVisitorUserAugust ?? 0 ?>,
            <?= $countVisitorUserSeptember ?? 0 ?>,
            <?= $countVisitorUserOctober ?? 0 ?>,
            <?= $countVisitorUserNovember ?? 0 ?>,
            <?= $countVisitorUserDecember ?? 0 ?>
          ],
          borderWidth: 5,
          borderColor: '#6777ef',
          backgroundColor: 'transparent',
          pointBackgroundColor: '#fff',
          pointBorderColor: '#6777ef',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              stepSize: 200
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2
            }
          }]
        },
      }
    });
  }
</script>