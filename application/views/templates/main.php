<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tiketomat</title>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Rammetto+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!--bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

     <!--Optional theme --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.php"> <!-- za default route -->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.php"><!-- za direktno pristupanje kontroleru -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/custom.php"><!-- za direktno pristupanje kontroler/index -->
    

     <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<!-- header u bodyu-->
<body>
    <?= $body ?>
    
</body>
<script>
//    $(document).ready(function() {
//    // No selection at start
//    $('#my_select').prop("selectedIndex", -1);
//
//    // Set the position of the overlay
//    var offset = $('#my_select').offset();
//    offset.top += 3;
//    offset.left += 3;
//    $('#default_message_overlay').offset(offset);
//
//    // Remove the overlay when selection changes
//    $('#my_select').change(function() {
//        if ($(this).prop("selectedIndex") != -1) {
//            $('#default_message_overlay').hide();
//        }
//    });
//});
</script>

<!--footer-->
</html>
