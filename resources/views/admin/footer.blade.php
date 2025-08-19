<div class="footer w3-white">
	<div class="w3-bar w3-white">
		<center>
			<table>
				<tr>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{route('admin.home')}}" style="margin-right:10px">
							<img src="{{asset('user/icon/dashboard.png')}}"
								style="width:20px;height:20px"><br>Dashboard</a>
					</td>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{route('manage.deposits.page')}}" style="margin-right:10px">
							<img src="{{asset('user/icon/Copy Trader.png')}}"
								style="width:20px;height:20px"><br>Deposits</a>
					</td>

					<td style="font-size:9pt;text-align:center;"> <a class=""
							href="{{route('manage.withdrawals.page')}}" style="margin-right:10px">
							<img src="{{asset('user/icon/history.png')}}"
								style="width:20px;height:20px"><br>Withdrawals</a>
					</td>
					<td style="font-size:9pt;text-align:center;"> <a class="" href="" style="margin-right:10px">
							<img src="{{asset('user/icon/exchange.png')}}" style="width:20px;height:20px"><br>Trade</a>
					</td>
					<td style="font-size:8pt;text-align:center;">

						<a style="font-size:9pt;text-align:center;" class=" navbar-toggler sidenav-toggler">
							<img src="{{asset('user/icon/more.png')}}" style="width:20px;height:20px;">
							<br>Menu</a>
					</td>

				</tr>
			</table>
		</center>


	</div>
</div>
</div>
</div>






<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{asset('user/account/dash/js/core/popper.min.js')}}"></script>
<script src="{{asset('user/account/dash/js/core/bootstrap.min.js')}} "></script>
<script src="{{asset('user/account/dash/js/customs.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('user/account/dash/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('user/account/dash/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('user/account/dash/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js ')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('user/account/dash/js/plugin/jquery.sparkline/jquery.sparkline.min.js ')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>
<!-- Bootstrap Notify -->
<script src="{{asset('user/account/dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>

<script type="text/javascript"
	src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js')}}">
</script>
<script type="text/javascript"
	src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js">
</script>
<script src="{{asset('user/account/dash/js/atlantis.min.js')}}"></script>
<script src="{{asset('user/account/dash/js/atlantis.js')}}"></script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
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


</body>

</html>