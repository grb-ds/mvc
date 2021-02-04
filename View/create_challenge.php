
<?php 
//This is the page to create challenges - COACH USE ONLY

require 'includes/header_watch.php';

require 'includes/nav_coach.php';

require_once './View/handles/coacherHandle.php';
require_once './config.php';
?>


<div class="container-profile">
    
        <div class="challenge-add">
         <!--   <div class="container">-->

                <!--<form name="add" method="post" action="./View/handles/coacherHandle.php">-->
            <form name="add" method="post" action="">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Challenge</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="name" value=""><!--<= $cardRepository->getCard()->getName() ?>">-->
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" required name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Start date</label>
                             <div class="input-group">
                                <span class="input-group-addon">d &nbsp; </span>
                                <select id="dayStart" name="dayStart" class="form-control">
                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <span class="input-group-addon">&nbsp; m &nbsp; </span>
                                <select id="monthStart" name="monthStart" class="form-control">
                                    <?php foreach ($months as $key => $value): ?>
                                        <option value="<?php echo $value ?>"><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="input-group-addon">&nbsp; y &nbsp;</span>
                                <select id="yearStart" name="yearStart" class="form-control">
                                    <?php foreach ($years as $value): ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>End date</label>
                            <div class="input-group">
                                <span class="input-group-addon">d &nbsp; </span>
                                <select id="dayEnd" name="dayEnd" class="form-control">
                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <span class="input-group-addon">&nbsp; m &nbsp; </span>
                                <select id="monthEnd" name="monthEnd" class="form-control">
                                    <?php foreach ($months as $key => $value): ?>
                                        <option value="<?php echo $value ?>"><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="input-group-addon">&nbsp; y &nbsp;</span>
                                <select id="yearEnd" name="yearEnd" class="form-control">
                                    <?php foreach ($years as $value): ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" required name="type" value="">
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" class="form-control" required name="url" value="">
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select id="classes" name="classes" class="form-control">
                                <option value="1">VEROU</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-secondary" value="Add" name="addChallenge" id="btn-create-challenge">
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