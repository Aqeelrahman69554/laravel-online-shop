<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <input type="email" name="email" class="form-control" required placeholder="Email">

                        <input type="password" name="password" class="form-control" required placeholder="Password">

                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
