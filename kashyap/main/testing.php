@extends('admin.layouts.app')
@section('main_content')
@if(Auth::user()->role_type=="Admin")
<div class="row">
    <div class="col-md-6 col-xl-3">
        <a href="{{ url('users') }}" class="text-dark">
            <div class="card-box tilebox-one">
                <i class="fa fa-user float-right text-success"></i>
                <h6 class="text-success text-uppercase m-b-20">Total Users</h6>

                <h2 class="m-b-20" data-plugin="counterup">{{ $user }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{ url('category') }}" class="text-dark">
            <div class="card-box tilebox-one">
                <i class="fa fa-list-alt float-right text-primary"></i>
                <h6 class="text-primary text-uppercase m-b-20">Total Substances</h6>

                <h2 class="m-b-20" data-plugin="counterup">{{ $category }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="#" class="text-dark">
            <div class="card-box tilebox-one">
                <i class="icon-basket float-right text-pink"></i>
                <h6 class="text-pink text-uppercase m-b-20">Total Drugs</h6>

                <h2 class="m-b-20" data-plugin="counterup">{{ $product }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{ url('product-search') }}" class="text-dark">
            <div class="card-box tilebox-one">
                <i class="fa fa-history float-right text-info"></i>
                <h6 class="text-info text-uppercase m-b-20">Searches Made</h6>

                <h2 class="m-b-20" data-plugin="counterup">{{ $search }}</h2>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <!-- end col-->
    <div class="col-lg-6 col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Daily Search Trend (Last Week)</h4>

            <div class="p-3">
                <div id="website-stats1" style="height: 320px;" class="flot-chart"></div>
            </div>
        </div>
    </div><!-- end col-->

    <!-- end col-->
    <div class="col-lg-6 col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Daily Login Trend (Last Week)</h4>

            <div class="p-3">
                <div id="morris-bar-stacked" class="morris-chart" style="height: 320px;" dir="ltr"></div>
            </div>
        </div>
    </div><!-- end col-->
</div>
<!-- end row -->
@endif
@if(Auth::user()->role_type=="Normal")
<div class="row">
    <div class="col-md-6 col-xl-3">
        <a href="{{ url('product-search') }}" class="text-dark">
            <div class="card-box tilebox-one">
                <i class="fa fa-history float-right text-info"></i>
                <h6 class="text-info text-uppercase m-b-20">Search Keyword</h6>

                <h2 class="m-b-20" data-plugin="counterup">{{ $usersearch }}</h2>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Search Keyword</h4>
            <hr>
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Keyword</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endif
@endsection
@section('footer_script')
<script>
    $(document).ready(function(){
        $("#datatable").dataTable().fnDestroy();
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{route('usersearchKeyword')}}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    "_token": "{{csrf_token()}}"
                }
            },
            "columns": [
                {"data": "id"},
                {"data": "created_at"},
                {"data": "keyword"},
            ],
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [-1]
                }
            ],
            "language": {
                "emptyTable": "No Users Data",
                "searchPlaceholder": "Search Keyword..."
            }

        });
    });

    ! function($) {
	"use strict";

	var FlotChart = function() {
		this.$body = $("body")
		this.$realData = []
	};



	//creates plot Dot graph
	FlotChart.prototype.createPlotDotGraph = function(selector, data1, data2, labelsDot, colorsDot, borderColorDot, bgColorDot) {
		//shows tooltip
		function showTooltip(x, y, contents) {
			$('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
				position : 'absolute',
				top : y + 5,
				left : x + 5
			}).appendTo("body").fadeIn(200);
		}


		$.plot($(selector), [{
			data : data1,
			label : labelsDot[0],
			color : colorsDot[0]
		}, {
			data : data2,
			label : labelsDot[1],
			color : colorsDot[1]
		}], {
			series : {
				lines : {
					show : true,
					fill : true,
					lineWidth : 3,
					fillColor : {
						colors : [{
							opacity : 0
						}, {
							opacity : 0
						}]
					}
				},
				points : {
					show : true
				},
				shadowSize : 0
			},

			grid : {
				hoverable : true,
				clickable : true,
				borderColor : borderColorDot,
				tickColor : "#f9f9f9",
				borderWidth : 1,
				labelMargin : 10,
				backgroundColor : bgColorDot
			},
			legend : {
				position : "ne",
				margin : [0, -24],
				noColumns : 0,
				labelBoxBorderColor : null,
				labelFormatter : function(label, series) {
					// just add some space to labes
					return '' + label + '&nbsp;&nbsp;';
				},
				width : 30,
				height : 2
			},
			yaxis : {
				axisLabel: "Count",
				tickColor : '#f5f5f5',
				font : {
					color : '#bdbdbd'
				}
			},
			xaxis : {
				axisLabel: "Day",
				tickColor : '#f5f5f5',
				font : {
					color : '#bdbdbd'
				}
			},
			tooltip : true,
			tooltipOpts : {
				content : '%s: Value of %x is %y',
				shifts : {
					x : -60,
					y : 25
				},
				defaultTheme : false
			}
		});
	},
	//end plot Dot graph


	//initializing various charts and components
	FlotChart.prototype.init = function() {
		//plot graph Dot data
        var splashArray = "";
        $.ajax({
            url:"{{ url('get-search-chart') }}",
            type:"POST",
            data: {
            "_token": "{{ csrf_token() }}"
            },
            success: function (result) {
                splashArray =result.data;
            }
        })
        setTimeout(() => {
            var uploadsDot = splashArray;
            var downloadsDot = [];
            var plabelsDot = ["Search"];
            var pcolorsDot = ['#eaa211'];
            var borderColorDot = '#f5f5f5';
            var bgColorDot = '#fff';
            this.createPlotDotGraph("#website-stats1", uploadsDot, downloadsDot, plabelsDot, pcolorsDot, borderColorDot, bgColorDot);
        }, 1000);

	},

	//init flotchart
	$.FlotChart = new FlotChart, $.FlotChart.Constructor =
	FlotChart

}(window.jQuery),

//initializing flotchart
function($) {
	"use strict";
	$.FlotChart.init()
}(window.jQuery);



!(function (e) {
    "use strict";
    var a = function () {};

        (a.prototype.createStackedChart = function (e, a, r, t, i, o) {
            Morris.Bar({ element: e, data: a, xkey: r, ykeys: t, stacked: !0, labels: i, hideHover: "auto", resize: !0, gridLineColor: "rgba(108, 120, 151, 0.1)", barColors: o });
        }),
        (a.prototype.init = function () {
            var loginarray="";
            $.ajax({
                url:"{{ url('get-login-chart') }}",
                type:"POST",
                data: {
                "_token": "{{ csrf_token() }}"
                },
                success: function (result) {
                    loginarray =result.data;
                }
            })
            setTimeout(() => {
                this.createStackedChart(
                    "morris-bar-stacked",
                    loginarray,
                    "y",
                    ["a"],
                    ["Series A"],
                    ["#3db9dc"]
                );
            }, 1000);
        }),
        (e.MorrisCharts = new a()),
        (e.MorrisCharts.Constructor = a);
})(window.jQuery),
    (function (e) {
        "use strict";
        window.jQuery.MorrisCharts.init();
    })();

</script>


@endsection
