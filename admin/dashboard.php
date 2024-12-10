<?php
session_start();
$isAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : '';
if($isAdmin != true) {
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawCharts);

      function drawCharts() {
        // Data for the first chart
        var data1 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        // Options for the first chart
        var options1 = {
          title: '',
          titleTextStyle: {
          fontSize: 16,
          bold: true,
          color: '#333'
        },
          titleAlignment: 'center',
          pieHole: 0.5,
          chartArea: { left: 50, bottom: 0, top: 0, width: '100%', height: '75%' },
          backgroundColor: 'transparent'
        };

        // Render the first chart
        var chart1 = new google.visualization.PieChart(document.getElementById('idChart'));
        chart1.draw(data1, options1);

        // Data for the second chart
        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     8],
          ['Eat',      3],
          ['Commute',  3],
          ['Watch TV', 4],
          ['Sleep',    6]
        ]);

        // Options for the second chart
        var options2 = {
          title: '',
            titleTextStyle: {
            fontSize: 16,
            bold: true,
            color: '#333'
          },
          titleAlignment: 'center',
          pieHole: 0.5,
          chartArea: { left: 50, bottom: 0, top: 0,  width: '100%', height: '75%' },
          backgroundColor: 'transparent'
        };

        // Render the second chart
        var chart2 = new google.visualization.PieChart(document.getElementById('uniformChart'));
        chart2.draw(data2, options2);
      }
    </script>

    <style>
        /* Your existing CSS styles */
        body {
            font-family: "Roboto", sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 290px !important;
            height: 120vh;
            max-width: 240px !important;
            background-color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .sidebar h2 {
            margin: 0;
            color: #007BFF;
        }

        .sidebar a {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #e7f3fe;
        }
        #idChart, #uniformChart {
          text-align: center;
        }

        .main-content {
            flex-grow: 1;
            background-color: #fff;
            display: flex;
            flex-direction: column;
        }

        .header {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .blue__bar {
            background-color: #0D67A1;
            width: 100%;
            padding: 20px;
            padding-bottom: 15px;
            color: white;
        }

        .yellow__bar {
            background-color: #FFF200;
            width: 100%;
            height: 2vh;
        }

        .content-area {
            display: flex;
            margin-top: 20px;
            padding: 20px;
            flex-wrap: wrap;
        }

        /* FONT WEIGHTS */
        .roboto-thin {
          font-family: "Roboto", sans-serif;
          font-weight: 100;
          font-style: normal;
        }

        .roboto-light {
          font-family: "Roboto", sans-serif;
          font-weight: 300;
          font-style: normal;
        }

        .roboto-regular {
          font-family: "Roboto", sans-serif;
          font-weight: 400;
          font-style: normal;
        }

        .roboto-medium {
          font-family: "Roboto", sans-serif;
          font-weight: 500;
          font-style: normal;
        }

        .roboto-bold {
          font-family: "Roboto", sans-serif;
          font-weight: 700;
          font-style: normal;
        }

        .roboto-black {
          font-family: "Roboto", sans-serif;
          font-weight: 900;
          font-style: normal;
        }

        .roboto-thin-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 100;
          font-style: italic;
        }

        .roboto-light-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 300;
          font-style: italic;
        }

        .roboto-regular-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 400;
          font-style: italic;
        }

        .roboto-medium-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 500;
          font-style: italic;
        }

        .roboto-bold-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 700;
          font-style: italic;
        }

        .roboto-black-italic {
          font-family: "Roboto", sans-serif;
          font-weight: 900;
          font-style: italic;
        }

        .hamburger-button {
            background-color: #0D67A1;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 5px;
        }

        .hamburger-button:hover {
            background-color: #095386;
        }

        @media (max-width: 768px) {
            .content-area {
                flex-direction: column;
            }

            .violation-table {
                margin-right: 0;
            }

            .violation-info {
                margin-top: 20px;
            }

            .search-bar input {
                width: 100%;
            }
        }

        .inline-buttons {
            display: flex;
            gap: 10px; /* Adjust the space between buttons */
        }

        #studentDropdown {
            cursor: pointer;
        }

        .card-body{
          background-color: #f5f5f5;
          border-radius: 30px;
          height: 100%;
          box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
        }
        .card{
          border: none;
        }
        .card-title, .card-text, .chart-title{
          color: #0D67A1;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="sidebar">
        <!-- Hamburger Button -->
        <button class="hamburger-button">
            <i class="bi bi-list"></i>
        </button>
        <hr>
        <div class="sidebar-content">
            <a href="#"><i class="bi bi-grid" style="color: #0D67A1; font-size: 24px;"></i> Dashboard</a>
            <a href="studentList.php"><i class="bi bi-people" style="color: #0D67A1; font-size: 24px;"></i> Student List</a>
            <a href="violations.php"><i class="bi bi-table" style="color: #0D67A1; font-size: 24px;"></i> Violations</a>
            <a href="violations.php" id="addStudentNav" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                <i class="bi bi-person-plus" style="color: #0D67A1; font-size: 24px;"></i> Student Registration
            </a>
            <!-- Logout Button -->
            <button type="button" class="btn btn-danger mt-auto" data-bs-toggle="modal" data-bs-target="#logoutModal" style="margin-top: auto; background-color: #0D67A1; border-color: #0D67A1;">
                Logout
            </button>

            <!-- Logout Confirmation Modal -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you really want to log out?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="../php-api/logout.php" class="btn btn-danger" style="background-color: #0D67a1; border-color: #0D67A1;">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">

      <div class="header">
          <div class="blue__bar">
              <h2>Dashboard Analytics</h2>
          </div>
          <div class="yellow__bar"></div>
      </div>
      
      <h4 class="m-3 mx-3 roboto-medium fs-3" style="color: #0D67A1">Annual Summary</h4>

      <div class="row mx-3 g-5">
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="card-body">
              <p class="card-text fs-5 p-3">Program with The Most Number of Violations</p>
              <h2 class="card-title roboto-medium fs-2 fw-bold"><span id="programCode"></span> - <span id="totalViolations"></span></h2>

            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="card-body">
              <p class="card-text fs-5 p-3">Total Number of Students Without Uniform</p>
              <h2 class="card-title roboto-medium fs-2 fw-bold" id="withoutUniformCount">917</h2>
              
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="card-body">
            <p class="card-text fs-5 p-3">Total Number of Students Without ID</p>
            <h2 class="card-title roboto-medium fs-2 fw-bold" id="withoutIDCount">881</h2>

             
            </div>
          </div>
        </div>
      </div>

      <h4 class="m-3 mx-3 roboto-medium fs-3" style="color: #0D67A1">Monthly Summary</h4>

      <div class="row mx-3 g-5">
        <div class="col-sm-6">
          <div class="card text-center">
            <div class="card-body">
            <div class="chart-title mt-2" style="text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
              No. of Students without ID
            </div>
            <div id="idChart" style="width: 34rem; height: 45vh; background-color: #f5f5f5;"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card text-center">
            <div class="card-body">
            <div class="chart-title mt-2" style="text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
              No. of Students without Uniform
            </div>
            <div id="uniformChart" style="width: 34rem; height: 45vh; background-color: #f5f5f5;"></div>      
            </div>
          </div>
        </div>
      </div>
        
    </div>

    <div id="addStudentModal" class="modal" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add Student</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="addStudentForm">
                      <div class="mb-3">
                          <label for="studentNo" class="form-label">Student Number</label>
                          <input type="number" class="form-control" id="studentNo" required>
                      </div>
                      <div class="mb-3">
                          <label for="studentName" class="form-label">Student Name</label>
                          <input type="text" class="form-control" id="studentName" required>
                      </div>
                      <div class="mb-3">
                          <label for="studentProgram" class="form-label">Program</label>
                          <select class="form-select" id="studentProgram" required>
                              <option value="">Select Program</option>
                              <!-- Programs will be dynamically loaded -->
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="studentYear" class="form-label">Year</label>
                          <select class="form-select" id="studentYear" required>
                              <option value="">Select Year</option>
                              <option value="1st">1st Year</option>
                              <option value="2nd">2nd Year</option>
                              <option value="3rd">3rd Year</option>
                              <option value="4th">4th Year</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Add Student</button>
                  </form>
              </div>
          </div>
      </div>
  </div>


</body>
<script>
$(document).ready(function() {
    // Fetch data when page loads
    fetchProgramData();

    // Event listener for 'Filter Data' button
    $('#fetchData').click(function() {
        const violationYear = $('#violationYear').val();
        
        // Input validation: Check if the year is valid
        if (violationYear && (!/^\d{4}$/.test(violationYear) || violationYear < 2000 || violationYear > 2100)) {
            $('#errorMessage').text('Please enter a valid year (e.g., 2024).');
            return;
        }

        fetchProgramData(violationYear);
    });

    // Function to fetch program data via AJAX
    function fetchProgramData(violationYear = '') {
        $('#loadingMessage').text('Loading data, please wait...');
        $('#errorMessage').text(''); // Clear any previous errors
        clearDisplay(); // Clear the current data on display

        // Send AJAX request to the server
        $.ajax({
            url: '../php-api/ReadMostViolations.php',
            type: 'GET',
            data: { ViolationYear: violationYear },
            success: function(response) {
                $('#loadingMessage').text(''); // Clear loading message

                if (response.status === 'success' && response.data) {
                    // Display the program data
                    $('#programName').text(response.data.ProgramName);
                    $('#programCode').text(response.data.ProgramCode);
                    $('#totalViolations').text(response.data.TotalViolations);
                    $('#withoutUniformCount').text(response.data.WithoutUniformCount);
                    $('#withoutIDCount').text(response.data.WithoutIDCount);
                } else {
                    $('#errorMessage').text(response.message || 'No data found.');
                    clearDisplay();
                }
            },
            error: function() {
                $('#loadingMessage').text(''); // Clear loading message
                $('#errorMessage').text('Request failed. Please try again later.');
                clearDisplay();
            }
        });
    }

    // Function to clear the displayed program data
    function clearDisplay() {
        $('#programName').text('-');
        $('#programCode').text('-');
        $('#totalViolations').text('-');
        $('#withoutUniformCount').text('-');
        $('#withoutIDCount').text('-');
    }
});
</script>
</html>