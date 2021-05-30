<div>
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
                width: '300',
                height: '60'
            });
        }
        request.send()
        delete dataPoints;
        delete request;
    });
    </script>


    <span class="<?=$assets['id']?>"></span>

</div>