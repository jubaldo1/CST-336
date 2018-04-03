<?php include 'DBConnection.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Program Practice 2</title>
    </head>
    <body>
        <?php
            $conn = getDataBaseconnection('midterm');
            
            echo "<b>List of all female students:<br></b>";
            
            $sql = "SELECT * FROM `m_students`
                    WHERE gender = 'F'
                    ORDER BY lastName ASC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['firstName'] . " | " . $record['lastName'] . "<br>";
            }
            
            echo "<br><b>List of students that have assignments with a grade lower than 50:<br></b>";
            
            $sql = "SELECT * FROM `m_students`
                    LEFT JOIN `m_gradebook` ON m_students.studentId = m_gradebook.studentId
                    WHERE grade < 50
                    ORDER BY grade ASC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['firstName'] 
                . " | " . $record['lastName'] 
                . " | " . $record['grade'] . "<br>";
            }
            
            echo "<br><b>List of assignments that have not been graded:<br></b>";
            
            $sql = "SELECT * FROM `m_assignments`
                    WHERE m_assignments.assignmentId NOT IN (SELECT `assignmentId` FROM `m_gradebook`)
                    ORDER BY dueDate ASC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['title'] . " | " . $record['dueDate'] . "<br>";
            }
            
            echo "<br><b>Gradebook:<br></b>";
            
            $sql = "SELECT * FROM `m_students`
                    LEFT JOIN `m_gradebook` ON m_students.studentId = m_gradebook.studentId
                    LEFT JOIN `m_assignments` ON m_gradebook.assignmentId = m_assignments.assignmentId
                    ORDER BY lastName ASC, title ASC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['firstName'] 
                . " | " . $record['lastName']
                . " | " . $record['title'] 
                . " | " . $record['grade'] . "<br>";
            }
            
            echo "<b><br>List of average grade per student (average of the three assignments):</b><br>";
            
            $sql = "SELECT firstName, lastName, AVG(grade) AS avg FROM `m_gradebook`
                    LEFT JOIN `m_students` ON m_students.studentId = m_gradebook.studentId
                    GROUP BY m_students.firstName
                    ORDER BY avg DESC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
            foreach($records as $record)
            {
                echo $record['firstName']
                . " | " . $record['lastName']
                . " | " . $record['avg'] . "<br>";
            }
        ?>
        
        <br><br><b>Rubric</b>
        <div>
            
                                <table border="1" width="600">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>1</td>
                                        <td>A report shows all female students ordered by last name, from A to Z</td>
                                        <td width="20" align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>2</td>
                                        <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>3</td>
                                        <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>4</td>
                                        <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                                        <td align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>5</td>
                                        <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>6</td>
                                        <td>This rubric is properly included AND UPDATED (BONUS)</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center"><b></b></td>
                                    </tr>
                                </tbody></table>
                            
        </div>

    </body>
</html>