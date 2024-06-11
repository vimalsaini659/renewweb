<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/meanmenu.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">

    <link rel="stylesheet" href="assets/css/remixicon.css">

    <link rel="stylesheet" href="assets/css/odometer.min.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/dark.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>Coming Soon</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <style>
    .coming-soon h5 {
        margin-bottom: 27px;
        color: white;
    }
    </style>
</head>

<body>

    <div class="coming-soon-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="coming-soon">
                        <a href="index.html"><img src="assets/images/newimages/gifa-art-college-logo-1.png"
                                class="main-logo" alt="Images"></a>
                        <h1>Canvas Painting Workshop</h1>
                        <h5>FEES 1999/- ONLY WITH ALL MATERIAL INCLUDE</h5>
                        <div class="list">
                            <ul id="timer" s class="flex-wrap d-flex justify-content-center">
                                <li id="days" class="align-items-center flex-column d-flex justify-content-center"></li>
                                <li id="hours" class="align-items-center flex-column d-flex justify-content-center">
                                </li>
                                <li id="minutes" class="align-items-center flex-column d-flex justify-content-center">
                                </li>
                                <li id="seconds" class="align-items-center flex-column d-flex justify-content-center">
                                </li>
                            </ul>
                        </div>
                        <a class="default-btn active" href="competition.php">Participate now</a>               
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.meanmenu.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/carousel-thumbs.min.js"></script>

    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <script src="assets/js/aos.js"></script>

    <script src="assets/js/odometer.min.js"></script>

    <script src="assets/js/appear.min.js"></script>

    <script src="assets/js/form-validator.min.js"></script>

    <script src="assets/js/contact-form-script.js"></script>

    <script src="assets/js/ajaxchimp.min.js"></script>

    <script src="assets/js/custom.js"></script>
    <script>
    // Countdown Timer
    let comingDate = new Date('June 25, 2024 22:15:00');

    let d = document.getElementById('days');
    let h = document.getElementById('hours');
    let m = document.getElementById('minutes');
    let s = document.getElementById('seconds');

    let x = setInterval(function() {
        let now = new Date();
        let selisih = comingDate.getTime() - now.getTime();

        let days = Math.floor(selisih / (1000 * 60 * 60 * 24));
        let hours = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((selisih % (1000 * 60)) / 1000);

        d.innerHTML = getTrueNumber(days) + "<span>Days</span>";
        h.innerHTML = getTrueNumber(hours) + "<span>Hours</span>";
        m.innerHTML = getTrueNumber(minutes) + "<span>Minutes</span>";
        s.innerHTML = getTrueNumber(seconds) + "<span>Seconds</span>";

        if (selisih < 0) {
            clearInterval(x);
            d.innerHTML = '00<span>Days</span>';
            h.innerHTML = '00<span>Hours</span>';
            m.innerHTML = '00<span>Minutes</span>';
            s.innerHTML = '00<span>Seconds</span>';
        }

        displayCurrentDateTime();
    }, 1000);

    function getTrueNumber(x) {
        return x < 10 ? '0' + x : x;
    }

    // Display Current Date and Time
    function displayCurrentDateTime() {
        let now = new Date();
        let options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        let currentDateTime = now.toLocaleDateString('en-US', options);
        document.getElementById('current-date-time').innerHTML = `Current Date and Time: ${currentDateTime}`;
    }

    displayCurrentDateTime();
    </script>
</body>

</html>