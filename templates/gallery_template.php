<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Image Gallery</h2> <!-- needs 600x400 image -->
        <p class="lead">Photos of animals in their habitat.</p>
        <div class="row">
            <?php foreach ($galleryImage as $img) { ?>
                <a href="../img/gallery/image/<?= $img['g_file_name'] ?>" data-lightbox="gallery" data-title="Description of Project No.1" class="col-lg-4 col-sm-6 p-0">
                    <img src="../img/gallery/image/<?= $img['g_file_name'] ?>" alt="" style="border-radius: 15px; width: 360px; height: 300px; margin: 10px;" class="img-fluid amazing-border">
                </a>
            <?php } ?>
        </div>
        <h2 class="lined mb-4 mt-5">Teaser Video Gallery</h2> <!-- needs 600x400 image -->
        <p class="lead">Videos of animals Events in their habitat.</p>
        <div class="row justify-content-center">
            <?php foreach ($galleryVideo as $video) { ?>
                <div class="col-12 text-center">
                    <video src="../img/gallery/video/<?= $video['g_file_name'] ?>" poster="" width="480" controls>
                    </video>
                </div>
            <?php } ?>
        </div>
    </div>

    <style>
        @keyframes running-border {
            0% {
                border-color: #FF5733; /* Red */
                box-shadow: 0 0 15px #FF5733;
            }
            25% {
                border-color: #33FF57; /* Green */
                box-shadow: 0 0 15px #33FF57;
            }
            50% {
                border-color: #3357FF; /* Blue */
                box-shadow: 0 0 15px #3357FF;
            }
            75% {
                border-color: #F933FF; /* Purple */
                box-shadow: 0 0 15px #F933FF;
            }
            100% {
                border-color: #FF5733; /* Red */
                box-shadow: 0 0 15px #FF5733;
            }
        }

        .amazing-border {
            border: 5px solid transparent;
            border-radius: 15px;
            animation: running-border 6s linear infinite;
            transition: transform 0.3s ease-in-out;
        }

        .amazing-border:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }
    </style>
</section>
