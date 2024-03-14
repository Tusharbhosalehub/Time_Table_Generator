<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ADD SUBJECT</title>
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
    <div align="center" style="margin-top:80px">

        <button id="subjectmanual" class="btn btn-success btn-lg">ADD SUBJECT</button>
    </div>

    <div id="myModal" class="modal">


        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times</span>
                <h2 id="popupHead">Add Subject</h2>
            </div>
            <div class="modal-body" id="EnterSubject">

                <div style="display:none" id="addSubjectForm">
                    <form action="addsubjectForm.php" method="POST">
                        <div class="form-group">
                            <label for="subjectname">Subject Name</label>
                            <input type="text" class="form-control" id="subjectname" name="SN">
                        </div>
                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" class="form-control" id="subjectcode" name="SC" placeholder="CO...">
                        </div>
                        <div class="form-group">
                            <label for="subjecttype">Type</label>
                            <select class="form-control" id="subjecttype" name="ST">
                                <option selected disabled>Select</option>
                                <option value="THEORY">THEORY</option>
                                <option value="LAB">LAB</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subjectsemester">Semester</label>
                            <select class="form-control" id="subjectsemester" name="SS">
                                <option selected disabled>Select</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subjectdepartment">Department</label>
                            <select class="form-control" id="subjectdepartment" name="SD">
                                <option selected disabled>Select</option>
                                <option value="Computer Engg.">Computer Engg.</option>
                                <option value="Electronics Engg.">Biomedical Engg.</option>
                                <option value="Electrical Engg.">Electrical Engg.</option>
                                <option value="Mechanical Engg.">Mechanical Engg.</option>
                            </select>
                        </div>
                        <div align="right" class="form-group">
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
        var addsubjectBtn = document.getElementById("subjectmanual");

        // Get the heading element inside the modal
        var heading = document.getElementById("popupHead");

        // Get the subject form element inside the modal
        var subjectForm = document.getElementById("addSubjectForm");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the "Add Subject" button, display the modal and the subject form
        addsubjectBtn.onclick = function() {
            modal.style.display = "block";
            subjectForm.style.display = "block";
        }

        // When the user clicks on the <span> (x) inside the modal, close the modal and the subject form
        span.onclick = function() {
            modal.style.display = "none";
            subjectForm.style.display = "none";
        }
    </script>

    <div>
        <br>
        <style>
            table {
                margin-top: 10px;
                font-family: arial, sans-serif;
                border-collapse: collapse;
                margin-left: 50px;
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
            function deleteHandlers() {

                // Get the table element
                var table = document.getElementById("subjectstable");

                // Get all the rows in the table
                var rows = table.getElementsByTagName("tr");

                // Loop through all the rows in the table
                for (i = 0; i < rows.length; i++) {

                    // Get the current row
                    var currentRow = table.rows[i];

                    // Create a function that will handle the delete action for the current row
                    var createDeleteHandler =
                        function(row) {
                            return function() {

                                // Get the value of the first cell (i.e., subject code) in the current row
                                var cell = row.getElementsByTagName("td")[0];
                                var id = cell.innerHTML;

                                // Ask the user for confirmation before proceeding with the delete action
                                if (confirm("Are You Sure to DELETE SUBJECT?") == true) {
                                    window.location.href = "deletesubject.php?name=" + id;
                                }
                            };
                        };

                    // Set the onclick event handler for the "Delete" button in the current row
                    currentRow.cells[5].onclick = createDeleteHandler(currentRow);
                }
            }
        </script>

        <table id=subjectstable style="margin-left: 90px">
            <caption><strong> Subject's Information</strong></caption>
            <tr>
                <th width="150">Code</th>
                <th width=300>Title</th>
                <th width=150>Course Type</th>
                <th width="150">Semester</th>
                <th width="350">Department</th>
                <th width="40">Action</th>
            </tr>
            <?php
            // Include the database connection file
            include 'connection.php';

            // Execute a SELECT query to retrieve all the subjects from the database and order them by subject code
            $q = mysqli_query(
                mysqli_connect("localhost", "root", "", "lamp_innovative"),
                "SELECT * FROM subjects ORDER BY subject_code ASC "
            );

            // Loop through the result set and output each subject as a row in an HTML table
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr><td>{$row['subject_code']}</td>
            <td>{$row['subject_name']}</td>
            <td>{$row['course_type']}</td>
            <td>{$row['semester']}</td>
            <td>{$row['department']}</td>
            <td><button>Delete</button></td>
            </tr>\n";
            }

            // Output a JavaScript function call to set up the delete action handlers for the "Delete" buttons in the table
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