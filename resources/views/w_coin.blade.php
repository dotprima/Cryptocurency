@extends('Wrapper')
@section('content')
<section id="main-content" class=" ">
    <div class="wrapper main-wrapper row" style=''>

        <livewire:search :assets="$assets" />

        <div class='col-xs-12'>

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h4 class="title boldy mb-5 mt-15">Top 6 Coin</h4>
                <!-- PAGE HEADING TAG - END -->
            </div>

        </div>


        <livewire:stockchart :assets="$assets[0]" />
        <livewire:stockchart :assets="$assets[1]" />
        <livewire:stockchart :assets="$assets[2]" />
        <livewire:stockchart :assets="$assets[3]" />
        <livewire:stockchart :assets="$assets[4]" />
        <livewire:stockchart :assets="$assets[5]" />

        <div class="clearfix"></div>
        <!-- MAIN CONTENT AREA STARTS -->

        <div class="col-lg">
            <section class="box" style="overflow:hidden">
                <script type="text/javascript">
                window.onload = function() {
                    var dataPoints = [];
                    var stockChart = new CanvasJS.StockChart("stockChartContainer", {
                        title: {
                            text: "<?=$coin?>"
                        },
                        charts: [{
                            data: [{
                                type: "splineArea",
                                color: "#3698C5",
                                yValueFormatString: "$1 = $#,###.##",
                                dataPoints: dataPoints
                            }]
                        }],
                        navigator: {
                            slider: {
                                minimum: new Date(2015, 00, 01),
                                maximum: new Date(2016, 00, 01)
                            }
                        }
                    });
                    $.getJSON("https://api.coincap.io/v2/assets/<?=$coin?>/history?interval=d1", function(json) {
                        for (var i = 0; i < json.data.length - 2; i++) {
                            dataPoints.push({
                                x: new Date(json.data[i].date),
                                y: Number(json.data[i].priceUsd)
                            });
                        }
                        stockChart.render();
                    });
                }
                </script>
                <div id="stockChartContainer" style="height: 450px; width: 100%;"></div>
            </section>
        </div>

        <!-- MAIN CONTENT AREA ENDS -->
    </div>
</section>
@endsection