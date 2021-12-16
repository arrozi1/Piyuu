</div>
    <div class="col-md-11 mt-3 m-1 ">
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                Most like post
            </li>
            <?php foreach ($trending as $key => $trends) {
                if($trends['post'] != ""){ ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<?= base_url().'shout/'.$trends['id'];?>"><?= substr($trends['post'], 0,20);?></a>
                    <span class="badge badge-primary badge-pill"><?= $trends['likes'];?></span>
                    <?php } ?>
            </li>
            <?php } ?>
            
        </ul>
    </div>
    <div class="col-md-11 mt-3 m-1">
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                New user
            </li>
            <?php foreach ($new_user as $key => $user) 
                    if(!empty($user['name'])){
            {?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<?= base_url().'username/'.$user['username'];?>"><?= $user['name'];?></a>
                </li>
            <?php } } ?>
            
        </ul>
    </div>
    <div class="col-md-12 text-center mt-5">
        
    </div>
</div>