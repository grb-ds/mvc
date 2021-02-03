<?php 
require 'includes/header_watch.php';
require 'includes/nav_coach.php';

require_once 'handles/userHandle.php';
require_once 'handles/coacherHandle.php';

?>
<div class="resize-container">

</div>
<div class="container-profile">
    <div class="grid-profile">
        <div class="welcome-msg">
            <h3>Welcome,
            <?php echo $_SESSION['logginUserName'] ?>
            </h3>

            <?php //TODO: to display welcome msg?>
            Enjoy and learn! Have a fun day!!

        </div>
        <div class="exercise-list">
            <?php //TODO: for the shortlist of exercises?>
            <h3>Exercises</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <a href="">More info<i class="fas fa-plus"></i></a>
           <!-- <button type="submit" name="createChallenge"><a href="View/create_challenge.php">Create New Challenge</a></button>-->
            <button type="submit" name="createChallenge"><a href="index.php?page=createChallenge">Create New Challenge</a></button>
            index.php?page=login
        </div>

        <div class="watch">
            <?php //TODO: replace the dummy text for the calendar?>
            <div class="container">
            <h3>Watch Schedule</h3>
            <div id="calendar"></div>

            </div>
            
        </div>

        <div class="repo">
            <?php //TODO: replace the dummy text for the repository link?>
            <h3>Repository</h3>
            <a href="">More info<i class="fas fa-plus"></i></a>
        </div>

        <div class="student-list">
            <?php //TODO: to display the student list of the same class ?>
            <h3>Students</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <a href="">More info<i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', () => {

    var calendar = $('#calendar').fullCalendar({

               //fixedWeekCount: false,
        editable: false,
        // height: 400 ,
        contentHeight: 350,
        selectable:true,
        //selectHelper:true,
       
        //cannot use PHP tag inside javascript codes, can only use a file return the values
        events: '../Controller/WatchController.php',
        displayEventTime: false,
        eventColor: '#d889a7',
        eventTextColor: 'white',
    });
});
</script>
<?php 
require_once 'includes/footer.php';
?>