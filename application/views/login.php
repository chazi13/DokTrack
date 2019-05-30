<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | DokTracker</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body class="bg-warning">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12 mt-4 offset-lg-4 offset-md-3">
                <div class="text-center mb-4">
                    <h1 class="text-white">DokTracker</h1>
                </div>
                <div class="card">
                    <div class="card-block">
                        <div class="text-center">
                            <p class="text-secondary">Login To Manage</p>
                        </div>

                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Your Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="**************" required>
                            </div>

                            <div class="text-right pull-right">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>