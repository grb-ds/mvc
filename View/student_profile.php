<?php 
require_once 'includes/header_watch.php';
require_once 'includes/nav_student.php';
?>

<div class="container-profile">
    <div class="grid-profile">
        <div class="welcome-msg">
            <h3>Welcome,
                <span class="welcome-name"><?= $_SESSION["logginUserName"]; ?>!</span><br>
            </h3>
            <h5> How are you doing today?</h5>
        </div>

        <div class="exercise-list">
            <h3>Exercises</h3>
            <?php foreach($_SESSION['challenges'] as $challenge) : ?>
            <div id="challenge">
                <p><b>Name:</b> <?= $challenge["name"];?></p>
                <p><b>Date:</b> <?= $challenge["date_open"];?> - <?= $challenge["date_due"];?></p>
                <a href="<?= $challenge["url"];?>"><?= $challenge["url"];?></a>
            </div><?php endforeach ?>
        </div>

        <div class="watch">
            <div class="container">
                <h3>Watch Schedule</h3>
                <div id="calendar"></div>
            </div>
        </div>

        <div class="repo">
            <h3>Your Next Watch</h3>
            <p><?= $_SESSION['reminder']['date'];?></p>
            <a href="mailto:<?= $_SESSION['reminder']['email']; ?>">Want an email reminder to yourself?</a>
        </div>

        <div class="student-list">
            <h3>Students</h3>
            <p>Curious about your fellow classmates?</p>
            <button class="modal-btn" onclick="document.getElementById('class-modal').style.display='block'">More Info</button>

            <div id="class-modal" class="modal">
                <span onclick="document.getElementById('class-modal').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <table>
                    <tr> <?php foreach($_SESSION['classmates'] as $classmate) : ?>
                        <td><?= $classmate["first_name"] ;?> </td>
                        <?php endforeach ?>
                    </tr>
                </table>
            </div>
        </div>

        <div id="class-modal-exercise" class="modal">
            <span onclick="document.getElementById('class-modal-excise').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            
            <?php foreach($_SESSION['challenges'] as $challenge) : ?>
            <div id="challenge">
                <p><b>Name:</b> <?= $challenge["name"];?></p>
                <p><b>Date:</b> <?= $challenge["date_open"];?> - <?= $challenge["date_due"];?></p>
                <a href="<?= $challenge["url"];?>"><?= $challenge["url"];?></a>
            </div><?php endforeach ?>
        </div>
    </div>
</div>

<script>
let modalClass = document.getElementById('class-modal');
let modalExercise = document.getElementById('class-modal-exercise');

window.onclick = function(event) {
    if (event.target == modalClass) {
        modalClass.style.display = "none";
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

<?php 
require_once 'includes/footer.php';
?>