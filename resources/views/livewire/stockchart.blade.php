<div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="coin-box mt-15 mb-15">
            <div class="flex align-items-center">
                <div class="coin-icon mr-10">
                    <a href="{{url('/currencies')}}/{{strtolower($assets['id'])}}"><img
                            src="https://cryptoicon-api.vercel.app/api/icon/{{strtolower($assets['symbol'])}}"
                            alt="{{url('/currencies')}}/{{strtolower($assets['id'])}}"></a>
                </div>
                <div class="coin-balance text-left">
                    <h5 class="coin-name boldy"><a
                            href="{{url('/currencies')}}/{{strtolower($assets['id'])}}">{{ $assets['name'] }}</a>
                    </h5>
                    <p class="mb-0">$ {{number_format($assets['priceUsd'],2)}}</p>
                </div>
                <div class="pat-val relative text-right">

                    <?php if(number_format($assets['changePercent24Hr'],2)>=0):?>
                    <h4 class="value blue-orange"><i class="complete fa fa-arrow-up ml-10"></i> $
                        {{number_format($assets['vwap24Hr'],2)}}<span class="mb-0 green-text">increase
                            {{ number_format($assets['changePercent24Hr'],2)}}%</span></h4>
                    <?php else:?>
                    <h4 class="value blue-orange "><i class="cancelled fa fa-arrow-down ml-10"></i> $
                        {{number_format($assets['vwap24Hr'],2)}}<span class="mb-0 red-text">increase
                            {{ number_format($assets['changePercent24Hr'],2)}}%</span></h4>
                    <?php endif?>
                </div>
            </div>
            <script type="text/javascript">
            var dataPoints = [
                []
            ];
            $(function() {
                var request = new XMLHttpRequest()
                request.open('GET',
                    'https://api.coincap.io/v2/assets/<?=$assets['id']?>/history?interval=m1',
                    true)
                request.onload = function() {
                    // Begin accessing JSON data here
                    var data = JSON.parse(this.response)
                    var j = 0
                    for (var i = data.data.length / 4; i < data.data.length; i++) {
                        dataPoints[j] = data['data'][j]['priceUsd']
                        j++
                    }
                    /** This code runs when everything has been loaded on the page */
                    /* Inline sparklines take their values from the contents of the tag */
                    $(".<?=$assets['id']?>").sparkline(dataPoints, {
                        type: 'line',
                        width: '350',
                        height: '60'
                    });
                }
                request.send()
                delete dataPoints;
                delete request;
            });
            </script>
            <div class="watch-chart mt-15">

                <span class="<?=$assets['id']?>"></span>
            </div>
        </div>
    </div>
</div>