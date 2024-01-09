<div class="col-md-12 shadow-sm">
    <div class="col-md-3">
        <div class="card shadow-md rounded">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3 p-4 mr-2">
                        <i class="fas fa-users mt-2" style="font-size: 49px; color: #4E9170; "></i>
                    </div>
                    <div class="col-md-9 p-4 ml-2">
                        <h6 class="text-muted mb-1">{{__('Total Shareholders')}}</h6>
                        @if($shareHolders)
                        <span class="h3 font-weight-bold mb-0">{{ $shareHolders }}</span>
                        @else
                        <span class="h3 font-weight-bold mb-0">0</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-md rounded">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 p-4 mr-2">
                        <i class="fas fa-user-secret mt-2" style="font-size: 49px; color: #7A7978;"></i>
                    </div>
                    <div class="col-md-9 p-4 ml-2">
                        <h6 class="text-muted mb-1">{{__('Total Proxy')}}</h6>
                        @if($shareHolders)
                        <span class="h3 font-weight-bold mb-0">{{ $proxy }}</span>
                        @else
                        <span class="h3 font-weight-bold mb-0">0</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-md rounded">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 p-4 mr-2">
                        <i class="fas fa-chart-pie mt-2" style="font-size: 49px; color: #DF9054;"></i>
                    </div>
                    <div class="col-md-9 p-4 ml-2">
                        <h6 class="text-muted mb-1">{{__('Total Shares')}}</h6>
                        <span class="h3 font-weight-bold mb-0">{{ $totalshares }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>