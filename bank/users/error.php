<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">

<style>
    .note
{
    position: absolute;
    top: 160px;
    opacity: 90%;
    right: 470px;
    width: 350px;
    min-height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: rgb(130, 192, 255);
    margin: 20px;
    padding: 10px;
    padding-bottom: 20px;
    border-radius: 10px;
}
.more
{
    margin-top: -40px;
}
.note button
{

    font-size: x-large;
    font-weight: 900;
    background-color: rgb(130, 192, 255);
    opacity: 70%;
    border: 0;
    width: 5px;
    margin-left: 300px;
}

body
{
    position: relative;
}
</style>
</head>
<body>
<section class="mid">

<?php
$result="<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>logged in logged in logged in logged in logged in logged in logged in logged inlogged in";
        echo "<form><p class =  'note' > <button onclick ='out();'>x</button>".$result. "<br><br> </p></form>";
       for ($i = 0; $i < 1000000000; $i++)
       {
        while ($i === (1000000000 - 1))
        {$j = out();}
       }
    function out()
    {
        $result="";
        header("Location: error.php?error=$result");
    }
?>

    <form class="log">
        <img class ="logo" src="tmg/sad.png" alt="company logo" height="100px">
        <br>
        <?php
        $result ="logged in logged in logged in logged in logged in logged in logged in logged inlogged in";

                echo "<p>$result</p>";


        ?>

    </form>
<script>

</script>
</section>
<?php include "footer.php"; ?> 
</body>
</html>