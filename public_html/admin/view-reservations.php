<?php
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require_once '../imports.php';
require_once '../header.php';

$sql = "SELECT * FROM reservations WHERE bIsArchived = 0";
$result = DB::$conn->query($sql);
?>

<!DOCTYPE html>
<div class="footer-wrap">
    <div class="body-template center">
        <h1> Manage Reservations </h1>
        <!-- PUT YOUR CONTENT HERE, IN BETWEEN THESE CLASSES PLS AND THANK YOU. -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Reservation Number</th>
                    <th>Reserver Email</th>
                    <th>Book Title</th>
                    <th>Book Author</th>
                    <th>ISBN</th>
                    <th>Date Requested</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['vcReservationNumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['vcEmail']); ?></td>
                        <td><?php echo htmlspecialchars($row['vcTitle']); ?></td>
                        <td><?php echo htmlspecialchars($row['vcAuthor']); ?></td>
                        <td><?php echo htmlspecialchars($row['vcISBN']); ?></td>
                        <td><?php echo htmlspecialchars($row['dtDateReserved']); ?></td>
                        <td>
                            <select name="status" class="form-select">
                                <option value="Pending" <?php echo $row['vcStatus'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="Approved" <?php echo $row['vcStatus'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                <option value="In Progress" <?php echo $row['vcStatus'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Ready For Pickup" <?php echo $row['vcStatus'] == 'Ready For Pickup' ? 'selected' : ''; ?>>Ready For Pickup</option>
                                <option value="Completed" <?php echo $row['vcStatus'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary update-btn">Update</button>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='7'>No results found</td></tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
    <?php
    require_once '../footer.php';
    ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const form = button.parentElement.parentElement;
            const formData = new FormData();
            formData.append('reservationNumber', form.querySelector('td:first-child').innerText);
            formData.append('status', form.querySelector('select').value);
            formData.append('isbn', form.querySelector('td:nth-child(5)').innerText);
            console.log(formData)
            
            fetch('update-reservation.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                let toast = {
                    title: "Success",
                    message: "Record updated successfully.",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 10000
                }
                Toast.create(toast);
            })
            .catch(error => {
                alert('An error occurred updating the record.');
                console.error('Error:', error);
            });
        });
    });
});
</script>