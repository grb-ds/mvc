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
            <button type="submit" name="createRepository" id="coach-add-challenge-btn"><a href="index.php?page=createRepository">Add Your Repository</a></button>          
            <?php foreach($_SESSION['challenges'] as $challenge) : ?>
            <div class="challenge-display">
                <p><b>Name:</b> <?= $challenge["name"];?><br>
                    <b>Date:</b> <?= $challenge["date_open"];?> - <?= $challenge["date_due"];?></br>
                    <a href="<?= $challenge["url"];?>"><?= $challenge["url"];?></a>
                </p>
            </div>
            <?php endforeach ?>
        </div>

        <div class="watch">
                <h3>Watch Schedule</h3>
                <?php foreach($_SESSION["watchSchedule"] as $watch):?>
                    <div class="watch-display">
                        <p><b>Topic: </b><br><?= $watch["name"];?> <br>
                        <?= $watch["date"]; ?> by <?= $watch["first_name"];?>
                        </p>
                    </div>
                    <?php endforeach ?>
        </div>

        <div class="repo">
            <h3>Your Next Watch</h3>
            <h4><?= $_SESSION['reminder']['date'];?></h4>
            <a href="mailto:<?= $_SESSION['reminder']['email']; ?>"><i class="fas fa-envelope-open-text"></i>Want an email reminder to yourself?</a>
        </div>

        <div class="student-list">
            <h3>Students</h3>
            <p>Curious about your fellow classmates?</p>
            <button class="modal-btn" onclick="document.getElementById('class-modal').style.display='block'">More Info</button>

            <div id="class-modal" class="modal">
                <span onclick="document.getElementById('class-modal').style.display='none'" class="close"
                    title="Close Modal">&times;</span>            
                <table>
                    <thead>
                        <tr>
                            <th>Verou</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($_SESSION["classmates"] as $classmate) : ?>
                            <td><?= ($classmate["first_name"]);?> </td>
                            <?php endforeach ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

         <!-- modal for exercise -->
         <div id="exercise-modal" class="modal">
            <span onclick="document.getElementById('exercise-modal').style.display='none'" class="close" id="close-exercise" title="Close Modal">&times;</span>
            
            <?php foreach($_SESSION["challenges"] as $challenge) : ?>
            <div class="challenge-display">
                <p><b>Name:</b> <?= $challenge["name"];?></p>
                <p><b>Date:</b> <?= $challenge["date_open"];?> - <?= $challenge["date_due"];?></p>
                <a href="<?= $challenge["url"];?>"><?= $challenge["url"];?></a>
            </div>
            <?php endforeach ?>
        </div>

        <!-- modal for watchschedule -->
        <div id="watch-modal" class="modal">
            <span onclick="document.getElementById('watch-modal').style.display='none'" class="close" id="close-watch" title="Close Modal">&times;</span>
            
            <h3>Watch Schedule</h3>
            <?php foreach($_SESSION["watchSchedule"] as $watch):?>
            <div class="watch-display">
                <p><b>Topic: </b><?= $watch["name"];?> <br>
                <?= $watch["date"]; ?> by <?= $watch["first_name"];?>
                </p>
            </div>
            <?php endforeach ?>
        </div>

    </div>
</div>



<?php 
require_once 'includes/footer.php';
?>