@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
			<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				}
			</style>
<div class="row">
		<p class="title_thongke">Sales order statistics</p>

		<form autocomplete="off">
			@csrf

			<div class="col-md-2">
				<p>From date: <input type="text" id="datepicker" class="form-control"></p>

				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Filter results"></p>

			</div>

			<div class="col-md-2">
				<p>To date: <input type="text" id="datepicker2" class="form-control"></p>
			
			</div>

			<div class="col-md-2">
				<p>
					Filter by: 
					<select class="dashboard-filter form-control" >
						<option>--Seclect--</option>
						
						<option value="7ngay">the past 7 days</option>
						<option value="thangtruoc">last month</option>
						<option value="thangnay">this month</option>
						<option value="365ngayqua">365 days ago</option>
					</select>
				</p>
			</div>

		</form>

		<div class="col-md-12">
			<div id="chart" style="height: 250px;"></div>
		</div>

</div>

<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>

<p class="title_thongke">Statistical access</p>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
       <th scope="col">Online</th>
       <th scope="col">Last month's total</th>
       <th scope="col">This month's total</th>
       <th scope="col">One year total</th>
       <th scope="col">Total hits</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$visitor_count}}</td>
      <td>{{$visitor_last_month_count}}</td>
      <td>{{$visitor_this_month_count}}</td>
      <td>{{$visitor_year_count}}</td>
      <td>{{$visitors_total}}</td>
    </tr>
   
  </tbody>
</table>

</div>

<div class="row">

	<div class="col-md-4 col-xs-12">
		<p class="title_thongke">Statistics of total products, articles, orders</p>
		<div id="donut"></div>	
	</div>

	<!--------------------------->

	<div class="col-md-4 col-xs-12">
		<h3>Most Viewed Posts</h3>

		<ol class="list_views">
			@foreach($post_views as $key => $post)
			<li>
				<a target="_blank" href="{{url('/bai-viet/'.$post->post_slug)}}">{{$post->post_title}} | <span style="color:black">{{$post->post_views}}</span></a>
			</li>
			@endforeach
		</ol>
		
	</div>

	<div class="col-md-4 col-xs-12">
		<style type="text/css">
			ol.list_views {
			    margin: 10px 0;
			    color: #fff;
			}
			ol.list_views a {
			    color: orange;
			    font-weight: 400;
			}
		</style>
		<h3>more people check out products</h3>

		<ol class="list_views">
			@foreach($product_views as $key => $pro)
			<li>
				<a target="_blank" href="{{url('/chi-tiet/'.$pro->product_slug)}}">{{$pro->product_name}} | <span style="color:black">{{$pro->product_views}}</span></a>
			</li>
			@endforeach
		</ol>

	</div>
</div>


</div>

@endsection