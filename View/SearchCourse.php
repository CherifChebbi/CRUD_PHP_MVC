<?php
include '../Controller/CourseC.php';
$courseC = new CourseC();

if (isset($_GET['label']) && !empty($_GET['label'])) {
    $list = $courseC->showCourse($_GET['label']);
} else {
    $list = $courseC->listCourses();
}
?>
<html>

<head></head>

<body>

    <div>
        <form action="" method="GET">
            <input type="text" name="label" id="label" placeholder="Enter Course name">
            <input type="submit" value="Search">
        </form>
    </div>

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
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>