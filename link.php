<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     if(isset($_GET['id'])){
        $ev = $_GET['id'];
     }else{
        $ev= "";
     }
    ?>
    <input type="text" name="" id="event" value="<?=$ev;?>">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        let ev = document.getElementById("event").value
        console.log(ev);
        gotoSearch(ev);
    });
    function gotoSearch(value){
        
        $.ajax({
            url: 'event.php',
            method: 'POST',
            data: {
                ev: value
            },success: (response) => {
                console.log('good');
                if(response.RespCode == 200){
                    window.location.href = 'search.php'
                }
            }, error: (err) => {
                console.log('bad', err);
            }
        });
    }
</script>
</body>
</html>