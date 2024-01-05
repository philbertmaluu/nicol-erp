<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image" href="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png">
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- --------- tiny slider css ------ -->
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <!-- --------- font awsome css ------ -->
    <!-- fontWesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- -------- venobox css ------- -->
    <link rel="stylesheet" href="assets/css/venobox.css" type="text/css" media="screen" />
    <!-- ---- Bootstrap css--- -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- ---------- default css --------- -->
    <link rel="stylesheet" href="assets/css/default.css">
    <!-- --- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Shares Holders', 'Shares', 'Proxy', 'Debit', 'Average'],
                ['2021/07', 157, 1167, 587, 807, 623],
                ['2022/08', 139, 1110, 615, 968, 609.4],
                ['2023/09', 136, 691, 629, 1026, 569.6]
            ]);

            var options = {
                title: 'ANNUAL GENERAL MEETING ANALYTICS',
                vAxis: {
                    title: ''
                },
                hAxis: {
                    title: 'Year'
                },
                seriesType: 'bars',
                series: {
                    5: {
                        type: 'line'
                    }
                }
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

</head>

<body>

    @include('includes.navmenu')
    <div class=" container-fluid">
        <div class="row">
            @include('includes.sidebar')
            <div class="col-md-9">
                <div class="container mt-4  p-3">
                    <div class="row">
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


                        <div class="col-md-3">
                            <div class="card shadow-md rounded">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 p-4 mr-2">
                                            <i class="fas fa-user-tie mt-2" style="font-size: 49px; color: #4DA6D5;"></i>
                                        </div>
                                        <div class="col-md-9 p-4 ml-2">
                                            <h6 class="text-muted mb-1">{{__('Total Agents')}}</h6>
                                            <span class="h3 font-weight-bold mb-0">{{ $agent }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-------------start of the graphs ---------------------------->
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-9 shadow-md">
                                    <div class="container shadow-md rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div id="chart_div" style="width: 900px; height: 500px;"></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 shadow-md">
                                    <div class="container shadow-md rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>