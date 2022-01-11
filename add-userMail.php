<?php

$message = ' <html lang="fr" dir="ltr">
                        <head>
                            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                            <meta charset="utf-8">
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
                            <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
                            <title>Recommand it</title>
                        </head>
                            <body>
                                <div class="container-fluid row justify-content-center mx-auto">
                                    <div class="card-fluid bg-light my-5 col-lg-6 shadow p-3 mb-5 bg-white rounded">
                                        <div class="card-body">
                                            <div class="mb-5">
                                                <h1 class="text-center pb-4">Recommand <span class="text-danger">it</span></h1>
                                                <p class="Veuillez cliquer sur le lien pour valider votre inscription"</p>
                                                <a href="http://www.recommandit.com/page-user.php?nickname=<?= $nickname ?>&amp;id=<?= $user->id ?>" class="btn btn-danger">Valider</a>
                                            </div>
                                        </div>
                                    </div>
                                </body>
                        </html>';
$subject = 'Activation du compte';
$header = 'From www.recommandit.com';
mail($mail, $subject, $message, $header);

