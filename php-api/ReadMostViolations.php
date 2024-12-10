<?php
session_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
    exit();
}

require('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();

    if ($_SESSION['isAdmin']) {
        // Optional filter for violation year
        $violationYear = isset($_GET['ViolationYear']) ? filter_var($_GET['ViolationYear'], FILTER_SANITIZE_STRING) : '';

        // Start constructing SQL query
        $sql = 'SELECT 
                    Programs.ProgramID, 
                    Programs.ProgramName, 
                    Programs.ProgramCode, 
                    COUNT(ViolationRecord.ViolationID) AS TotalViolations,
                    SUM(CASE WHEN ViolationRecord.ViolationType LIKE "%WithoutUniform%" THEN 1 ELSE 0 END) AS WithoutUniformCount,
                    SUM(CASE WHEN ViolationRecord.ViolationType LIKE "%WithoutID%" THEN 1 ELSE 0 END) AS WithoutIDCount
                FROM 
                    ViolationRecord 
                INNER JOIN 
                    Students ON ViolationRecord.StudentID = Students.StudentID 
                LEFT JOIN 
                    Programs ON Students.ProgramID = Programs.ProgramID';
        
        // Add optional filter for ViolationYear
        $params = [];
        if ($violationYear) {
            $sql .= ' WHERE YEAR(ViolationRecord.ViolationDate) = :ViolationYear';
            $params[':ViolationYear'] = $violationYear;
        }

        // Group and order by the total number of violations
        $sql .= ' GROUP BY Programs.ProgramID 
                  ORDER BY TotalViolations DESC 
                  LIMIT 1';

        try {
            // Prepare and execute the query
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);

            // Fetch the data
            $program = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($program) {
                $response = [
                    'status' => 'success',
                    'message' => 'Data fetched successfully.',
                    'data' => $program
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'No records found.'
                ];
            }
        } catch (PDOException $e) {
            // Handle database errors
            $response = [
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage()
            ];
            http_response_code(500);
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Access denied. Admins only.'
        ];
        http_response_code(403);
    }

    // Set Content-Type header for JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
