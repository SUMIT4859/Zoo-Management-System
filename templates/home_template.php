<section style="background: url(../img/back.jpg)" class="py-5 bg-cover bg-center">
    <div class="hero-overlay"></div>
    <div class="container py-5 px-0 text-white text-left">
        <h1 class="text-shadow hero-heading font-weight-normal">Zoo Management System</h1>
        <p class="text-shadow font-weight-light mt-3 mb-4" style="width: 40%">
            Welcome to the world of wildlife!
            Explore the beauty of nature, 
            discover fascinating animals, 
            and join us in protecting their habitats. 
            Together, we can create a better future for all living beings.
        </p>
    </div>
</section>

<!-- welcome to Zoo Management System -->
<section class="pb-2 pt-5">
    <div class="container-fluid p-5 pb-2">
        <div class="row px-2">
            <div class="col-lg-6 col-sm-12">
                <h2>Welcome to <span class="font-weight-bold text-light-green">Zoo Management System</span></h2>
                <div style="width: 8%">

                    <hr style="border-top: 10px solid #489A33;">
                </div>
                <p class="lead text-secondary">Discover a wide range of wildlife, from majestic mammals to exotic birds, and explore our stunning galleries. Join us in celebrating and protecting the wonders of nature!.</p>
                <p class="text-small text-secondary">Our system offers a seamless experience, allowing you to view animal details, track their care, and enjoy rich media galleries showcasing their beauty. Dive deeper into the animal kingdom and help us promote conservation efforts, ensuring a better future for these incredible creatures.</p>
                <a href="gallery" class="btn btn-primary btn-sm" style="border-radius: 50px;">View Gallery</a>
            </div>
            <div class="col-lg-6 col-sm-12 mt-sm-4">
                <div class="row">
                    <div class="col">
                        <img src="../img/OIP.jpg" alt="" class="img-fluid mb-4 bordered-image" width="150px" height="100px" style="border-radius: 10%">
                        <h4 class="h5 mb-2">Australian Gecko</h4>
                        <p class="text-small text-muted">The Australian Gecko is a diverse group of small to medium-sized lizards found across Australia, known for their unique adaptations, nocturnal behavior, and ability to thrive in various environments.</p>
                    </div>
                    <div class="col">
                        <img src="../img/bear.jpg" alt="" class="img-fluid mb-4 bordered-image" width="400px" height="100px" style="border-radius: 10%">
                        <h4 class="h5 mb-2">Grizzly Bear</h4>
                        <p class="text-small text-muted">The Grizzly Bear is a large, powerful subspecies of the brown bear found in North America (Alaska, Canada, and the northwestern U.S.). It has a muscular hump, thick fur (ranging from blond to dark brown), and long claws for digging and hunting.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .bordered-image {
        position: relative;
        border: 6px solid transparent;
        background-image: linear-gradient(45deg, #FF6347, #FFD700, #32CD32, #1E90FF, #FF1493);
        background-size: 400% 400%;
        border-radius: 10%;
        animation: borderAnimation 5s infinite, glowEffect 1.5s ease-in-out infinite;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.7), 0 0 30px rgba(255, 0, 255, 0.5);
    }
	.img-fluid {
    height: 250px !important;
    width: 270px !important;
}

    @keyframes borderAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes glowEffect {
        0% {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.7), 0 0 30px rgba(255, 0, 255, 0.5);
        }
        50% {
            box-shadow: 0 0 30px rgba(255, 255, 255, 1), 0 0 40px rgba(255, 0, 255, 0.7);
        }
        100% {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.7), 0 0 30px rgba(255, 0, 255, 0.5);
        }
    }
</style>

<style>
    .bordered-image {
        position: relative;
        border: 5px solid;
        border-image: linear-gradient(45deg, #FF6347, #FFD700, #32CD32, #1E90FF, #FF1493);
        border-image-slice: 1;
        animation: borderAnimation 5s infinite linear;
    }

    @keyframes borderAnimation {
        0% {
            border-image-source: linear-gradient(45deg, #FF6347, #FFD700, #32CD32, #1E90FF, #FF1493);
        }
        25% {
            border-image-source: linear-gradient(45deg, #1E90FF, #FF6347, #FFD700, #FF1493, #32CD32);
        }
        50% {
            border-image-source: linear-gradient(45deg, #FFD700, #32CD32, #FF6347, #FF1493, #1E90FF);
        }
        75% {
            border-image-source: linear-gradient(45deg, #FF1493, #1E90FF, #FFD700, #32CD32, #FF6347);
        }
        100% {
            border-image-source: linear-gradient(45deg, #32CD32, #FF1493, #1E90FF, #FF6347, #FFD700);
        }
    }
</style>


<section class="p-3" style="background-color: #489A33">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3 class="text-center font-weight-bold text-white">Our Weekend animal</h3>
            </div>
        </div>
     
        </div>
    </div>
</section>

<!-- animal of the week -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    This week's featured <span class="font-weight-bold" style="color: #BE9D0D">Animal</span>
                    <img src="../img/number_1_hand.png" alt="" width="40px">
                </h2>

            </div>
        </div>
		
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <!-- <div style="width: 8%">
                    <hr style="border-top: 10px solid #FFE263;">
                </div> -->
                <div class="featured-animal-image">
    <img src="../img/animals/<?= $getImageName($currAnimal['animal_id']) ?>" alt="Animal Image">
</div>

            </div>
			
            <div class="col-lg-6 col-sm-12 pt-sm-4 pt-lg-2">
                <div class="row">
                    <div class="col">
                        <h3> <span class="text-dark"><?= $currAnimal['an_given_name'] ?></h3>
                        <h6> <span class="text-muted">Species name:</span>&ensp;<?= $currAnimal['an_species_name'] ?></h6>
                        <h6> <span class="text-muted">Date of birth:</span>&ensp;<?= $currAnimal['an_dob'] ?></h6>
                        <h6> <span class="text-muted">Gender:</span>&ensp;<?= $currAnimal['an_gender'] == "m" ? "Male" : "Female" ?></h6>
                        <h6> <span class="text-muted">Zoo join date:</span>&ensp;<?= $currAnimal['an_joindate'] ?></h6>
                        <?php if ($currAnimal['an_description'] != "") { ?>
                            <h6> <span class="text-muted">Description</span>&ensp;<?= $currAnimal['an_description'] ?></h6>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</section>
<style>
/* Colorful Animated Border for Image */
.featured-animal-image {
    border-radius: 20px;
    padding: 5px;
    background: linear-gradient(270deg, red, orange, yellow, green, blue, indigo, violet);
    background-size: 400% 400%;
    animation: rainbow-border 4s linear infinite;
    display: inline-block;
}

/* Image Styling */
.featured-animal-image img {
    border-radius: 20px;
    width: 100%;
    display: block;
}

/* Border Animation */
@keyframes rainbow-border {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}

</style>

<!-- Map Section -->
<section class="py-5 d-flex justify-content-center align-items-center">
    <div class="container text-center">
        <h2 class="mb-4">Explore Our Zoo</h2>
        <img src="../img/map.png" alt="Zoo Map" class="map-image">
    </div>
</section>

<!-- Custom CSS -->
<style>
    .map-image {
        width: 100%; /* Makes it take full width of the container */
        max-width: 1400px; /* Increases max size for large screens */
        height: auto; /* Maintains aspect ratio */
        display: block;
        margin: 0 auto; /* Centers the image */
        border: 5px solid #3E7331; /* Optional styling */
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }
	
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Chatbot</title>
    <link rel="stylesheet" href="../public_html/chatbot.css">
</head>
<body>

    <!-- Floating Chat Button -->
    <div class="chat-button" id="chatButton">
        <img src="../img/chat3.JPG" alt="Chat" >
    </div>

    <!-- Chatbox -->
    <div class="chat-container" id="chatContainer">
        <div class="chat-header">
            <span>Zoo Chatbot</span>
            <button class="close-btn" id="closeChat">✖</button>
        </div>
        <div class="chat-body" id="chatBody">
            <div class="bot-message">Hi! Welcome to the Zoo. How can I assist you?</div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chatInput" placeholder="Type a message...">
            <button id="sendMessage">➤</button>
        </div>
    </div>

    <script src="../public_html/chatbot.js"></script>
</body>
</html>

