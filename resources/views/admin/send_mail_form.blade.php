@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Send Mail Users</h1>
            </div>

            <!-- Send Mail Form -->
            <div class="card bg-light">
                <div class="card-header bg-light">
                    <h4 class="text-dark">This message will be sent to the users.</h4>
                </div>
                <div class="card-body bg-light">
                    <form method="post" action="{{ route('admin.send.mail') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control bg-light text-dark" placeholder="email"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control bg-light text-dark"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Type your message here" class="form-control bg-light text-dark"
                                name="message" rows="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Send Mail Form -->
        </div>
    </div>
</div>

@include('admin.footer')