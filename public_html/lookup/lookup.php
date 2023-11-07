<?php
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../../");
    $dotenv->load();
    require '../imports.php';
    $_SESSION['lookup_code'] = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lookup_code'])) {
        $_SESSION['lookup_code'] = $_POST['lookup_code']; // Set the session variable with form input
    }
?>
<!DOCTYPE html>
<div class="footer-wrap">
    <div class="body-template">
        <!-- put all your html code here -->
        <h2 class="center">Look Up Your Reservation or Request</h2>
        <form class="lookup-form" method="POST">
            <div class="row center">
                <div class="col-lg-11">
                    <input type="text" id="lookup_code" name="lookup_code" class="form-control" placeholder="Input your request or reservation number here." required><br><br>
                </div>
                <div class="col-lg-1">
                <!-- Submit button -->
                <button type="submit" class="btn btn-light" style="width:100%;">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </form>

        <div>
            <?php
                $displayResult = false;
                if(isset($_SESSION['lookup_code'])) {
                    // Use prepared statements to prevent SQL injection
                    if (substr($_SESSION['lookup_code'], 0, 1) == '1') {
                        $stmt = DB::$conn->prepare("SELECT * FROM requests WHERE vcRequestNumber = ?");
                        $stmt->bind_param("s", $_SESSION['lookup_code']);
                        $displayResult = true;
                    } elseif (substr($_SESSION['lookup_code'], 0, 1) == '2') {
                        $stmt = DB::$conn->prepare("SELECT * FROM reservations WHERE vcReservationNumber = ?");
                        $stmt->bind_param("s", $_SESSION['lookup_code']);
                        $displayResult = true;
                    } elseif ($_SESSION['lookup_code'] == "") {
                        $displayResult = false;
                    } else {
                        echo "<h2 class='center'>Invalid lookup code.</h2>";
                        $displayResult = false;
                    }
                    
                    if($displayResult) {
                        // Execute the query
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if we got a result
                        if ($row = $result->fetch_assoc()) {
                            $status = $row["vcStatus"];
                            echo "<h2 class='center'>" . (substr($_SESSION['lookup_code'], 0, 1) == '1' ? "Request " : "Reservation ") . htmlspecialchars($_SESSION['lookup_code']) . "</h2>";
                            echo "<h3 class='center'>The status of your " . (substr($_SESSION['lookup_code'], 0, 1) == '1' ? "request" : "reservation") . " is: " . htmlspecialchars($status) . ".</h3>";
                            echo "<h3 class='center'>If you have any other questions, please contact us.</h3>";
                        } else {
                            echo "<h2 class='center'>No records found.</h2>";
                        }
                        // Close statement
                        $stmt->close();
                    }
                }
            ?>
        </div>
    </div>
    <?php
        require '../footer.php';
    ?>
</div>