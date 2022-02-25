<!-- koneksi ke DB -->
<?php
//  $con = mysqli_connect("localhost","u705028021_loginsystem","Loginsystem321","u705028021_loginsystem");

 if(isset($_POST['submit'])) {
    //  echo"<script>alert('satu dua tiga');</script>";
    // tangkap element input
    // $toping1 = $_POST['toping1'];
    // $toping2 = $_POST['toping2'];
    // $toping3 = $_POST['toping3'];
    // $toping4 = $_POST['toping4'];

    // $query = "INSERT INTO add_to_cart (toping1, toping2, toping3, toping4) VALUES ('$toping1', '$toping2', '$toping3', '$toping4')";

    // $query_run = mysqli_query($con, $query); 
 
    // if($query_run)
    // {
        echo"<script>document.location.href = './cart.php';</script>";
    // }
    // else{
    //     echo"<script>alert('Oops, gagal mengirim data');</script>";
    // }
 }
?>

  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./nouislider/nouislider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>
    <style>
        .body {
            color: white;
            padding: 50px;
        }

        .text-bold {
            font-weight: bold;
        }

        .btn {
            padding: 10px;
        }

        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }

        .kiri {
            margin-left: 20px;
        }
    </style>
</head>
<body class="body" style="background-image: url(http://mmopilot.oesman.id/wp-content/themes/gamehoak/images/codezeel/body-bg.jpg);">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="text-center">
        <img src="./nouislider/leveling.png" alt="">
    </div>
    <h2>Product Name : Leveling</h2>

<form action="" method="POST">

    <div id="slider"></div>

    <!-- value  -->
    <p>&nbsp;</p>
    <div>
        <h4 class="text-bold">From Level </h4>
        <div id="slider-padding-value-min"></div> 
    </div>

    <div>
        <h4 class="text-bold">To Level</h4>
        <div id="slider-padding-value-max"></div>
    </div>

    <div>
        <h4 class="text-bold">Total</h4>
        <p><i>syntaks belum jadi</i></p>
    </div>

    <div>
        <h4 class="text-bold">Topping</h4>
        <label for="">Toping 1 ($ 10)</label>
        <label class="switch" > 
            <input type="checkbox" name="toping1" value="10">
            <span class="slider round"></span>
        </label>

        <label for="" class="kiri">Toping 2 ($ 20)</label>
        <label class="switch" > 
            <input type="checkbox" name="toping2" value="20">
            <span class="slider round"></span>
        </label>

        <label for="" class="kiri">Toping 3 ($ 30) </label>
        <label class="switch" > 
            <input type="checkbox" name="toping3" value="30">
            <span class="slider round"></span>
        </label>
        <label for="" class="kiri">Toping 4 ($ 40) </label>
        <label class="switch" > 
            <input type="checkbox" name="toping4" value="40">
            <span class="slider round"></span>
        </label>
    </div>

    <div style="margin-top: 30px;">
        <a href="#" target="_blank"><button class="btn btn-primary" name="submit">Add To Cart</button></a>

        <a href="https://refreshless.com/nouislider/" target="_blank"><button class="btn btn-primary">Dokumentasi</button></a>
    </div>
</form>
    
<script src="./nouislider/nouislider.js"></script>
<script>
   var slider = document.getElementById('slider');
   
   noUiSlider.create(slider, {
       start: [20, 50],
       connect: true,
       step: 1,
       tooltips : true,
       range: {
           'min': 0,
           'max': 60
       },
       format: wNumb( { decimals: 0})
   });

var paddingMin = document.getElementById('slider-padding-value-min');
var paddingMax = document.getElementById('slider-padding-value-max');

   slider.noUiSlider.on('update', function (values, handle) {
    if (handle) {
        paddingMax.innerHTML = values[handle];
    } else {
        paddingMin.innerHTML = values[handle];
    }
});
</script>  
</body>
</html>
