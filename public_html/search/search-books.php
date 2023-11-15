<?php
    require '../database/dbConn.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $genre = $_POST['genre'] ?? '';
        $searchText = $_POST['searchText'] ?? '';

        $sql = "SELECT * FROM books WHERE ";  // 'books' is your table name
        $conditions = [];
        $params = [];

        if ($genre !== '' && $genre !== 'all') {
            $conditions[] = "genre = ?";
            $params[] = $genre;
        }

        if ($searchText !== '') {
            $conditions[] = "(title LIKE ? OR author LIKE ?)";
            $params[] = "%$searchText%";
            $params[] = "%$searchText%";
        }

        if (count($conditions) > 0) {
            $sql .= implode(' AND ', $conditions);
        } else {
            // Handle case where no filters are set (or return an error)
            $sql .= "1"; // Gets all books if no filters are applied
        }

        $stmt = DB::$conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        echo json_encode($books);
    }
?>
