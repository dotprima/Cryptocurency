<div>
    <div class='col-xs-12'>
        <div class="page-title">
            <div class="input-group">
                <form wire:submit.prevent="search">
                    <input type="text" wire:model="search" class="form-control animated fadeIn" size="100%"
                        style="border-radius:10px" placeholder="Search & Enter">
                </form>
            </div>
        </div>
    </div>
    @if (!$search=='')
    <section class="box " style="border-radius: 20px">
        <div class="content-body">
            <h4 class="title" style="margin-left: 20px">Search</h4>
            @for ($i = 0; $i < 3; $i++) <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="ask-box v2 active mt-15">
                    <div class="ask-circle">
                        <img src="https://cryptoicon-api.vercel.app/api/icon/{{strtolower($result[$i][4])}}" alt="">
                    </div>
                    <a href="{{url('/currencies')}}/{{strtolower($result[$i][2])}}">
                        <div class="ask-info">
                            <h3 class="w-text boldy mt-15">{{$result[$i][1]}}</h3>
                            <p class="g2-text mb-0">$ {{number_format($result[$i][3],2)}}</p>
                        </div>
                        <div class="ask-arrow">
                            <?php if($result[$i][5]>=0):?>
                            <a href=""><span><i class="fas fa-angle-double-up" style="color:green"></i></span></a>
                            <?php else:?>
                            <a href=""><span><i class="fas fa-angle-double-down" style="color:red"></i></span></a>
                            <?php endif?>
                        </div>
                    </a>
                </div>
        </div>
        @endfor
    </section>
</div>
@endif
</div>