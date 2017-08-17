<?php 

function sayBob($bob = "", $ross)
{
    if ($bob === "") {
        throw new InvalidArgumentException("Input cannot be empty.", 45);
    } else if (!is_string($bob)) {
        throw new InvalidArgumentException("Input must be a string!");
    } else if (!ctype_alpha($bob)) {
        throw new InvalidArgumentException("Must use only letters.");
    } else if (strtolower($bob) !== "bob") {
        throw new Exception("Name must match Bob");
    } else {
        strtolower($bob);
        echo ucfirst($bob);
    }
    
}

/*
    Use the code above to do the following:

        1) Create a try/catch block and call the sayBob() function in the try block
        2) Create the catch block to output both the getMessage() and the file name
        3) Try out the test inputs listed below in try/catch block
        4) Read PHP docs on InvalidArgumentException
        5) Change appropriate throws that fall under InvalidArgumentException in sayBob() conditions and add new catch block for it before Exception
        6) Read PHP docs on ArgumentCountError and incorporate it in another catch block
        7) Try out test messages listed below again
    
    Test inputs...

        sayBob("Bob");
        sayBob(12345, "Ross");
        sayBob("Bob123", "Ross");
        sayBob("Bubba", "Ross");
        sayBob("Bob", "Ross");
*/


// The echoes before the try/catch are to help you better see output
echo PHP_EOL;
echo "==========================" . PHP_EOL;
echo "See below for the results!" . PHP_EOL;
echo "==========================" . PHP_EOL;
echo PHP_EOL;


// Write the try/catch block here

try {
    sayBob("Bob");   
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . " in " . $e->getFile();
} catch (ArgumentCountError $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
 



// The echoes after the try/catch are to help you test that Exceptions were properly caught and code continued execution
echo PHP_EOL;
echo "==========================" . PHP_EOL;
echo "This code should always run!" . PHP_EOL;
echo "==========================" . PHP_EOL;
echo PHP_EOL;
