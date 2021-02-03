<?php


class BaseController
{
    private $databaseManager;
    public $result;
   
    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
        //echo "create basecontroller!!!!";
    }

    public function render(array $get, array $post)
    {

       require 'View/coach_profile.php';
    }


    //TODO: select admin role



    //TODO: update database as administrator

   
    //TODO: watch reminder

  /*  public function getWatchSchedule($databaseManager)
    {
        $sql = "SELECT watch.id, watch.name, watch.date, students.first_name FROM watch, students WHERE students.id=watch.student_id;";

        $databaseUser = $databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetchAll();

        foreach($result as $row)
        {
            // echo "<pre>";
            // var_dump($result);
            // echo "</pre>";
            $data[] = array(
                'id'   => $row["id"],
                'title'   => $row["first_name"],
                'start'   => $row["date"],
            );
        }
        echo json_encode($data);
    }
  

    public function watchReminder($id)
    {
        $sql = "SELECT user.id, user.username, user.email, watch.date 
        FROM user, watch, students 
        WHERE students.user_id=user.id AND watch.student_id=students.id AND user.id=$id";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$id]);
        $nextWatch = $databaseUser->fetch();
        return $nextWatch;
    }

    public function getClassNumber($id){

        $sql ="SELECT class_id FROM students where user_id = $id";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$id]);
        $result = $databaseUser->fetch();
        return $result["class_id"];
    }

    public function getClassmates($classNumber){

        $sql ="SELECT students.first_name, classes.name
                FROM students, classes
                WHERE students.class_id=classes.id AND classes.id=$classNumber";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$classNumber]);
        $result = $databaseUser->fetchALL();
        return $result;
    }*/
}