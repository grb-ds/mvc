<?php 
require 'includes/header_watch.php';
//require 'includes/nav_coach.php';
require_once 'handles/userHandle.php';
require_once 'handles/coacherHandle.php';




?>


<div class="container-profile">
    <div class="grid-profile">
        <div class="welcome-msg">
            <h3>Welcome,
                <span class="welcome-name"><?php echo $_SESSION["logginUserName"]; ?>!</span><br></h3>
               <h5> How are you doing today?</h5>
            
        </div>
        <div class="exercise-list">
            <h3>Exercises</h3>
            <?php foreach($_SESSION["challenges"] as $challenge){?>
            <div id="challenge"><p><b>Name:</b> <?php echo $challenge["name"];?></p>
                <p><b>Date:</b> <?php echo $challenge["date_open"];?> - <?php echo $challenge["date_due"];?></p>
                <a href="<?php echo $challenge["url"];?>"><?php echo $challenge["url"];?></a>
            </div><?php }?>

       
           <!-- <button type="submit" name="createChallenge"><a href="View/create_challenge.php">Create New Challenge</a></button>-->
            <button type="submit" name="createChallenge"><a href="index.php?page=createChallenge">Create New Challenge</a></button>
            
        </div>

        <div class="watch">
            <div class="container">
            <h3>Watch Schedule</h3>
            <div id="calendar"></div>

            </div>
            
        </div>
        <div class="repo">
            <h3>Upcoming Watch</h3>
            <p><?php echo $_SESSION["nextWatch"]["date"];

                ?> by <?php echo $_SESSION["nextWatch"]["first_name"];?> </p>
            <H4> <?php echo $_SESSION["nextWatch"]["name"]?></H4>

        </div>

        <div class="student-list">
            <h3>Students</h3>
            <p>Curious about the juniors?</p>
            <button class="modal-btn" onclick="document.getElementById('class-modal').style.display='block'">More
                Info</button>
            <div id="class-modal" class="modal">
                <span onclick="document.getElementById('class-modal').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <table>
                    <thead>Vervou</thead>
                    <tr>
                        <?php 
                foreach($_SESSION["class1"] as $classmate){?>

                        <td><?php echo($classmate["first_name"]);?> </td>
                        <?php }?></td>

                    </tr>
                    
                </table>
                <table>
                    <thead>KooKu</thead>
                    <tr>
                        <?php 
                foreach($_SESSION["class2"] as $classmate2){?>

                        <td><?php echo($classmate2["first_name"]);?> </td>
                        <?php }?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="class-modal-exercise" class="modal">
            <span onclick="document.getElementById('class-modal-excise').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            
            <?php foreach($_SESSION["challenges"] as $challenge){?>
            <div id="challenge">
                <p><b>Name:</b> <?php echo $challenge["name"];?></p>
                <p><b>Date:</b> <?php echo $challenge["date_open"];?> - <?php echo $challenge["date_due"];?></p>
                <a href="<?php echo $challenge["url"];?>"><?php echo $challenge["url"];?></a>
            </div><?php }?>
        </div>

    </div>
</div>

<script>
var modal = document.getElementById('class-modal');
var modalExercise = document.getElementById('class-modal-exercise');

// When the user clicks anywhere  of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modalExercise) {
        modalExercise.style.display = "none";
    }
}

window.addEventListener('DOMContentLoaded', () => {

    var calendar = $('#calendar').fullCalendar({

        //fixedWeekCount: false,
        editable: false,
        // height: 400 ,
        contentHeight: 350,
        selectable:true,
        //selectHelper:true,
       
        //cannot use PHP tag inside javascript codes, can only use a file return the values
        events: 'test.php',
        displayEventTime: false,
        eventColor: '#d889a7',
        eventTextColor: 'white',
    });
});


             
    </script>
</script>
<?php 
require_once 'includes/footer.php';
?>