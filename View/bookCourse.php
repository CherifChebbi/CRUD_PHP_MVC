<?php
include '../Controller/CourseC.php';

$courseC = new CourseC();
$courseC->bookCourse($_GET["idCourse"], 1);
header('Location:upcomingCourses.php');
