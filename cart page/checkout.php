<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    // include "koneksi.php";
    // $conn = mysqli_connect("localhost","u705028021_loginsystem","Loginsystem321","u705028021_loginsystem");
    $conn = mysqli_connect("localhost","root","","ssve");
    $query    =mysqli_query($conn, "SELECT * FROM add_to_cart WHERE id='$id'");
    $result    =mysqli_fetch_array($query);
?>

<?php 
// if pay now button is clicked 

if(isset($_POST['submit'])){
    echo"<script>document.location.href = './pdf.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./nouislider.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            margin-left: 10px;
        }
    </style>
</head>
<body class="body" style="background-image: url(http://mmopilot.oesman.id/wp-content/themes/gamehoak/images/codezeel/body-bg.jpg);">

<h1 class="mb-5">Billing Details</h1>

<form class="row g-3" action="" method="POST">
  <div class="col-md-6">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="col-md-6">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" id="Email" name="Email" required>
  </div>
  <div class="col-12">
    <label for="adress" class="form-label">Address</label>
    <input type="text" class="form-control" id="adress" placeholder="1234 Main St" name="adress">
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option value="United States">United States</option>
      <option value="England">England</option>
      <option value="Indonesia">Indonesia</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="zip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="zip">
  </div>

  <div>
      <p>Product Name : Leveling</p>


  </div>

  <div class="row mt-3 mb-3">
    <button type="submit" class="btn btn-primary kiri" name="submit">Pay Now</button>
  </div>

  <div>
      <a href="./pdf.php?id=<?php $id ?>; ?>">pdf check</a>
  </div>
</form>

    
<script src="./nouislider.js"></script>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
