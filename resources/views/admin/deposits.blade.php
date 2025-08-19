@include('admin.header')

<div class="main-panel">
	<div class="content-wrapper">
		@if(session('message'))
		<div class="alert alert-success mb-2">{{session('message')}}</div>
		@endif
		<div class="content bg-light ">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h1 class="title1 text-dark">Manage clients deposits</h1>
				</div>
				<div>
				</div>
				<div>
				</div>
				<div class="mb-5 row">
					<div class="col-12">
						<small class="text-dark">if you can't see the image, try switching your uploaded location to
							another option from your admin settings page.</small>
					</div>
					<div class="col-12 card shadow p-4 bg-light">
						<div class="table-responsive" data-example-id="hoverable-table">
							<table id="ShipTable" class="table table-hover text-dark">
								<thead>
									<tr>
										<th>ID</th>
										<th>Client name</th>
										<th>Client email</th>
										<th>Amount</th>
										<th>Payment Method</th>

										<th>Status</th>
										<th>Date created</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>


									@foreach($deposits as $dep)
									<tr>
										<th scope="row">{{$dep->id}}</th>
										<td>{{$dep->name}}</td>
										<td>{{$dep->email}}</td>
										<td>${{number_format($dep->amount, 2, '.', ',')}}</td>
										<td>{{$dep->asset}}</td>

										<td>
											@if($dep->status == '1')
											<span class="badge badge-success">Processed</span>
											@elseif($dep->status == '0')
											<span class="badge badge-danger">Pending</span>
											@endif
										</td>
										<td>
											{{ \Carbon\Carbon::parse($dep->created_at)->format('D, M j, Y g:i A') }}
										</td>
										<td>
											<a href="" class="btn btn-light btn-sm m-1" title="View payment screenshot">
												<i class="fa fa-eye"></i>
											</a>
											<a href="{{url('delete-deposit/'.$dep->id)}}"
												class="m-1 btn btn-danger btn-sm">Delete</a>
											@if($dep->status == '0')
											<a class="btn btn-primary btn-sm"
												href="{{url('process-deposit/'.$dep->id)}}">Process</a>
											@endif
										</td>
									</tr>
									@endforeach




								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function googleTranslateElementInit() {
			new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

		<script type="text/javascript">
			var badWords = [ 
				'<!--Start of Tawk.to Script-->',
				'<script type="text/javascript">', 
				'<!--End of Tawk.to Script-->'
						];
			$(':input').on('blur', function(){
				var value = $(this).val();
				$.each(badWords, function(idx, word){
					value = value.replace(word, '');
				});
				$(this).val( value);
			});
		</script>
		<script>
			$(document).ready( function () {
				$('#ShipTable').DataTable({
					order: [ [0, 'desc'] ],
					dom: 'Bfrtip',
					buttons: [
					'copy', 'csv', 'print', 'excel','pdf'
				] 
				});

				
				$(".dataTables_length select").addClass("bg-light text-dark");
				$(".dataTables_filter input").addClass("bg-light text-dark");
			} );
		</script>
		<script>
			$(document).ready( function () {
				$('.UserTable').DataTable({
					order: [ [0, 'desc'] ]
				});
				$(".dataTables_length select").addClass("bg-light text-dark");
				$(".dataTables_filter input").addClass("bg-light text-dark");
			} );
		</script>
		<!-- Livewire Scripts -->

		<script src="/livewire/livewire.js?id=25f025805c3c370f7e87" data-turbo-eval="false"
			data-turbolinks-eval="false"></script>
		<script data-turbo-eval="false" data-turbolinks-eval="false">
			if (window.livewire) {
	    console.warn('Livewire: It looks like Livewire\'s @livewireScripts JavaScript assets have already been loaded. Make sure you aren\'t loading them twice.')
	}

    window.livewire = new Livewire();
    window.livewire.devTools(true);
    window.Livewire = window.livewire;
    window.livewire_app_url = '';
    window.livewire_token = 'z5yFWGZeq4c9tyaFyoUyII0vjDTG16Ltx3u5EYY6';

	/* Make sure Livewire loads first. */
	if (window.Alpine) {
	    /* Defer showing the warning so it doesn't get buried under downstream errors. */
	    document.addEventListener("DOMContentLoaded", function () {
	        setTimeout(function() {
	            console.warn("Livewire: It looks like AlpineJS has already been loaded. Make sure Livewire\'s scripts are loaded before Alpine.\\n\\n Reference docs for more info: http://laravel-livewire.com/docs/alpine-js")
	        })
	    });
	}

	/* Make Alpine wait until Livewire is finished rendering to do its thing. */
    window.deferLoadingAlpine = function (callback) {
        window.addEventListener('livewire:load', function () {
            callback();
        });
    };

    document.addEventListener("DOMContentLoaded", function () {
        window.livewire.start();
    });
		</script>

		@include('admin.footer')