<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Gallery</title>
    <style>
        /* Container with gradient border */
        .animal-image-style {
            position: relative;
            width: 100%;
            height: auto;
            border-radius: 10%; /* Rounded corners for the image */
            padding: 4px; /* Space for the animated border */
            background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
            background-size: 200% 200%; /* Smooth animation scaling */
            animation: gradient-border 3s linear infinite; /* Animated gradient */
        }

        /* Animation for the gradient border */
        @keyframes gradient-border {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Ensure the actual image stays visible inside the border */
        .animal-image-style img {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 10%;
            background: #fff; /* Background inside the border */
        }

        /* Additional styling for layout */
        .bg-gray {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .color-header {
            color: #2c3e50;
        }

        .card-footer-address {
            font-size: 0.9rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <section class="bg-gray p-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 text-center mt-4">
                    <h2 class="text-left lined"><?= $getClassName($_GET['class_id']) ?></h2>
                    <div class="row justify-content-left mt-4">
                        <?php foreach ($animals as $key => $animal) { ?>
                            <div class="col-xs-6 col-sm-6 col-md-4 col-xl-3 my-2">
                                <a href="animal?an_id=<?= $animal['animal_id'] ?>" class="product-class-link">
                                    <div class="card product-card" style="border-radius: 10%">
                                        <div class="animal-image-style">
                                            <img src="../img/animals/<?= $getImageName($animal['animal_id']) ?>" alt="" />
                                        </div>
                                        <div class="card-body pt-2">
                                            <hr class="mt-0" />
                                            <h5 class="card-title font-weight-bold color-header"><?= $animal['an_given_name'] ?></h5>
                                            <p class="card-text">Species name: <?= $animal['an_species_name'] ?> </p>
                                        </div>
                                        <div class="card-footer text-muted card-footer-address">
                                            <div class="d-flex justify-content-between">
                                                <span><?= $animal['an_gender'] == "m" ? "Male":"Female" ?></span>
                                                <span>DOB <?= $animal['an_dob'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
