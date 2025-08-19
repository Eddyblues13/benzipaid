@include('admin.header')
<div class="main-panel">
	<div class="content bg-light">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark">Avaliable stocks</h1>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="mb-5 row">
				<div class="mt-2 mb-3 col-lg-12">
					<a class="btn btn-primary" href="{{route('add-stocks')}}"><i class="fa fa-plus"></i> New plan</a>
				</div>
				@foreach($stocks as $stock)
				<div class="col-lg-4">
					<div class="pricing-table purple border p-4 card bg-light shadow">
						<div class="price-tag">
							<center> <img src="{{asset('uploads/stock/'.$stock->picture)}}" lt="Image"><br>
							</center>
							<h2 class="text-dark">{{$stock->stock_name}}</h2>
						</div>
						<!-- Features -->
						<div class="pricing-features">
							<div class="feature text-dark">Minimum amount:<span
									class="text-dark">{{$stock->stock_min_amount}}</span></div>
							<div class="feature text-dark">Maximum amount:<span
									class="text-dark">{{$stock->stock_max_amount}}</span></div>


							<div class="feature text-dark">ROI:<span class="text-dark">{{$stock->copier_roi}}</span>
							</div>


							<div class="feature text-dark">Duration:<span
									class="text-dark">{{$stock->copier_roi}}</span></div>
							<div class="feature text-dark">About stock:<br>{{$stock->years_of_experience}}</div>
						</div> <br>

						<!-- Button -->
						<div class="text-center">
							<a href="{{url('edit_stock/'.$stock->id)}}" class="btn btn-primary"><i
									class="text-white flaticon-pencil"></i>
							</a> &nbsp;
							<a href="" class="btn btn-danger"><i class="text-white fa fa-times"></i>
							</a>
						</div>
					</div>
				</div>
				@endforeach
				<br>


			</div>
		</div>

	</div>
</div>
</div>


@include('admin.footer')