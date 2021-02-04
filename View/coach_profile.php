<?php 
require 'includes/header_watch.php';
require 'includes/nav_coach.php';
require_once 'handles/userHandle.php';
require_once 'handles/coacherHandle.php';

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
            <button type="submit" name="createChallenge" id="coach-add-challenge-btn"><a href="index.php?page=createChallenge">Create New Challenge</a></button>
            
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
            <h3>Upcoming Watch</h3>
            <p><?= $_SESSION["watchSchedule"][0]["date"];?> by <?= $_SESSION["watchSchedule"][0]["first_name"];?> </p>
            <h4><?= $_SESSION["watchSchedule"][0]["name"]?></h4>
        </div>

        <div class="student-list">
            <h3>Students</h3>
            <p>Curious about the juniors?</p>
            <button class="modal-btn" onclick="document.getElementById('class-modal').style.display='block'">More Info</button>
            <div id="class-modal" class="modal">
                <span onclick="document.getElementById('class-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
                <table>
                    <thead>
                        <tr>
                            <th>Verou</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($_SESSION["class1"] as $classmate) : ?>
                            <td><?= ($classmate["first_name"]);?> </td>
                            <?php endforeach ?></td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th>Kukou</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($_SESSION["class2"] as $classmate) : ?>
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