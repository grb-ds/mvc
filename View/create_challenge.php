
<?php 
//This is the page to create challenges - COACH USE ONLY

require 'includes/header_watch.php';

require 'includes/nav_coach.php';
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
        <div class="exercise-list challenge-add">
         <!--   <div class="container">-->

                <form name="add" method="post" action="index.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Challenge</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="name" value=""><!--<= $cardRepository->getCard()->getName() ?>">-->
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" required name="type" value="">
                        </div>
                        <div class="form-group">
                            <label>HP</label>
                            <input type="text" class="form-control" required name="hp" value="">
                        </div>
                        <div class="form-group">
                            <label>Stage</label>
                            <input type="text" class="form-control" required name="stage" value="">
                        </div>
                        <div class="form-group">
                            <label>Info</label>
                            <textarea class="form-control" required name="info"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attack</label>
                            <input type="text" class="form-control" required name="attack" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Add" name="add">
                        <button type="submit" class="btn btn-success" name="edit" value="<?= $cardRepository->getCard()->getId() ?>">Edit</button>
                        <!-- <input type="submit" class="btn btn-success" value="Edit" name="edit">-->
                    </div>
                </form>
          <!--  </div>-->
        </div>

  <!--      <div class="watch">
            <?php /*//TODO: replace the dummy text for the calendar*/?>
            <div class="container">
                <h3>Watch Schedule</h3>
                <div id="calendar"></div>

            </div>

        </div>-->

<!--        <div class="repo">
            <?php /*//TODO: replace the dummy text for the repository link*/?>
            <h3>Repository</h3>
            <a href="">More info<i class="fas fa-plus"></i></a>
        </div>

        <div class="student-list">
            <?php /*//TODO: to display the student list of the same class */?>
            <h3>Students</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, sint!</p>
            <a href="">More info<i class="fas fa-plus"></i></a>
        </div>-->
    </div>
</div>



<?php
require_once 'includes/footer.php';
?>