
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
     
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Total Number of Queries - 4 Weeks interval
                </div>
                <br>
                <div class="panel-body">
                        <div id="timeseries" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div> 
        <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Query Types - Weekly Data
                    </div>
                    <div class="panel-body">
                        <div id="container" style="height: 400px"></div>
                    </div>
                </div>
        </div>   
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Primary DNS (10.0.2.15) - Weekly Data
                </div>
                <div class="panel-body">
                    <div id="container1" style="height: 400px"></div>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Total Queries per Zone (Domain Name) 
                </div>
                <div class="panel-body">
                        <div id="zonefile" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
                            Hue Big Data Server: 144.120.113.193
                        </div>
                        <div class="panel-body">
                            <div id="container">
                            <div class="col-lg-12" >
                                <br>
                                    <table>
                                        <tr>
                                            <td  align="center">
                                                    <a href="{{url('http://144.120.113.193:8888/hue/search/?collection=50018')}}" target="_blank" title="144.120.113.193:8888/hueDashboard">
                                                        <img src="{{URL::to('/images/hue_search_dashboard.png')}}"  style="width:45%;" alt="Hue Logo">
                                            </td>
                                            <td align="center">
                                                    <a href="{{url('http://144.120.113.193:8888/hue/home/?uuid=abd814b4-0b45-4c49-9f87-ab02a5ef7327&')}}" target="_blank" title="144.120.113.193:8888/hueRepository">
                                                        <img src="{{URL::to('/images/hue logo.png')}}"  style="width:45%;" alt="Hue Logo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"><h2>Big Data Analytics Dashboard</h2></td>
                                            <td align="center"><h2>Big Data Query Repository</h2></td>
                                            
                                        </tr>
                                    </table>
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

       
        let primary = <?php echo $primary; ?>;
    
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
            ]
        }]
        });

         $(document).ready(()=>{
            $.ajax({
                type: "GET",
                url: "/chartData",

                success: function (myvalue) { 
                   drawChart(myvalue) ;
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
            
            let schoolfj = <?php echo $schoolfj; ?>;
            let comfj = <?php echo $comfj; ?>;
            let telecomlan = <?php echo $telecomlan; ?>;
            let govfj = <?php echo $govfj; ?>;
            Highcharts.chart('zonefile', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Local Zone File performance'
                },
                subtitle: {
                    text: 'DNS Hosted: 10.0.2.15'
                },
                xAxis: {
                    categories: [
                        '.school.fj',
                        '.com.fj',
                        '.telecom.lan',
                        '.gov.fj'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Requests'
                    }
                },
               
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },

                series: [{
                    name: 'Zone File Name',
                    data:  [schoolfj,comfj,telecomlan,govfj] 

                }]
            });
         }

</script>
@endsection