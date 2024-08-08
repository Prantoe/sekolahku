<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center my-4">User Details</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Username</label>
                                    <p class="form-control-plaintext">{{ $user->username }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Email</label>
                                    <p class="form-control-plaintext">{{ $user->email }}</p>
                                </div>
                            </div>

                        </div>

                        <a href="{{ route('users.index') }}" class="btn btn-md btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
