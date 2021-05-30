@extends('Wrapper')
@section('content')
<section id="main-content" class="">
    <div class="wrapper main-wrapper row" style="">
        <livewire:search :assets="$assets" />

        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Transactions History</h2>
                    <div class="actions panel_actions pull-right">
                        <a class="box_toggle fa fa-chevron-down"></a>
                    </div>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php $assets = [
                                'coin' => $assets,
                                'url'=> $page
                            ]?>
                            <livewire:cryptolist :assets="$assets" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- MAIN CONTENT AREA ENDS -->
    </div>
</section>
@endsection