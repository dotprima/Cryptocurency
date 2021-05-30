@extends('Wrapper')
@section('content')

<section id="main-content" class=" ">
    <div class="wrapper main-wrapper row" style=''>

        <livewire:search :assets="$assets" />

        <div class="clearfix"></div>
        <!-- MAIN CONTENT AREA STARTS -->

        <div class='col-xs-12'>

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h4 class="title boldy mb-5 mt-15">Cryptocurency</h4>
                <h6 class="title boldy mb-5 mt-15">24h %</h6>
                <!-- PAGE HEADING TAG - END -->
            </div>

        </div>


        <?php for($i = 0; $i < 6; $i++):?>
        <?php $rand = rand(0, count($assets)) ?>
        <livewire:stockchart :assets="$assets[$rand]" />

        <?php endfor?>


    </div>


    <div class="col-lg-8">
        <section class="box" style="overflow:hidden">
            <script type="text/javascript">
            window.onload = function() {
                var dataPoints = [];
                var stockChart = new CanvasJS.StockChart("stockChartContainer", {
                    title: {
                        text: "Bitcoin"
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
                $.getJSON("https://api.coincap.io/v2/assets/bitcoin/history?interval=d1", function(json) {
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
            <div id="stockChartContainer" style="height: 500px; width: 100%;"></div>
        </section>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">TOP 6 Crypto</h2>
                <div class="actions panel_actions pull-right">
                    <a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?php for($i = 0; $i < 6; $i++):?>
                        <div class="coin-box2 flex align-items-center">
                            <div class="coin-icon mr-10">
                                <a href="{{url('/currencies')}}/{{strtolower($assets[$i]['id'])}}"><img
                                        src="https://cryptoicon-api.vercel.app/api/icon/{{strtolower($assets[$i]['symbol'])}}"
                                        alt="{{url('/currencies')}}/{{strtolower($assets[$i]['id'])}}"></a>
                            </div>

                            <h5 class="coin-name boldy">{{ $assets[$i]['name'] }} </h5>
                            <h5 class="coin-price boldy">${{number_format($assets[$i]['priceUsd'],2)}}</h5>
                            <?php if(number_format($assets[$i]['changePercent24Hr'],2)>=0):?>
                            <p class="mb-0 green-text">{{ number_format($assets[$i]['changePercent24Hr'],2)}}%
                                <i class="complete fa fa-arrow-up ml-10"></i>
                            </p>
                            <?php else:?>
                            <p class="mb-0 red-text">{{ number_format($assets[$i]['changePercent24Hr'],2)}}%
                                <i class="cancelled fa fa-arrow-down ml-10"></i>
                            </p>
                            <?php endif?>
                        </div>
                        <?php endfor?>
                    </div>
                </div> <!-- End .row -->
            </div>
        </section>
    </div>

    <div class="clearfix"></div>

    <div class="col-xs-12 col-md-4">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Transactions Status</h2>
                <div class="actions panel_actions pull-right">
                    <a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body pb10">
                <div class="row">
                    <div class="col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 mb-20">
                        <canvas id="donut-chartjs" width="400" height="400"></canvas>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="token-info">
                            <div class="info-wrapper three">
                                <div class="token-descr">
                                    <h3 class="bold mt-0 mb-0">44%</h3>
                                    Completed
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="token-info">
                            <div class="info-wrapper five">
                                <div class="token-descr">
                                    <h3 class="bold mt-0 mb-0">34%</h3>
                                    Pending
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="token-info">
                            <div class="info-wrapper two">
                                <div class="token-descr">
                                    <h3 class="bold mt-0 mb-0">22%</h3>
                                    Cancelled
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="token-info">
                            <div class="info-wrapper default">
                                <div class="token-descr">
                                    <h3 class="bold mt-0 mb-0">14%</h3>
                                    Others
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="r1_graph1 db_box db_box_large has-shadow2 mt-15">
                    <div class="pat-info-wrapper">
                        <div class="pat-info text-left">
                            <h5 class=''>Total Funds</h5>
                            <h6>Complete transactions</h6>
                        </div>
                        <div class="pat-val relative">
                            <h4 class="value blue-text"><i class="complete fa fa-arrow-up"></i>124%<span>increase
                                    By</span></h4>
                        </div>
                    </div>
                    <span class="sparkline15">Loading...</span>
                </div>
            </div>

            <div class="col-lg-6 col-xs-12">
                <div class="r1_graph1 db_box db_box_large has-shadow2 mt-15">
                    <div class="promp-box text-center">
                        <img src="data/crypto-dash/crypto-wallet.png" alt="">
                        <h4 class="boldy mt-20 mb-10">Start crypto trading Today</h4>
                        <p>Lorem ipsum dolor sit amet, Eveniet magni sit explicabo Quo nihil atque.</p>
                        <div class="form-group no-mb">
                            <a href="crypto-trading.html" class="btn btn-primary btn-lg mt-20 gradient-blue"
                                style="width:100%"> Start Trading</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <div class="ask-box active">
                    <div class="ask-circle">
                        <img src="data/crypto-dash/crypto-buy.png" alt="">
                    </div>
                    <div class="ask-info">
                        <h3 class="w-text bold">Buy & Sell Crypto Directly and Easily</h3>
                        <p class="g2-text mb-0">lorem ipsum dolor sit elit. Perferendis veniam
                            exercitationem ducimus magni distinctio sit explicabo.</p>
                    </div>
                    <div class="ask-arrow">
                        <a href="crypto-buy-sell.html"><span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-lg-6">
        <section class="box">
            <header class="panel_header">
                <h2 class="title pull-left">Recent Activities</h2>
                <div class="actions panel_actions pull-right">
                    <a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1"
                                class="table vm table-small-font no-mb table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Crypto Orders</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/p1.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Buy Record</h6>
                                                <small class="text-muted"><span class="mr-10">11-26</span>
                                                    10:23:45</small>
                                            </div>
                                        </td>
                                        <td><span class="badge  w-70 round-success">completed</span></td>
                                        <td class="green-text boldy">+3,800$</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/p2.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Sell Record</h6>
                                                <small class="text-muted"><span class="mr-10">11-25</span>
                                                    12:53:25</small>
                                            </div>
                                        </td>
                                        <td><span class="badge w-70 round-warning">Pending</span></td>
                                        <td class="red-text boldy">-1,760$</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/p3.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Exchange Record</h6>
                                                <small class="text-muted"><span class="mr-10">11-24</span>
                                                    04:03:25</small>
                                            </div>
                                        </td>
                                        <td><span class="badge w-70 round-primary">exchanged </span></td>
                                        <td class="blue-text boldy">+20,760$</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/p1.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Buy Record</h6>
                                                <small class="text-muted"><span class="mr-10">11-22</span>
                                                    09:33:02</small>
                                            </div>
                                        </td>
                                        <td><span class="badge w-70 round-danger">Canceled</span></td>
                                        <td class="green-text boldy">+10,760$</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/p2.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Buy Record</h6>
                                                <small class="text-muted"><span class="mr-10">11-22</span>
                                                    09:33:02</small>
                                            </div>
                                        </td>
                                        <td><span class="badge w-70 round-success">Completed</span></td>
                                        <td class="red-text boldy">-8,760$</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="col-lg-6">
        <section class="box">
            <header class="panel_header">
                <h2 class="title pull-left">Transactions History</h2>
                <div class="actions panel_actions pull-right">
                    <a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1"
                                class="table vm trans table-small-font no-mb table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Crypto Trade</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin1.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Bitcoin</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">10:23:45</small></td>
                                        <td><span class="badge  w-70 round-success">completed</span></td>
                                        <td class="green-text boldy">+0,041BTC</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin8.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Litecoin</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">12:53:25</small></td>
                                        <td><span class="badge w-70 round-warning">Pending</span></td>
                                        <td class="red-text boldy">-1,176LTC</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin2.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Ethereum</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">04:03:25</small></td>
                                        <td><span class="badge w-70 round-primary">exchanged </span></td>
                                        <td class="blue-text boldy">0.023ETH</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin4.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Ripple</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted"> 09:33:02</small></td>
                                        <td><span class="badge w-70 round-danger">Canceled</span></td>
                                        <td class="green-text boldy">+107,0XRP</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin1.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Bitcoin</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">10:23:45</small></td>
                                        <td><span class="badge  w-70 round-warning">pending</span></td>
                                        <td class="green-text boldy">-0,098BTC</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin3.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Dashcoin</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">09:33:02</small></td>
                                        <td><span class="badge w-70 round-success">Completed</span></td>
                                        <td class="red-text boldy">-2,76DAH</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="round img2">
                                                <img src="data/crypto-dash/coin5.png" alt="">
                                            </div>
                                            <div class="designer-info">
                                                <h6>Bitdash</h6>
                                            </div>
                                        </td>
                                        <td><small class="text-muted">09:33:02</small></td>
                                        <td><span class="badge w-70 round-success">Completed</span></td>
                                        <td class="green-text boldy">+1,429DAH</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>



    <div class="clearfix"></div>

    <!-- MAIN CONTENT AREA ENDS -->
    </div>
</section>
@endsection