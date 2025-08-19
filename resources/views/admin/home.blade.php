@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark"> Velmo Grand Bank users lists</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-primary btn-lg"
                        style="margin:10px;">Message all</a>
                    <a href="{{route('admin.kyc.index')}}" class="btn btn-warning btn-lg">KYC</a>
                    <a href="{{route('add.user')}}" data-toggle="modal" data-target="#adduser"
                        class="float-right btn btn-primary"> <i class='fas fa-plus-circle'></i> Open an Account</a>
                </div>
            </div>

            <div class="mb-5 row">
                <div class="col-md-12 shadow card p-4 bg-light">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-inline" id="searchForm">
                                <div class="form-group mr-2 mb-2">
                                    <select class="form-control bg-light text-dark" id="numofrecord" name="per_page">
                                        @foreach([10,20,30,40,50,100,200,300,400,500,600,700,800,900,1000] as $perPage)
                                        <option value="{{ $perPage }}" {{ request('per_page')==$perPage ? 'selected'
                                            : '' }}>{{ $perPage }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mr-2 mb-2">
                                    <select class="form-control bg-light text-dark" id="order" name="order">
                                        <option value="desc" {{ request('order')=='desc' ? 'selected' : '' }}>Descending
                                        </option>
                                        <option value="asc" {{ request('order')=='asc' ? 'selected' : '' }}>Ascending
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" id="searchitem" name="search"
                                        placeholder="Search by name or email" class="form-control bg-light text-dark"
                                        value="{{ request('search') }}">
                                    <small id="errorsearch" class="text-danger d-none"></small>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Date registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="userslisttbl">
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                    @if($user->status == 1)
                                    <td><span class="badge badge-danger">inactive</span></td>
                                    @else
                                    <td><span class="badge badge-success">active</span></td>
                                    @endif
                                    <td>{{ $user->created_at->format('d M Y h:i A') }}</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('admin.user.view', $user->id) }}" role="button">
                                            Manage
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($users->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3" id="pagination-container">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h3 class="mb-2 d-inline text-dark">Manually Add Users</h3>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <form role="form" method="post" action="{{ route('add.user') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">First Name</h6>
                                <input type="text" id="input1" class="form-control bg-light text-dark" name="first_name"
                                    required>
                            </div>
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Last Name</h6>
                                <input type="text" class="form-control bg-light text-dark" name="last_name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Email</h6>
                                <input type="email" class="form-control bg-light text-dark" name="email" required>
                            </div>
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Password</h6>
                                <input type="password" class="form-control bg-light text-dark" name="password" required>
                            </div>
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Confirm Password</h6>
                                <input type="password" class="form-control bg-light text-dark"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <button type="submit" class="px-4 btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Email Modal -->
    <div id="sendmailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">This message will be sent to all your users.</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form method="post" action="{{route('send.mail.all')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control bg-light text-dark"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Type your message here" class="form-control bg-light text-dark"
                                name="message" rows="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-light" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

<script>
    $(document).ready(function() {
        // Prevent space in first name field
        $('#input1').on('keypress', function(e) {
            return e.which !== 32;
        });

        // Search and pagination functionality
        function fetchUsers(page = 1) {
            let per_page = $('#numofrecord').val();
            let search = $('#searchitem').val();
            let order = $('#order').val();
            
            // Show loading state
            $('#userslisttbl').html('<tr><td colspan="6" class="text-center">Loading users...</td></tr>');
            
            $.ajax({
                url: "{{ route('admin.users.list') }}?page=" + page,
                type: "GET",
                data: {
                    per_page: per_page,
                    search: search,
                    order: order
                },
                success: function(response) {
                    if (response.success) {
                        $('#userslisttbl').html(response.html);
                        $('#pagination-container').html(response.pagination);
                        $('#errorsearch').addClass('d-none');
                    } else {
                        $('#errorsearch').text(response.message).removeClass('d-none');
                    }
                },
                error: function(xhr) {
                    $('#errorsearch').text('An error occurred. Please try again.').removeClass('d-none');
                    console.error(xhr.responseText);
                }
            });
        }

        // Event listeners
        $('#numofrecord, #order').change(function() {
            fetchUsers(1); // Reset to first page when filters change
        });

        // Debounced search input (500ms delay)
        let searchTimer;
        $('#searchitem').keyup(function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                fetchUsers(1);
            }, 500);
        });

        // Handle pagination clicks
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchUsers(page);
        });

        // Initial load
        fetchUsers();
    });
</script>