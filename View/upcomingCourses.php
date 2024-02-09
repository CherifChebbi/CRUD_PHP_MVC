<?php
include '../Controller/CourseC.php';
$courseC = new CourseC();

$list = $courseC->upcomingCourse();

?>
<html>

<head></head>

<body>

    <center>
        <h1>List of courses</h1>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Course</th>
            <th>Label</th>
            <th>Duration</th>
            <th>Number of places</th>
            <th>Date Course</th>
            <td></td>
        </tr>
        <?php
        foreach ($list as $course) {
        ?>
            <tr>
                <td><?= $course['idCourse']; ?></td>
                <td><?= $course['label']; ?></td>
                <td><?= $course['duration']; ?></td>
                <td><?= $course['nbPlaces']; ?></td>
                <td><?= $course['dateCourse']; ?></td>
                <td>
                    <?php
                    if ($course['nbPlaces'] != 0) {
                    ?>
                        <button><a href="bookCourse.php?idCourse=<?php echo $course['idCourse']; ?>">Book</a></button>
                </td>
            <?php
                    } else
                        echo '<h3> Sold Out </h3>'
            ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>