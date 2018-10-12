
@extends('theme.default')

@section('content')

    <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">DNS Analytics Dashboard</h1>
            </div>    
    </div>  
    <div class="row" style="margin:10px">
            <p> <b>System date and time:</b> {{$today}}</p>
            <p><b> Current Week start:</b> {{$week}}</p>
            <p><b> System date one week from now:</b> {{$day}}</p>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <div class="huge">{{$user}}</div>
                                    <div>Total Number of Queries</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <div class="huge">{{$dailyQueries}}</div>
                                    <div>Number of Queries Today</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <div class="huge">{{$weeklyQueries}}</div>
                                    <div>Current Weekly Queries</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class="huge">{{$monthlyQueries}}</div>
                                        <div>Queries for the last Month</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>     

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Total Number of Queries - 4 Weeks Interval
                </div>
                <div class="panel-body">
                        <div id="timeseries" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Query Types
                    </div>
                    <div class="panel-body">
                        <div id="container" style="height: 400px"></div>
                    </div>
                </div>
        </div>   
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Weekly Data - Primary DNS (10.0.2.15)
                </div>
                <div class="panel-body">
                    <div id="container1" style="height: 400px"></div>
                </div>
            </div>
    </div>        
    </div>

    <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">Advanced Analytics - Big Data</h1>
                </div>
        <div class="col-lg-12">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Hue Big Data Server: 144.120.113.195
                        </div>
                        <div class="panel-body">
                            <div id="container">
                            {{-- <br>
                            <br>
                            <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=667')}}" target="_blank" title="144.120.113.195:8888/hue">
                                <img src="{{URL::to('/images/hue logo.png')}}"  style="width:40%" alt="Hue Logo">
                            </a>
                            <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=667')}}" target="_blank" title="144.120.113.195:8888/hue">
                                <img src="{{URL::to('/images/hue logo.png')}}"  style="width:40%" alt="Hue Logo">
                            </a>
                            <br>
                            <br>
                            </div> --}}

                            <div class="col-lg-12" >
                                <br>
                                    <table>
                                        <tr>
                                            <td  align="center">
                                                    <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=667')}}" target="_blank" title="144.120.113.195:8888/hue">
                                                        <img src="{{URL::to('/images/hue_search_dashboard.png')}}"  style="width:45%;" alt="Hue Logo">
                                            </td>
                                            <td align="center">
                                                    <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=667')}}" target="_blank" title="144.120.113.195:8888/hue">
                                                        <img src="{{URL::to('/images/hue logo.png')}}"  style="width:45%;" alt="Hue Logo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"><h2>Big Data Analytics Dashboard</h2></td>
                                            <td align="center"><h2>Big Data Query Repository</h2></td>
                                            
                                        </tr>
                                    </table>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <table>
                                        <tr>
                                            <td  align="center">
                                                    <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=667')}}" target="_blank" title="144.120.113.195:8888/hue">
                                                        <img src="{{URL::to('/images/hue_search_dashboard.png')}}"  style="width:45%;" alt="Hue Logo">
                                            </td>
                                        </tr>
                                        <tr>
                                                <td align="center"><h2>Hue Big Data Analytics Dashboard</h2></td>
                                                
                                            </tr>
                                    </table> --}}
                                </div>
                        </div>
                    </div>

        </div>

    </div>

 






@endsection
@section('scripts')

<script type="text/javascript"> 
   

        var A_Record = {!! json_encode($A) !!}; 
        let AAAA_Record = <?php echo $AAAA; ?>;
        let PTR_Record = <?php echo $PTR; ?>;
        let TXT_Record = <?php echo $TXT; ?>;
        let MX_Record = <?php echo $MX; ?>;
    
   

        Highcharts.chart('container', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Weekly Report for Query Types'
        },
        subtitle: {
            text: 'A, AAAA, PTR, TXT, MX Distribution'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Total Queries',
            data:[
                ['A', A_Record],
                ['AAAA', AAAA_Record],
                ['PTR', PTR_Record],
                ['TXT', TXT_Record],
                ['MX', MX_Record]
            ]
        }]
    });

        //var A_Record = {!! json_encode($A) !!}; 
        let primary = <?php echo $primary; ?>;
        // let PTR_Record = <?php echo $PTR; ?>;
        // let TXT_Record = <?php echo $TXT; ?>;
        // let MX_Record = <?php echo $MX; ?>;
    
   

        Highcharts.chart('container1', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Weekly Requests - Primary DNS'
        },
        subtitle: {
            text: 'DNS: 10.0.2.15'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Total Hits ',
            data:[
                ['Primary: 10.0.2.15', primary],
                // ['AAAA', AAAA_Record],
                // ['PTR', PTR_Record],
                // ['TXT', TXT_Record],
                // ['MX', MX_Record]
            ]
        }]
    });

    // Highcharts.chart('topdomain', {
    //     chart: {
    //         type: 'pie',
    //         options3d: {
    //             enabled: true,
    //             alpha: 45
    //         }
    //     },
    //     title: {
    //         text: "Example-Contents of Highsoft's weekly fruit delivery"
    //     },
    //     subtitle: {
    //         text: '3D donut in Highcharts'
    //     },
    //     plotOptions: {
    //         pie: {
    //         innerSize: 100,
    //         depth: 45
    //         }
    //     },
    //     series: [{
    //         name: 'Delivered amount',
    //         data: [
    //         ['Bananas', 8],
    //         ['Kiwi', 3],
    //         ['Mixed nuts', 1],
    //         ['Oranges', 6],
    //         ['Apples', 8],
    //         ['Pears', 4],
    //         ['Clementines', 4],
    //         ['Reddish (bag)', 1],
    //         ['Grapes (bunch)', 1]
    //         ]
    //     }]
    // });

    // Highcharts.chart('containers', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         text: 'Example - Monthly Average Rainfall'
    //     },
    //     subtitle: {
    //         text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
    //         ],
    //         crosshair: true
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Rainfall (mm)'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     series: [{
    //         name: 'Tokyo',
    //         data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    //     }, {
    //         name: 'New York',
    //         data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    //     }, {
    //         name: 'London',
    //         data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    //     }, {
    //         name: 'Berlin',
    //         data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    //     }]
    // });


         $(document).ready(()=>{
            $.ajax({
                type: "GET",
                url: "/chartData",

                success: function (myvalue) { 
                   drawChart(myvalue) ;
                // console.log(myvalue.date);

              }});
         });

        function drawChart(data){
            Highcharts.chart('timeseries', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'Query Set for 4 Weeks'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                            'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
              
                xAxis: {
                    type: 'category',
                    categories: data.date
                },
                yAxis: {
                    title: {
                        text: 'Number of Queries'
                    }
                },

                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 2
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'Number of Queries',
                    data: data.number
                }]
            });
        }  

</script>
@endsection