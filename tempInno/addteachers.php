<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>ADD TEACHERS</title>
    <link href="./assets/css/bootstrap.css" rel="stylesheet" />
    <link href="./assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/css/flexslider.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" id="menu">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="addteachers.php">ADD TEACHERS</a></li>
                <li><a href="addsubjects.php">ADD SUBJECTS</a></li>
                <li><a href="addclassrooms.php">ADD CLASSROOMS</a></li>
                <li><a href="allotsubjects.php">ALLOTMENT - THEORY</a></li>
                <li><a href="allotLab.php">ALLOTMENT - LAB</a></li>
                <li>
                    <a href="allotclasses.php">ALLOTMENT - CLASSROOMS</a>
                </li>
                <li>
                    <a href="generatetimetable.php">GENERATE TIMETABLE</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>
        </div>
    </nav>

    <br />

    <div align="center" style="margin-top: 80px"></div>
    <div align="center" style="margin-top: 20px">
        <button id="teachermanual" class="btn btn-success btn-lg">
            ADD TEACHER
        </button>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content" style="margin-top: -60px">
            <div class="modal-header">
                <span class="close">&times</span>
                <h2 id="popupHead">Add Teacher</h2>
            </div>
            <div class="modal-body" id="EnterTeacher">
                <div style="display: none" id="addTeacherForm">
                    <form action="addteacherForm.php" method="POST">
                        <div class="form-group">
                            <label for="teachername">Teacher's Name</label>
                            <input type="text" class="form-control" id="teachername" name="TN" />
                        </div>
                        <div class="form-group">
                            <label for="TF">Teacher's ID</label>
                            <input type="text" class="form-control" id="facultyno" name="TF" placeholder="T..." />
                        </div>
                        <div class="form-group">
                            <label for="TF">Short Nickname</label>
                            <input type="text" class="form-control" id="alias_name" name="AL" placeholder="brief" />
                        </div>

                        <div align="right">
                            <input type="submit" class="btn btn-default" name="ADD" value="ADD" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>

    <script>
        // Get the modal element
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var addteacherBtn = document.getElementById("teachermanual");

        // Get the heading element of the modal
        var heading = document.getElementById("popupHead");

        // Get the form element for adding teacher details
        var facultyForm = document.getElementById("addTeacherForm");

        // Get the close button for the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the add teacher button, display the modal and the faculty form
        addteacherBtn.onclick = function() {
            modal.style.display = "block";
            facultyForm.style.display = "block";
        };

        // When the user clicks the close button, hide the modal and the faculty form
        span.onclick = function() {
            modal.style.display = "none";
            facultyForm.style.display = "none";
        };
    </script>

    <div>
        <br />
        <style>
            table {
                margin-top: 10px;
                font-family: arial, sans-serif;
                border-collapse: collapse;
                margin-left: 30px;
                width: 90%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>

        <script>
            // Define a function to set up delete handlers for each row in a table
            function deleteHandlers() {
                // Get the table element
                var table = document.getElementById("teacherstable");

                // Get all the rows in the table
                var rows = table.getElementsByTagName("tr");

                // For each row, set up a delete handler
                for (i = 0; i < rows.length; i++) {
                    var currentRow = table.rows[i];

                    // Define a function that returns a delete handler for the given row
                    var createDeleteHandler = function(row) {
                        return function() {
                            // Get the first cell in the row (which contains the teacher's ID)
                            var cell = row.getElementsByTagName("td")[0];
                            var id = cell.innerHTML;

                            // Ask for confirmation before deleting the teacher
                            if (confirm("Are You Sure to DELETE TEACHER?") == true) {
                                // If confirmed, navigate to the "deleteteacher.php" page with the teacher's ID in the query string
                                window.location.href = "deleteteacher.php?name=" + id;
                            }
                        };
                    };

                    // Attach the delete handler to the "Delete" button in the row
                    currentRow.cells[3].onclick = createDeleteHandler(currentRow);
                }
            }
        </script>

        <table id="teacherstable" style="margin-left: 80px">
            <caption>
                <strong>Teacher's Information </strong>
            </caption>
            <tr>
                <th width="130">Teacher's ID</th>
                <th width="290">Name</th>
                <th width="50">Short Nickname</th>
                <th width="40">Action</th>
            </tr>
            <tbody>
                <?php
                // Include the "connection.php" file to connect to the database
                include 'connection.php';

                // Query the "teachers" table and sort the results by faculty number in ascending order
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "lamp_innovative"), "SELECT * FROM teachers ORDER BY faculty_number ASC");

                // Loop through each row in the query results and display the data in a table row
                while ($row = mysqli_fetch_assoc($q)) {
                    echo "<tr><td>{$row['faculty_number']}</td><td>{$row['name']}</td><td>{$row['alias']}</td><td><button>Delete</button></td></tr>\n";
                }

                // After displaying all the rows, include a script to set up delete handlers for each row
                echo "<script>deleteHandlers();</script>";
                ?>

            </tbody>
        </table>
    </div>

    <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.flexslider.min.js"></script>
    <script src="./assets/js/scrollreveal.min.js"></script>
    <script src="./assets/js/jquery.easing.min.js"></script>
</body>

</html>