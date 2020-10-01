@extends('adminlte::page')

@section('title', 'Novum')

@section('content_header')
    <h1>Dashboard</h1>

@stop

@section('content')
    @can('access')
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Area Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="revenue-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg version="1.1" width="729" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 style="overflow: hidden; position: relative;" height="300">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <text x="51.515625" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,143H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,84.00000000000003H704" stroke-width="0.5"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,25.00000000000003H704" stroke-width="0.5"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="586.5464074840523" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text>
                                <text x="301.93610219851155" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text>
                                <path fill="#74a5c2" stroke="none"
                                      d="M64.015625,219.05493333333334C81.90097205346294,219.56626666666668,117.67166616038881,222.62345,135.55701321385175,221.10026666666667C153.44236026731468,219.57708333333335,189.21305437424058,209.13609859561225,207.09840142770352,206.86946666666668C224.78124228717346,204.62849859561226,260.1469240061133,204.88132019993895,277.82976486558323,203.06986666666666C295.5288062205726,201.25675353327227,330.92688893055134,194.9135027923211,348.62593028554073,192.3712C366.51127733900364,189.80213612565444,402.28197144592957,182.51721666666668,420.1673184993925,182.6244C438.05266555285544,182.73158333333333,473.8233596597813,204.18306539133076,491.7087067132443,193.22866666666667C509.3915475727142,182.3982987246641,544.7572292916541,101.94099634745245,562.440070151124,95.48533333333336C579.94470555988,89.09472968078579,614.9539763773922,135.13645416189823,632.4586117861483,141.8436C650.3439588396112,148.6966208285649,686.114652946537,147.7554,704,149.726L704,261L64.015625,261Z"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="none" stroke="#3c8dbc"
                                      d="M64.015625,219.05493333333334C81.90097205346294,219.56626666666668,117.67166616038881,222.62345,135.55701321385175,221.10026666666667C153.44236026731468,219.57708333333335,189.21305437424058,209.13609859561225,207.09840142770352,206.86946666666668C224.78124228717346,204.62849859561226,260.1469240061133,204.88132019993895,277.82976486558323,203.06986666666666C295.5288062205726,201.25675353327227,330.92688893055134,194.9135027923211,348.62593028554073,192.3712C366.51127733900364,189.80213612565444,402.28197144592957,182.51721666666668,420.1673184993925,182.6244C438.05266555285544,182.73158333333333,473.8233596597813,204.18306539133076,491.7087067132443,193.22866666666667C509.3915475727142,182.3982987246641,544.7572292916541,101.94099634745245,562.440070151124,95.48533333333336C579.94470555988,89.09472968078579,614.9539763773922,135.13645416189823,632.4586117861483,141.8436C650.3439588396112,148.6966208285649,686.114652946537,147.7554,704,149.726"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="64.015625" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="135.55701321385175" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="207.09840142770352" cy="206.86946666666668" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="277.82976486558323" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="348.62593028554073" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="420.1673184993925" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="491.7087067132443" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="562.440070151124" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="632.4586117861483" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="704" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <path fill="#eaf3f6" stroke="none"
                                      d="M64.015625,240.02746666666667C81.90097205346294,239.8072,117.67166616038881,241.35496666666666,135.55701321385175,239.1464C153.44236026731468,236.93783333333334,189.21305437424058,223.33698698853718,207.09840142770352,222.35893333333334C224.78124228717346,221.39195365520382,260.1469240061133,233.23177876984127,277.82976486558323,231.36626666666666C295.5288062205726,229.49904543650794,330.92688893055134,209.28948603839441,348.62593028554073,207.428C366.51127733900364,205.54691937172774,402.28197144592957,214.4391666666667,420.1673184993925,216.39600000000002C438.05266555285544,218.35283333333336,473.8233596597813,232.38159338039932,491.7087067132443,223.08266666666668C509.3915475727142,213.88902671373265,544.7572292916541,148.2241679481277,562.440070151124,142.42573333333334C579.94470555988,136.68573461479437,614.9539763773922,170.46886726939806,632.4586117861483,176.92893333333336C650.3439588396112,183.5295006027314,686.114652946537,190.23343333333335,704,194.66826666666668L704,261L64.015625,261Z"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="none" stroke="#a0d0e0"
                                      d="M64.015625,240.02746666666667C81.90097205346294,239.8072,117.67166616038881,241.35496666666666,135.55701321385175,239.1464C153.44236026731468,236.93783333333334,189.21305437424058,223.33698698853718,207.09840142770352,222.35893333333334C224.78124228717346,221.39195365520382,260.1469240061133,233.23177876984127,277.82976486558323,231.36626666666666C295.5288062205726,229.49904543650794,330.92688893055134,209.28948603839441,348.62593028554073,207.428C366.51127733900364,205.54691937172774,402.28197144592957,214.4391666666667,420.1673184993925,216.39600000000002C438.05266555285544,218.35283333333336,473.8233596597813,232.38159338039932,491.7087067132443,223.08266666666668C509.3915475727142,213.88902671373265,544.7572292916541,148.2241679481277,562.440070151124,142.42573333333334C579.94470555988,136.68573461479437,614.9539763773922,170.46886726939806,632.4586117861483,176.92893333333336C650.3439588396112,183.5295006027314,686.114652946537,190.23343333333335,704,194.66826666666668"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="64.015625" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="135.55701321385175" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="207.09840142770352" cy="222.35893333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="277.82976486558323" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="348.62593028554073" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="420.1673184993925" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="491.7087067132443" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="562.440070151124" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="632.4586117861483" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="704" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                            <div class="morris-hover morris-default-style" style="left: 310.753px; top: 91px; display: none;">
                                <div class="morris-hover-row-label">2013 Q1</div>
                                <div class="morris-hover-point" style="color: #a0d0e0">
                                    Item 1:
                                    10,687
                                </div>
                                <div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 2:
                                    4,460
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Donut Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="sales-chart" style="height: 300px; position: relative;">
                            <svg height="300" version="1.1" width="729" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 style="overflow: hidden; position: relative;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <path fill="none" stroke="#3c8dbc" d="M364.5,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,452.7277551949771,180.44625304313007"
                                      stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                <path fill="#3c8dbc" stroke="#ffffff"
                                      d="M364.5,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,455.56364732624417,181.4248826052307L492.1151459070204,194.03833029452744A135,135,0,0,1,364.5,285Z"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <path fill="none" stroke="#f56954"
                                      d="M452.7277551949771,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,280.78484627831415,108.73398312817662" stroke-width="2"
                                      opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
                                <path fill="#f56954" stroke="#ffffff"
                                      d="M455.56364732624417,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,278.09400205154566,107.40757544301087L238.92726941747117,88.10097469226493A140,140,0,0,1,496.8416327924656,195.6693795646951Z"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <path fill="none" stroke="#00a65a"
                                      d="M280.78484627831415,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,364.47067846904883,243.333328727518" stroke-width="2"
                                      opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                <path fill="#00a65a" stroke="#ffffff"
                                      d="M278.09400205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,364.46973599126824,246.3333285794739L364.4575884998742,284.9999933380171A135,135,0,0,1,243.4120097954186,90.31165416754118Z"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="364.5" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;"
                                      font-weight="800" transform="matrix(1.6685,0,0,1.6685,-243.8877,-99.2765)" stroke-width="0.5993303571428571">
                                    <tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan>
                                </text>
                                <text x="364.5" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;"
                                      transform="matrix(1.9444,0,0,1.9444,-344.3385,-143.5556)" stroke-width="0.5142857142857143">
                                    <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan>
                                </text>
                            </svg>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Line Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg height="300" version="1.1" width="729" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 style="overflow: hidden; position: relative;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <text x="51.515625" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,261H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,202H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,143H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,84H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="51.515625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M64.015625,25H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="586.5464074840523" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text>
                                <text x="301.93610219851155" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text>
                                <path fill="none" stroke="#3c8dbc"
                                      d="M64.015625,229.5412C81.90097205346294,229.2108,117.67166616038881,231.53245,135.55701321385175,228.2196C153.44236026731468,224.90675000000002,189.21305437424058,204.50548048280575,207.09840142770352,203.0384C224.78124228717346,201.58793048280575,260.1469240061133,219.3476681547619,277.82976486558323,216.5494C295.5288062205726,213.7485681547619,330.92688893055134,183.4342290575916,348.62593028554073,180.642C366.51127733900364,177.82037905759162,402.28197144592957,191.15875,420.1673184993925,194.094C438.05266555285544,197.02925,473.8233596597813,218.07239007059894,491.7087067132443,204.124C509.3915475727142,190.33354007059896,544.7572292916541,91.83625192219154,562.440070151124,83.1386C579.94470555988,74.52860192219153,614.9539763773922,125.20330090409703,632.4586117861483,134.89339999999999C650.3439588396112,144.79425090409705,686.114652946537,154.85015,704,161.50240000000002"
                                      stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="64.015625" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="135.55701321385175" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="207.09840142770352" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="277.82976486558323" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="348.62593028554073" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="420.1673184993925" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="491.7087067132443" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="562.440070151124" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="632.4586117861483" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="704" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                            <div class="morris-hover morris-default-style" style="left: 305.602px; top: 113px; display: none;">
                                <div class="morris-hover-row-label">2012 Q1</div>
                                <div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 1:
                                    6,810
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="bar-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg height="300" version="1.1" width="729" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 style="overflow: hidden; position: relative;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <text x="34.84375" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M47.34375,261H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="34.84375" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M47.34375,202H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="34.84375" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M47.34375,143H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="34.84375" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M47.34375,84H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="34.84375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M47.34375,25H704" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="657.0959821428571" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text>
                                <text x="563.2879464285714" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan>
                                </text>
                                <text x="469.4799107142857" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan>
                                </text>
                                <text x="375.671875" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan>
                                </text>
                                <text x="281.8638392857143" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan>
                                </text>
                                <text x="188.05580357142858" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan>
                                </text>
                                <text x="94.24776785714286" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                      font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan>
                                </text>
                                <rect x="59.069754464285715" y="25" width="33.67801339285714" height="236" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="95.74776785714286" y="48.60000000000002" width="33.67801339285714" height="212.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="152.87779017857144" y="84" width="33.67801339285714" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="189.55580357142858" y="107.6" width="33.67801339285714" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="246.68582589285714" y="143" width="33.67801339285714" height="118" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="283.3638392857143" y="166.60000000000002" width="33.67801339285714" height="94.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="340.49386160714283" y="84" width="33.67801339285714" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="377.171875" y="107.6" width="33.67801339285714" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="434.30189732142856" y="143" width="33.67801339285714" height="118" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="470.97991071428567" y="166.60000000000002" width="33.67801339285714" height="94.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="528.1099330357142" y="84" width="33.67801339285714" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="564.7879464285713" y="107.6" width="33.67801339285714" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="621.9179687499999" y="25" width="33.67801339285714" height="236" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1"
                                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                                <rect x="658.595982142857" y="48.60000000000002" width="33.67801339285714" height="212.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none"
                                      fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            </svg>
                            <div class="morris-hover morris-default-style" style="display: none;"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
    @endcan
@stop



@section('after-scripts-end')
    @parent
    <script>
        $(function () {
            "use strict";

            // AREA CHART
            var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666, item2: 2666},
                    {y: '2011 Q2', item1: 2778, item2: 2294},
                    {y: '2011 Q3', item1: 4912, item2: 1969},
                    {y: '2011 Q4', item1: 3767, item2: 3597},
                    {y: '2012 Q1', item1: 6810, item2: 1914},
                    {y: '2012 Q2', item1: 5670, item2: 4293},
                    {y: '2012 Q3', item1: 4820, item2: 3795},
                    {y: '2012 Q4', item1: 15073, item2: 5967},
                    {y: '2013 Q1', item1: 10687, item2: 4460},
                    {y: '2013 Q2', item1: 8432, item2: 5713}
                ],
                xkey: 'y',
                ykeys: ['item1', 'item2'],
                labels: ['Item 1', 'Item 2'],
                lineColors: ['#a0d0e0', '#3c8dbc'],
                hideHover: 'auto'
            });

            // LINE CHART
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666},
                    {y: '2011 Q2', item1: 2778},
                    {y: '2011 Q3', item1: 4912},
                    {y: '2011 Q4', item1: 3767},
                    {y: '2012 Q1', item1: 6810},
                    {y: '2012 Q2', item1: 5670},
                    {y: '2012 Q3', item1: 4820},
                    {y: '2012 Q4', item1: 15073},
                    {y: '2013 Q1', item1: 10687},
                    {y: '2013 Q2', item1: 8432}
                ],
                xkey: 'y',
                ykeys: ['item1'],
                labels: ['Item 1'],
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
            });

            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [
                    {label: "Download Sales", value: 12},
                    {label: "In-Store Sales", value: 30},
                    {label: "Mail-Order Sales", value: 20}
                ],
                hideHover: 'auto'
            });
            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: '2006', a: 100, b: 90},
                    {y: '2007', a: 75, b: 65},
                    {y: '2008', a: 50, b: 40},
                    {y: '2009', a: 75, b: 65},
                    {y: '2010', a: 50, b: 40},
                    {y: '2011', a: 75, b: 65},
                    {y: '2012', a: 100, b: 90}
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['CPU', 'DISK'],
                hideHover: 'auto'
            });
        });
    </script>

@endsection