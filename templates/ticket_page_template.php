<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Book Tickets</h2> <!-- needs 600x400 image -->
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ticket Group</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Regular</td>
                            <td>₹60.00</td>
                        </tr>
                        <tr>
                            <td>Student</td>
                            <td>₹30.00</td>
                        </tr>
                        <tr>
                            <td>Child</td>
                            <td>₹20.00</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-5">
                    <h5>Select Number of Tickets</h5>
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-' . $_GET['type'] . ' alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                         </div>';
                    } ?>
                    <form method="POST" action="process_payment.php">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="book_name" placeholder="Name of person who books the tickets" value="<?= (isset($_SESSION['v_firstname']) && isset($_SESSION['v_lastname'])) ? $_SESSION['v_firstname'] . ' ' . $_SESSION['v_lastname'] : "" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="regular" class="col-sm-2 col-form-label">Regular:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="regular" value="0" name="regular_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student" class="col-sm-2 col-form-label">Student:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="student" value="0" name="student_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="child" class="col-sm-2 col-form-label">Child:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="child" value="0" name="child_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="date" name="t_date" min="<?= date('Y-m-d') ?>" required>

                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                               <?php if (isset($_SESSION['authenticated'])) { ?>
    <button type="button" class="btn btn-success" id="payBtn">Pay Now</button>
<?php } else { ?>
    <button class="btn btn-danger" disabled>You have to be logged in to book tickets</button>
<?php } ?>
 
                            </div>
                        </div>
                        <!-- start of paypal -->

                        <!-- end of paypal -->
                    </form>
					
					<!-- Include Razorpay Checkout script -->
<!-- Razorpay script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const payBtn = document.getElementById('payBtn');

    if (payBtn) {
        payBtn.addEventListener('click', function (e) {
            e.preventDefault();

            // Get form values
            var name = document.getElementById('name').value.trim();
            var regular = parseInt(document.getElementById('regular').value) || 0;
            var student = parseInt(document.getElementById('student').value) || 0;
            var child = parseInt(document.getElementById('child').value) || 0;
            var date = document.getElementById('date').value;

            var totalAmount = (regular * 60 + student * 30 + child * 20) * 100; // in paise

            if (totalAmount === 0) {
                alert("Please select at least one ticket.");
                return;
            }

            if (!name || !date) {
                alert("Please fill in your name and select a date.");
                return;
            }

            var options = {
                "key": "rzp_test_Nvgpl8qRaMzktR", // Replace with your Razorpay key
                "amount": totalAmount,
                "currency": "INR",
                "name": "Zoo Booking",
                "description": "Ticket Payment",
                "handler": function (response) {
                    // AJAX to send booking details to server
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "process_payment.php", true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            window.location.href = "ticket_page.php?msg=Ticket booked successfully!&type=success";
                        } else {
                            window.location.href = "ticket_page.php?msg=Payment failed. Please try again.&type=danger";
                        }
                    };
                    xhr.send("razorpay_payment_id=" + response.razorpay_payment_id +
                        "&book_name=" + encodeURIComponent(name) +
                        "&regular_num=" + regular +
                        "&student_num=" + student +
                        "&child_num=" + child +
                        "&t_date=" + date
                    );
                },
                "modal": {
                    "ondismiss": function () {
                        window.location.href = "ticket_page.php?msg=Payment was cancelled by user.&type=warning";
                    }
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            var rzp1 = new Razorpay(options);

            // Handle payment failure
            rzp1.on('payment.failed', function (response) {
                window.location.href = "ticket_page.php?msg=Payment failed. Please try again.&type=danger";
            });

            rzp1.open();
        });
    }
});
</script>

<style>
/* Zoo Ticket Booking Table Styles with Animated RGB Border */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4ec;
    color: #333;
    padding: 20px;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    animation: tableFadeIn 1s ease-in-out;
    border: 4px solid transparent;
    background-image: linear-gradient(#ffffff, #ffffff), 
                      linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    background-origin: border-box;
    background-clip: content-box, border-box;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    position: relative;
}

/* Header Styling */
.thead-dark th {
    background-color: #4a90e2;
    color: #ffffff;
    font-size: 1.2em;
    padding: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
}

/* Row Styling */
.table-bordered tbody tr {
    background-color: #fefefe;
    transition: background-color 0.4s, transform 0.4s;
}

/* Hover Effect */
.table-bordered tbody tr:hover {
    background-color: #f3e8ac;
    transform: scale(1.05) rotate(-2deg);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

/* Table Row Borders */
.table-bordered td, .table-bordered th {
    padding: 12px 20px;
    text-align: center;
    border: 2px solid transparent;
}

/* Zebra Stripe Effect */
.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f3d5;
}

/* Animated Border Effect */
.table::before {
    content: "";
    position: absolute;
    top: -4px;
    left: -4px;
    right: -4px;
    bottom: -4px;
    background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    z-index: -1;
    border-radius: 15px;
    animation: rainbow 5s linear infinite;
}

/* Rainbow Border Animation */
@keyframes rainbow {
    0% { filter: hue-rotate(0deg); }
    100% { filter: hue-rotate(360deg); }
}

/* Entry Animation */
@keyframes tableFadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


/* Zoo Ticket Booking Form Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4ec;
    padding: 20px;
}

/* Form Container */
.form-container {
    width: 80%;
    margin: auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    border: 4px solid transparent;
    background-image: linear-gradient(#ffffff, #ffffff), 
                      linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    background-origin: border-box;
    background-clip: content-box, border-box;
    animation: formFadeIn 1s ease-in-out;
}

/* Input Group */
.form-group {
    margin-bottom: 20px;
    position: relative;
}

/* Labels */
.form-group label {
    font-weight: 600;
    color: #4a90e2;
    font-size: 1.1em;
    margin-bottom: 5px;
    display: block;
}

/* Input Fields */
.form-group input {
    width: 100%;
    padding: 15px;
    border-radius: 10px;
    border: 2px solid #ddd;
    font-size: 1em;
    transition: all 0.4s ease;
}

/* Input Focus Effect */
.form-group input:focus {
    border-color: #4a90e2;
    outline: none;
    box-shadow: 0 0 15px rgba(74, 144, 226, 0.5);
}

/* Button Styling */
.button-container {
    text-align: center;
    margin-top: 30px;
}

.button-container button {
    background-color: #4a90e2;
    color: #ffffff;
    padding: 15px 30px;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    letter-spacing: 1px;
    transition: all 0.4s ease;
}

.button-container button:hover {
    background-color: #ffffff;
    color: #4a90e2;
    border: 2px solid #4a90e2;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Entry Animation */
@keyframes formFadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>



                </div>

            </div>
        </div>
    </div>
</section>