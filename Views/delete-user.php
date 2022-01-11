
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../Public/assets/css/style.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
        <title>Recommand it</title>
    </head>
    <body>
        <div class="container-fluid row justify-content-center mx-auto">
            <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                        <?php if (isset($success)) { ?>
                            <p class="alert alert-success text-center">Votre Compte a bien été supprimé !</p>
                        <?php } else { ?>
                            <p class="alert alert-danger text-danger">Echec de la suppression !</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="../Public/assets/js/script.js"></script>
    </body>
</html>


