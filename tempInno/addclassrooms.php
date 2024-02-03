<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PROGRAM GENERATOR</title>
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
                <li><a href="allotclasses.php">ALLOTMENT - CLASSROOMS</a></li>
                <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>
        </div>
    </nav>

    <br>

    <div align="center" style="margin-top:10%">
        <button id="classroommanual" class="btn btn-success btn-lg">ADD CLASSROOM
        </button>
    </div>

    <div id="myModal" class="modal">


        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times</span>
                <h2 id="popupHead">Add Classroom</h2>
            </div>
            <div class="modal-body" id="EnterClassroom">

                <div style="display:none" id="addClassroomForm">
                    <form action="addclassroomForm.php" method="POST">
                        <div class="form-group">
                            <label for="classroomname">Name</label>
                            <input type="text" class="form-control" id="classroomname" name="CN">
                        </div>

                        <div align="right">
                            <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

    <script>
        // Get the modal element
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var addclassroomBtn = document.getElementById("classroommanual");

        // Get the heading element inside the modal
        var heading = document.getElementById("popupHead");

        // Get the form element inside the modal
        var classroomForm = document.getElementById("addClassroomForm");

        // Get the close button element inside the modal
        var span = document.getElementsByClassName("close")[0];

        // When the "Add Classroom" button is clicked, open the modal and display the form
        addclassroomBtn.onclick = function() {
            modal.style.display = "block";
            classroomForm.style.display = "block";
        }

        // When the user clicks on the close button, close the modal and hide the form
        span.onclick = function() {
            modal.style.display = "none";
            classroomForm.style.display = "none";
        }
    </script>

    <script>
        function deleteHandlers() {
            // Get the table element by its ID
            var table = document.getElementById("classroomstable");

            // Get all the rows in the table
            var rows = table.getElementsByTagName("tr");

            // Loop through each row
            for (i = 0; i < rows.length; i++) {
                // Get the current row
                var currentRow = table.rows[i];

                // Create a new function to handle the delete button click for this row
                var createDeleteHandler = function(row) {
                    return function() {
                        // Get the ID of the classroom from the first cell in the row
                        var cell = row.getElementsByTagName("td")[0];
                        var id = cell.innerHTML;

                        // Ask the user to confirm the delete action
                        var x;
                        if (confirm("Are You Sure to DELETE CLASSROOM?") == true) {
                            // If the user confirms, redirect to the deleteclassroom.php script with the ID as a parameter
                            window.location.href = "deleteclassroom.php?name=" + id;
                        }
                    };
                };

                // Attach the delete handler to the second cell in the row (which contains the delete button)
                currentRow.cells[1].onclick = createDeleteHandler(currentRow);
            }
        }
    </script>

    <div align="center">
        <br>
        <style>
            table {
                margin-top: 10px;
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 50%;
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

        <table id=classroomstable>
            <caption><strong>Classroom's Information</strong></caption>
            <tr>

                <th width="100">Name</th>
                <th width="60">Action</th>
            </tr>
            <?php
            // Include the database connection file
            include 'connection.php';

            // Query the classrooms table to fetch all data
            $q = mysqli_query(
                mysqli_connect("localhost", "root", "", "lamp_innovative"),
                "SELECT * FROM classrooms "
            );

            // Loop through all rows of the result set and display them in an HTML table
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr><td>{$row['name']}</td><td><button>Delete</button></td></tr>\n";
            }

            // Attach a JavaScript function to the delete button to handle deleting the corresponding row from the database
            echo "<script>deleteHandlers();</script>";
            ?>
        </table>
    </div>

    <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.flexslider.min.js"></script>
    <script src="./assets/js/scrollreveal.min.js"></script>
    <script src="./assets/js/jquery.easing.min.js"></script>

</body>

</html>