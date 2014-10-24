<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="<?=Base::baseURL()?>css/erro.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 center">
                <div class="error-template">
                    <h1>Ops!</h1>
                    <h2>404 Not Found</h2>
                    <div class="error-details">
                        Página não encontrada!
                    </div>
                    <div class="error-actions">
                        <a href="<?=Base::baseURL()?>index.php" class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-home"></span> Go to Tela Inicial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>