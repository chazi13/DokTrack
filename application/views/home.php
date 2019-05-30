<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DokTracker | Cari Dokumen</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body class="bg-warning">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-8 col-md-10 col-sm-12 my-4 offset-lg-2 offset-md-1">
                <div class="text-center mb-4">
                    <h1 class="text-white">DokTracker</h1>
                </div>
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title text-secondary">Cari Dokumen</h3>
                    </div>
                    <div class="card-block">

                        <form id="search" action="<?= base_url('home/dok/') ?>" method="get" onsubmit="return false">
                            <div class="form-group">
                                <label for="no_agenda">No Agenda :</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="no_agenda" id="no_agenda" class="form-control" placeholder="Masukan No. Agenda" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/js/tether.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script>
        $(document).ready(function () {
            $('#search').submit(function () {
                let data = $(this).serialize();
                let url = $(this).attr('action');
                console.log(url);

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: data,
                    success: function (res) {
                        $('#result').html(res);
                    }
                });
            });
        });
    </script>
</body>
</html>