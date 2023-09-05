<?php
class requestNumber {
    public static function createRequestNumber() {
        // create a string of 26 random numbers and letters beginning with 1
        $algo = "1";
        for ($i = 0; $i < 25; $i++) {
            $algo .= chr(rand(97, 122));
        }
        return $algo;
    }
}
?>