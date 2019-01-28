<html>
<head>
    <script src="../js/jquery.js"></script>

    <link rel="stylesheet" href="../vendor/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/msgs.css">

    <script src="../vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body class="bg-lights">
<div class="row">
    <h1 class="col-md-12 m-2 text-center"><?php echo "HOWDY , $name"  ; ?></h1>
</div>


<div class="row m-5">
    <div  class="container col-md-6 text-center border p-5 mx-auto">
    <?php
        foreach ($array_results as $array){
            echo '<div class="main m-3 border p-1  text-center mx-auto">' ;
            echo "<h4 class='name p-3  font-weight-bold  bg-dark text-white'>".$array['user_name']."</h4>";
            echo "<p  class='message p-1 text-left bg-primary text-white' >".$array['message']."</p>";
            echo "<p  class='time text-dark text-right'>Sent in : ".$array['time_sent']."</p>";
            echo '</div>';
        }
    ?>
    </div>
</div> 


<div class="row">
<div class="col-md-6 mx-auto text-center">
    <textarea placeholder="New message" class="form-control" id="text_area" rows="2"></textarea>
    <button type="button" name="btn_send" class="btn btn-primary m-2">Send</button>
</div>
</div> 
    

<script src="../js/Ajax.js" type="text/javascript"></script>
</body>
</html>
