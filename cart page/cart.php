<?php 

$con = mysqli_connect("localhost","u705028021_loginsystem","Loginsystem321","u705028021_loginsystem");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function query($datas) {
 global $con;
 $result = mysqli_query($con, $datas); 
 $datakosong = [];

 while( $isidata = mysqli_fetch_assoc($result)) {
     $datakosong[] = $isidata;
 }

 return $datakosong;   
}

$datas = query("SELECT * FROM add_to_cart");  
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

        .font-color {
            color: white;
        }

        .text-bold {
            font-weight: bold;
        }

        .btn {
            padding: 10px;
        }

        .underline {
            text-decoration: none;
            color: white;
        }

        .list-style {
            list-style: none;
        }
    </style>
</head>
<body class="body" style="background-image: url(http://mmopilot.oesman.id/wp-content/themes/gamehoak/images/codezeel/body-bg.jpg);">


<h1 class="mb-5">YOUR CART</h1>

<table class="table font-color">
<?php $i = 1; ?>
  <thead>
    <tr class="bg-danger">
      <th scope="col">No</th>
      <th scope="col">Product</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($datas as $data) :?>

    <tr>
      <td><?= $i; ?></td>
      <td>
          <img src="./images/leveling.png" alt="" width="180" height="180" class="float-start" style="margin-right: 10px;">
          <p>From Level : </p>
          <p>To Level : </p>
          <ul class="list-style">
              <li> $ <?= $data["toping1"];?></li>
              <li> $ <?= $data["toping2"];?></li>
              <li> $ <?= $data["toping3"];?></li>
              <li> $ <?= $data["toping4"];?></li>
          </ul>
        </td>
      <td><a href="./checkout.php?id=<?= $data['id']; ?>" class="underline">Check Out</a></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

    
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
