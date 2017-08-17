<?php

require_once __DIR__ . "/../Input.php";

function echoNumber($input)
{
    if(!is_numeric($input)) {
        throw new Exception("Input must be a number such as a float or an integer.");
    } else {
        echo $input;
    }
}

$input = Input::get('number', 0);
echo echoNumber($input);

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form>
        <label for="number">Number</label>
        <input type="text" name="number" placeholder="What's your favorite number?">

        <button type="submit">Enter number </button>
    </form>
</body>
</html>