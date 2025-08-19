@include('admin.header')

<div class="main-panel">
	<div class="content bg-light">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark">Investment Plans</h1>
			</div>
			<div class="mb-5 row">
				<div class="mt-2 mb-3 col-lg-12">
					<a class="btn btn-primary" href="{{ route('plans.create') }}"><i class="fa fa-plus"></i> New
						Plan</a>
				</div>

				@foreach($plans as $plan)
				<div class="col-lg-4">
					<div class="pricing-table purple border p-4 card bg-light shadow">
						<div class="price-tag">
							<center><i>Plan Name</i></center>
							<h2 class="text-dark">{{ $plan->name }}</h2>
						</div>

						<div class="pricing-features">
							<div class="feature text-dark">Minimum Deposit: <span class="text-dark">{{
									$plan->min_deposit }}</span></div>
							<div class="feature text-dark">Maximum Deposit: <span class="text-dark">{{
									$plan->max_deposit }}</span></div>
							<div class="feature text-dark">Percentage(%): <span class="text-dark">{{ $plan->percentage
									}}</span></div>
							<div class="feature text-dark">Plan Duration: <span class="text-dark">{{ $plan->duration
									}}</span></div>
						</div>

						<div class="text-center mt-3">
							<a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-primary"><i
									class="text-white flaticon-pencil"></i></a>
							<form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline-block">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
									<i class="text-white fa fa-times"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@include('admin.footer')