<?php
class requestNumber {
    public static function createRequestNumber() {
        // create a string of 26 random numbers beginning with 1
        $algo = "1";
        for ($i = 0; $i < 25; $i++) {
            // generate a random number between 0 and 9
            $num = rand(0, 9);
            // append the random number to the string
            $algo .= $num;        
        }
        return $algo;
    }
}
?>