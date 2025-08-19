@include('admin.header')

<div class="main-panel">
    <div class="content-wrapper">
        @if(session('message'))
        <div class="alert alert-success mb-2">{{ session('message') }}</div>
        @endif

        <div class="content bg-light">
            <div class="page-inner">
                <div class="mt-2 mb-4">

                </div>

                <div class="mt-2 mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="title1 text-dark">Manage Trading Plans</h1>
                    <a href="{{ route('admin.create-trading-plan') }}" class="btn btn-primary">Create New Plan</a>
                </div>

                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4 bg-light">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="PlanTable" class="table table-hover text-dark">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Minimum Amount ($)</th>
                                        <th>Maximum Amount ($)</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tradingPlans as $plan)
                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->min_amount }}</td>
                                        <td>{{ $plan->max_amount }}</td>
                                        <td>{{ $plan->duration }} Months</td>
                                        <td>
                                            <a href="{{ route('admin.edit-trading-plan', $plan->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.delete-trading-plan', $plan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
    </div>
</div>

@include('admin.footer')

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
        $(this).val(value);
    });
</script>

<script>
    $(document).ready(function () {
        $('#PlanTable').DataTable({
            order: [[0, 'desc']],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'print', 'excel', 'pdf']
        });

        $(".dataTables_length select").addClass("bg-light text-dark");
        $(".dataTables_filter input").addClass("bg-light text-dark");
    });
</script>

<script>
    $(document).ready(function () {
        $('.UserTable').DataTable({
            order: [[0, 'desc']]
        });
        $(".dataTables_length select").addClass("bg-light text-dark");
        $(".dataTables_filter input").addClass("bg-light text-dark");
    });
</script>