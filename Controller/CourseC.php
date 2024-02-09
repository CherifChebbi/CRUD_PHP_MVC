<?php
include '../config.php';
include '../Model/Course.php';

class CourseC
{
    function showCourse($libelle)
    {
        $sql = "SELECT * FROM course WHERE label LIKE '%" . $libelle . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function upcomingCourse()
    {
        echo date("Y/m/d");
        $sql = "SELECT * FROM course WHERE dateCourse >= '" . date("Y-m-d") . "'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listCourses()
    {
        $sql = "SELECT * FROM course";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function bookCourse($idCourse, $idClient)
    {
        $sql = "INSERT INTO reservation  
        VALUES (NULL, :idClient,:idCourse)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idClient' => $idClient,
                'idCourse' => $idCourse
            ]);
            $course = $this->getCourse($idCourse);
            echo $course['nbPlaces'] - 1;
            $query = $db->prepare(
                'UPDATE course SET nbPlaces = ' . $course['nbPlaces'] - 1
                    . ' WHERE idCourse= ' . $idCourse
            );
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function getCourse($id)
    {
        $sql = "SELECT * from course where idCourse = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $course = $query->fetch();
            return $course;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
