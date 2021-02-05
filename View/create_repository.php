
<?php
require_once 'includes/header_watch.php';
require_once 'includes/nav_student.php';
?>

    <div class="container-profile">

    <div class="challenge-add">

                <form name="add" method="post" action="">
                    <div class="modal-header">
                    <h4 class="modal-title">Add Repository</h4>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Class</label>
                            <select id="classes" name="classes" class="form-control">
                                <option value="1">VEROU 1.26-12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Challenges</label>
                            <select id="challengeSelected" name="challengeSelected" class="form-control">
                                <?php foreach($this->challenges as $challenge) :?>
                                    <option value="<?php echo $challenge["id"]; ?>"><?php echo $challenge["name"];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="name" value=""><!--<= $cardRepository->getCard()->getName() ?>">-->
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" class="form-control" required name="url" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-secondary" value="Add" name="addRepository">
                    </div>
                </form>
            </div>
        </div>
  




<?php
require_once 'includes/footer.php';
?>