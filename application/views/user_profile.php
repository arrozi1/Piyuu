<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right">
            <?php $this->load->view('templates/navs');?>
        </div>
    
        <div class="col-6 pl-0 pr-0" style="background-color: #101926;">
            <a href='<?= base_url();?>home'>
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4><i class="fas fa-arrow-left"></i></h4>
            </div>
            </a>
            <div class="col p-0">
                <img class="img-fluid w-100 mt-5 h-75" src="<? echo base_url().'uploads/'.$user_profile['cover'];?>"/>
                <img class="profile-pic rounded-circle" src="<? echo base_url().'uploads/'.$user_profile['image'];?>"/>
                <div class="card bg-secondary ml-1 mr-1">
                    <div class="card-header text-light font-weight-bold">Personal Info

                    </div>
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold"><?= $user_profile['name'];?></h4>
                        <p class="card-text">Bio a : <?= $user_profile['bio'];?></p>
                        <p class="card-text">Location : <?= $user_profile['address'];?></p>
                        <p class="card-text">Birthday : <?php $time = strtotime($user_profile['birthdate']); 
                        echo date("M d, Y",$time);?>
                    </div>
                </div>
                <? 
                if(!empty($post)){
                foreach($post as $k => $posts){?>
                <div class="card bg-secondary mt-3 ml-1 mr-1">
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<?= base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<?= base_url().'username/'.$posts['user'];?>">
                            <span class=" font-weight-bold"><?= $posts['name']; ?></span>
                        </a>
                    </div>
                    <a href="<?= base_url().'shout/'.$posts['id'];?>" id="body-post" style="text-decoration:none;">
                    <div class="card-body">
                        <p class="card-text"><?= $posts['post'];?></p>
                        <? if(!empty($posts['post_image'])){?>
                            <div class="w-100 text-center">
                                <img class="border p-1" src="<?= base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <? }?>
                        </a>
                        <div class="row w-100 bg-danger mt-3 ml-1">
                            <div class="col-md-6 pl-0 pr-0">
                                <? if(!is_null($posts['l'])){?>
                                    <button class="col-md-12 border-0 bg-secondary claps text-light" type="submit">Like</button>
                                <? }else{ ?>
                                <form method="post" action="<? echo base_url().'claps/'.$posts['id'];?>">
                                    <input type="hidden" value="<?= $_SERVER['PATH_INFO']; ?>" name="identifier"/>
                                    <button class="col-md-12 border-0 bg-secondary claps " type="submit">Like</button>     
                                </form>                              
                                <?}?>
                            </div> 
                            <? if($posts['comments'] == 0){?>
                            <button class="col-md-6 border-0 bg-secondary">Comments</button>
                            <?}else{?>
                            <button class="col-md-6 border-0 bg-secondary text-light" onclick="location.href='<?= base_url().'shout/'.$posts['id'];?>'">Comments(<?= $posts['comments'];?>)</button>
                                <?}?>
                        </div>
                        <div>
                                <?  if(!is_null($posts['l'])){
                                        if($posts['claps'] == 1){ ?> 
                                            <p class="text-muted">You liked theawdwaawd post..</p>
                                    <?} else { ?>
                                            <p class="text-muted">You and <?= $posts['claps'] - 1;?> others liked the post..</p>
                                        <? }
                                    }else if ($posts['claps'] > 0) {
                                     ?>
                                        <p class="text-muted"><?= $posts['claps'] - 1;?> other liked the post..</p>
                                    <? }else{ ?>
                                        <p></p>
                                    <? } ?>
                            </div>
                    </div>
                    <div class="card-footer">
                    <div class="row">
                            <div class="col-md-1">
                                <img class="mt-2 rounded-circle border-light border" src="<?= base_url().'uploads/'.$profile['image']; ?>" width="40" height="40"/>
                            </div>
                            <div class="col-md-9">
                                <form action="<? echo base_url().'comment/'.$posts['id'];?>" method="POST" class="w-100">
                                    <textarea class="form-control" id="exampleTextarea" name="comment" placeholder="Write something about the post."></textarea>
                                    <input type="hidden" value="<?= $_SERVER['PATH_INFO']; ?>" name="identifier"/>                          
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-light mt-2 rounded-pill">Comment</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <? }
                    }else{
                    ?>
                    <div class="mt-5 w-100"><center><h5 class="text-muted font-italic font-weight-light">You don't have any shout.</h5></center></div>
                    <?}?>
                <nav aria-label="Page navigation example">
                    <p><?= $links;?></p>
                </nav>
            </div>
        </div>
        <div class="col-3 bg-dark border-left" style="z-index:2;">
            <?php $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
<?php $this->load->view('modals/edit_profile');?>
