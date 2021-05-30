<div class="table-responsive" data-pattern="priority-columns">
    <table id="tech-companies-1" class="table vm trans table-small-font no-mb table-bordered table-striped">
        <thead>
            <tr>
                <th>Crypto Trade</th>
                <th>Price </th>
                <th>24h %</th>
                <th>Peredaran Suplai</th>
                <th>Kap Pasar</th>
                <th>Volume(24h)</th>
                <th>graph</th>
            </tr>
        </thead>
        <tbody>
            <?php $page = 10?>
            <?php for($i=($assets['url']-1)*$page ;$i<$page*$assets['url'] ; $i++):?>
            <tr>
                <td>
                    <div class="round img2">
                        <a href="{{url('/currencies')}}/{{strtolower($assets['coin'][$i]['id'])}}"><img
                                src="https://cryptoicon-api.vercel.app/api/icon/{{strtolower($assets['coin'][$i]['symbol'])}}"
                                alt=""></a>
                    </div>
                    <div class="designer-info">
                        <a href="{{url('/currencies')}}/{{strtolower($assets['coin'][$i]['id'])}}">
                            <h6>{{$assets['coin'][$i]['name']}}</h6>
                        </a>
                    </div>
                </td>
                <td class="black-text boldy">$ {{number_format($assets['coin'][$i]['priceUsd'],2)}}</td>
                <?php if(number_format($assets['coin'][$i]['changePercent24Hr'],2)>=0):?>
                <td><span class="badge w-70 round-success">
                        +{{number_format($assets['coin'][$i]['changePercent24Hr'],2)}}</span></td>
                </td>
                <?php else:?>
                <td><span class="badge w-70 round-danger">
                        {{number_format($assets['coin'][$i]['changePercent24Hr'],2)}}</span></td>
                </td>
                <?php endif?>
                <td class="black-text bold">$ {{number_format($assets['coin'][$i]['supply'],2)}}
                </td>
                <td class="black-text boldy">$ {{number_format($assets['coin'][$i]['marketCapUsd'],2)}}</td>
                <td class="Black-text boldy">$ {{number_format($assets['coin'][$i]['volumeUsd24Hr'],2)}}</td>
                <td>
                    <livewire:graphlite :assets="$assets['coin'][$i]">
                </td>
            </tr>
            <?php endfor?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if($assets['url']>=2):?>
            <li class="page-item"><a class="page-link"
                    href="http://127.0.0.1:8000/currencies/page/<?=$assets['url']-1?>">Previous</a>
            </li>
            <?php endif?>
            <?php if($assets['url'] >= 6){
                $temp = 6;
            }else{
                $temp = $assets['url'];
            }?>

            <?php for($i=$temp ;$i<$assets['url']+6 ; $i++):?>
            <?php if($i == $assets['url']):?>
            <li class="page-item active" aria-current="page"><a class="page-link"
                    href="http://127.0.0.1:8000/currencies/page/<?=$i?>">{{$i}}</a>
            </li>
            <?php else:?>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/currencies/page/<?=$i?>">{{$i}}</a>
            </li>
            <?php endif?>
            <?php if($i == 10){
                break;
            }?>
            <?php endfor?>
        </ul>
    </nav>
</div>