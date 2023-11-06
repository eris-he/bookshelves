<?php
    session_start();
    require "vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();
    require 'header.php';

    function initialize() {
        global $init;
        global $conn;
        if ($init) return;
        $conn = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PW'], $_ENV['DB']);
        if ($conn->connect_error) {
            echo "<h1>Connection failed<h1>";
            die("Connection failed: " . $conn->connect_error);
        }
        $init = TRUE;
    }

    initialize();
?>
<DOCTYPE html>
<div>
    <?php
        $auth_token = "";
        $csrfToken = "";
        $csrfToString = "";
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $csrfToken = $_SESSION['csrf_token'];
        }

        if (isset($_SESSION['csrf_token'])) {
            $authURL = "https://connect.squareup.com/oauth2/authorize?client_id=sq0idp-7M6staUrwyK3gtvZP-BJgg&scope=ITEMS_WRITE+ITEMS_READ+INVENTORY_WRITE+INVENTORY_READ&session=false&state=" . $csrfToken;
            echo "<h2 style='text-align:center; margin:auto;'><a href=" . $authURL . ">Authorize Application Here</a></h2>";
            # display csrf token for debugging
            $csrfToString = $_SESSION['csrf_token'];
            echo "<h2 style='text-align:center; margin:auto;'>CSRF Token: " . $csrfToString . "</h2>";
        }

        # Handle the authorization response when a merchant approves my application
        if (isset($_GET['response_type']) && isset($_GET['state'])) {
            $auth_code = $_GET["code"];
            $csrfResponse = $_GET["state"];
            assert($csrfResponse == $csrfToString);

            $ch = curl_init('https://connect.squareupsandbox.com/oauth2/token');

            // Prepare the data to send in the POST request
            $postData = json_encode([
                'client_id' => $_ENV['SQUARE_PROD_APP_ID'],
                'client_secret' => $_ENV['SQUARE_PROD_APP_SECRET'],
                'code' => $auth_code,
                'grant_type' => 'authorization_code'
            ]);

            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Square-Version: 2023-10-18',
                'Content-Type: application/json',
            ]);

            // Execute the cURL session and fetch the response
            $response = curl_exec($ch);

            // Check for cURL errors
            if (curl_errno($ch)) {
                die('cURL error: ' . curl_error($ch));
            }

            // Close the cURL session
            curl_close($ch);

            // Decode the JSON response
            $responseData = json_decode($response, true);

            // Check if the response contains the access token
            if (isset($responseData['access_token'])) {
                $accessToken = $responseData['access_token'];
                $tokenType = $responseData['token_type'];
                $expiresAt = $responseData['expires_at'];
                $merchantId = $responseData['merchant_id'];
                $refreshToken = $responseData['refresh_token'];
                $shortLived = $responseData['short_lived'];
                $refreshTokenExpiresAt = $responseData['refresh_token_expires_at'];

                $sql = "INSERT INTO auth_info (access_token, token_type, expires_at, merchant_id, refresh_token, short_lived, refresh_token_expires_at) VALUES ('$accessToken', '$tokenType', '$expiresAt', '$merchantId', '$refreshToken', '$shortLived', '$refreshTokenExpiresAt')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<h2 style='text-align:center; margin:auto;'>Authorization successful!</h2>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                // Handle error: access token not found in the response
                echo json_encode($response);
                die('Error: Access token not found in the response');
            }
        }
    ?>
    <div>
        <?php
            require 'footer.php';
        ?>
    </div>
</div>
