
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
</head>
<body>
    <div id="getdata"></div>
    <script type="text/javascript">
    function dis()
    {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","chatFetch.php",false);
        xmlhttp.send(null);
        document.getElementById("getdata").innerHTML=xmlhttp.responseText;
    }
    dis();
setInterval(function(){
    dis();
},2000);

    </script>
</body>

</html>