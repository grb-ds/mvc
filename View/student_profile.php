<?php 

require_once 'includes/header_watch.php';
require_once 'includes/nav_student.php';
?>

<div class="container-profile">
    <div class="grid-profile">
        <div class="welcome-msg">
            <h3>Welcome,
                <span class="welcome-name"><?php echo $_GET["user"]; ?>!</span><br>
                How are you doing today?
            </h3>
        </div>
        <div class="exercise-list">
            <?php //TODO: for the shortlist of exercises?>
            <h3>Exercises</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <a href="">More info<i class="fas fa-plus"></i></a>

        </div>

        <div class="watch">
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
            <h3>Students</h3>
            <p>Curious about your fellow classmates?</p>
            <button class="modal-btn" onclick="document.getElementById('class-modal').style.display='block'">More
                Info</button>

            <div id="class-modal" class="modal">
                <span onclick="document.getElementById('class-modal').style.display='none'" class="close"
                    title="Close Modal">&times;</span>

                    <!-- TODO: to display student list of the class -->

                

            </div>


        </div>
    </div>
</div>




<script>
// Get the modal
var modal = document.getElementById('class-modal');

// When the user clicks anywhere  of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

window.addEventListener('DOMContentLoaded', () => {

    var calendar = $('#calendar').fullCalendar({

        //fixedWeekCount: false,
        editable: false,
        // height: 400 ,
        contentHeight: 350,
        selectable: true,
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