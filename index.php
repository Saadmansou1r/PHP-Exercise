<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caculator</title>
    <link rel="stylesheet" href="style.css">



</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h2>Calculator</h2>
<input type="text" name="num01" placeholder="Enter First number">

<input type="text" name="num2" placeholder="Enter Second number">
<label for="operator">Chose Operator</label>
    <select id="operator" name="operator">
      <option value="sum">+</option>
      <option value="multiple">*</option>
      <option value="subtract">-</option>
      <option value="divison">/</option>
    </select>
    <div class="btn">
    <button class="submit">Calculate</button>
    </div>

    </form>
    <?php
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Take the data from input
        $num1 =filter_input(INPUT_POST,"num01",FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 =filter_input(INPUT_POST,"num2",FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);
    }
        //Error handler
        $error =false;
        if(empty($num1)||empty($num2)|| empty($operator)){
            echo "<p class='calc-error'>Fill in all fields</p>";
            $error= true;
        }

        if(!is_numeric($num1)||!is_numeric($num2)){
            echo "<p class='calc-error'>you can only write numbers</p>";
            $error=true;
        }
        if(!$error){
            $result=0;
            switch($operator){
                case "sum":{
                    $result =$num1+$num2;
                    break;
            }
            case "multiple":{
                $result=$num1*$num2;
                break;
            }
            case "subtract":{
                $result=$num1-$num2;
                break;
            }
            case "divison":{
                $result=$num1/$num2;
                break;
            }
            default:{
                echo "<p class='calc-error'>somthing went wrong</p>";
            }
        }
        echo "<p class='calc-result'>Result = ". $result ."</p>";
    

        }
    
    
    ?>

</body>
</html>