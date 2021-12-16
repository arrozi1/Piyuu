<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right">
            <?php $this->load->view('templates/navs');?>
        </div>
        <div class="col-6 pl-0 pr-0" style="background-color: #101926;">
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4 class="mt-2 ml-2 font-weight-bold text-light">Search Results</h4>
            </div>
            <div class="col mt-5 pt-1 pl-1 pr-1">
                <div class="card bg-secondary mt-3" >
                    <div class="card-header font-weight-bold text-light">People
                    </div>
                </div>
                <?php 
                if(!empty($people)){
                foreach($people as $k => $person) {
                    ?>
                <div class="card bg-secondary mt-3" >
                    <div class="card-body font-weight-bold form-inline">
                        <img class="rounded-circle border mr-2" src="<?= base_url().'uploads/'.$person['image'];?>" width="50" height="50"/>
                        <a href="<?= base_url().'username/'.$person['username'];?>">
                            <p class="mt-3"><?= $person['name'];?></p>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <?php }else{ ?>
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?php } ?>
                <div class="card bg-secondary mt-5" >
                    <div class="card-header font-weight-bold text-light">Post
                    </div>
                </div>
                <?php
                 if(!empty($post)){
                 foreach($post as $k => $posts) {
                     ?>
                <div class="card bg-secondary mt-3" >
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<?= base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<?= base_url().'username/'.$posts['user'];?>">
                            <span class=" font-weight-bold"><?= $posts['name']; ?></span>
                        </a>
                    </div>
                    <a href="<?= base_url().'shout/'.$posts['id'];?>" id="body-post" style="text-decoration:none;">
                    <div class="card-body">
                        <p class="card-text"><?= $posts['post'];?></p>
                        <?php if(!empty($posts['post_image'])){?>
                            <div class="w-100 text-center">
                                <img class="img img-fluid border p-1" src="<?= base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <?php } ?>
                        </a>
                        <div class="row w-100 bg-danger mt-3 ml-1">
                            <div class="col-md-6 pl-0 pr-0">
                                <?php if(!is_null($posts['l'])){?>
                                    <button class="col-md-12 border-0 bg-secondary claps text-light" type="submit">Like</button>
                                <?php }else{ ?>
                                <form method="post" action="<?= base_url().'claps/'.$posts['id'];?>">
                                    <input type="hidden" value="<?= $_SERVER['PATH_INFO']; ?>" name="identifier"/>
                                    <button class="col-md-12 border-0 bg-secondary claps " type="submit">Like</button>     
                                </form>                              
                                <?php } ?>
                            </div>
                            <?php if($posts['comments'] == 0){?>
                            <button class="col-md-6 border-0 bg-secondary">Comments</button>
                            <?php }else{ ?>
                            <button class="col-md-6 border-0 bg-secondary text-light" nclick="location.href='<?= base_url().'shout/'.$posts['id'];?>'">Comments(<?= $posts['comments'];?>)</button>
                                <?php } ?>
                        </div>
                        <div>
                                <?php  if(!is_null($posts['l'])){
                                        if($posts['claps'] == 1){ ?> 
                                            <p class="text-muted">You likawdwaed the post..</p>
                                    <?php } else { ?>
                                            <p class="text-muted">You and <?= $posts['claps'] - 1;?> others liked the post..</p>
                                        <?php }
                                    }else if ($posts['claps'] > 0) {
                                     ?>
                                        <p class="text-muted"><?= $posts['claps'] - 1;?> other liked the post..</p>
                                    <?php }else{ ?>
                                        <p></p>
                                    <?php } ?>
                            </div>
                    </div>
                </div>
                <?php } ?>
                <?php }else{ ?>
                    
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?php } ?>
            </div>
            
            <div class="col pt-3 pl-1 pr-1">

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