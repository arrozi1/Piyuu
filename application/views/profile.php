<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 bg-dark border-right nav-left">
            <?php $this->load->view('templates/navs');?>
        </div>
    
        <div class="col-6 pl-0 pr-0 main" style="background-color: #000000;">
            <a href='<?= base_url();?>home'>
            <div class="bg-dark position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4><i class="fas fa-arrow-left"></i></h4>
            </div>
            </a>
            <div class="col p-0">
                <a data-target="#cover-modal" data-toggle="modal" title="Click to change cover photo" href="#cover-modal" >
                    <img class="img-fluid w-100 mt-5 h-75 cover" title="Click to change cover photo" src="<?= base_url().'uploads/'.$profile['cover'];?>"/>
                </a>
                <a  data-target="#profile-modal" data-toggle="modal" id="profile-pic" href="#profile-modal" >
                    <img title="Click to change profile photo" class="profile-pic rounded-circle" src="<?= base_url().'uploads/'.$profile['image'];?>"/>
                </a>
                <div class="card bg-dark ml-1 mr-1">
                    <div class="card-header text-light font-weight-bold">Personal Info
                    <button style="float:right;" class="btn btn-info rounded-pill shadow" data-toggle="modal" data-target="#exampleModalLong">Edit Profile</button>

                    </div>
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-light"><?= $profile['name'];?></h4>
                        <p class="card-text text-light">Bio : <?= $profile['bio'];?></p>
                        <p class="card-text text-light">Location : <?= $profile['address'];?></p>
                        <p class="card-text text-light">Birthday : <?php $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?></p>
                    </div>
                </div>
                <div class="col pl-1 pr-1">
                    <div class="card bg-dark mt-2 shadow-sm">
                        <div class="card-header font-weight-bold text-light">Create Post</div>
                        <div class="card-body">
                            <form action="" method="POST" id="post-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?= base_url().'uploads/'.$profile['image'];?>" class="m-1 rounded-circle border" width="65" height="60"/>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control post" name="post" id="exampleTextarea" rows="3" placeholder="What's on your mind?"></textarea>
                                </div>
                                <div class="col-md-2" style="height:70px;">
                                    <label>
                                        <i class="fas fa-image text-primary" style="cursor:pointer; font-size:70px;"></i>
                                        <input type='file' name="shout-img" class="shout-img" style="visibility:hidden;"/>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3 text-right">
                                <button type="submit" id="shout-post" class="btn btn-info pl-3 pr-3 rounded-pill">Post</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if(!empty($post)){
                    $i = 1 ;
                 foreach($post as $k => $posts) {
				?>
                <div class="card bg-dark mt-3 ml-1 mr-1">
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<?= base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<?= base_url().'username/'.$posts['user']; ?>">
                            <span class="text-light font-weight-bold"><?= $posts['name']; ?></span>
                        </a>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="float:right;">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#edit-modal<?= $i; ?>"  data-target="#edit-modal<?= $i; ?>" data-toggle="modal" >Edit</a>
                                <a class="dropdown-item" href="<?= base_url().'delete-post/'.$posts['id'];?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url().'shout/'.$posts['id'];?>" id="body-post" style="text-decoration:none;">
                    <div class="card-body">
                        <p class="card-text text-light"><?= $posts['post'];?></p>
                        <?php if(!empty($posts['post_image'])){ ?>
                            <div class="w-100 text-center">
                                <img class="border p-1 img img-fluid" src="<?= base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <?php } ?>
                        </a>
                        <div class="row w-100 bg-danger mt-3 ml-1 ">
                            <div class="col-md-6 pl-0 pr-0 ">
                                <?php if(!is_null($posts['l'])){ ?>
                                    <button class="col-md-12 border-0 bg-dark claps text-light font-weight-bold"  type="submit">Like</button>
                                <?php }else{ ?>
                                <form method="post" action="<?= base_url().'claps/'.$posts['id'];?>">
                                    <input type="hidden" value="<?= $_SERVER['PATH_INFO']; ?>" name="identifier"/>
                                    <button class="col-md-12 border-0 bg-dark text-light font-weight-bold " type="submit">Like</button>     
                                </form>                              
                                <?php } ?>
                            </div> 
                            <?php if($posts['comments'] == 0){ ?>
                            <button class="col-md-6 border-0 bg-dark text-light font-weight-bold">Comments</button>
                            <?php }else{ ?>
                            <button class="col-md-6 border-0 bg-dark text-light font-weight-bold" onclick="location.href='<?= base_url().'shout/'.$posts['id'];?>'">Comments(<?= $posts['comments'];?>)</button>
                                <?php } ?>
                        </div>
                        <div>
							<?php if(!is_null($posts['l'])) {
									if($posts['claps'] == 1){ ?> 
										<p class="text-muted ">You liked the post..</p>
								<?php } else { ?>
											<p class="text-muted">You and <?= $posts['claps'] - 1;?> others liked the post..</p>
								<?php }
							}else if ($posts['claps'] > 0) { ?>
									<p class="text-muted"><?= $posts['claps'] - 1;?> other liked the post..</p>
							<?php }else{ ?>
									<p></p>
							<?php } ?>
                            </div>
                    </div>
                    <div class="card-footer">
                    <div class="row">
                            <div class="col-md-1">
                                <img class="mt-2 rounded-circle border-info border" src="<?= base_url().'uploads/'.$profile['image']; ?>" width="40" height="40"/>
                            </div>
                            <div class="col-md-9">
                                <form action="<?= base_url().'comment/'.$posts['id'];?>" method="POST" class="w-100">
                                    <textarea class="form-control" id="exampleTextarea" name="comment" placeholder="Write something about the post."></textarea>
                                    <input type="hidden" value="<?= $_SERVER['PATH_INFO']; ?>" name="identifier"/>                          
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info mt-2 rounded-pill">Comment</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for edit post -->
                    <div class="modal fade" id="edit-modal<?= $i; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url().'edit-submit/'.$posts['id'];?>" method="POST" enctype="multipart/form-data" id="form-edit<?= $i; ?>">
                                <?php if(!empty($posts['post'])){ ?>
                                    <div class="form-group">
                                          <textarea class="form-control" id="post<?= $i;?>" name='text-post'><?= $posts['post'];?></textarea>
                                    </div>
                                <?php
								} if(!empty($posts['post_image'])){ ?>
                                        <div class="text-center w-100">
                                            <img class="border p-1 img img-fluid" src="<?= base_url().'uploads/'.$posts['post_image']; ?>"/>
                                            <input type="file" class="btn btn-info" name="img-post">
                                        </div>

                                    <?php }?>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit">Save changes</button>
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <?php
							++$i;
						}
                    }else{
                    ?>
                    <div class="mt-5 w-100"><center><h5 class="text-muted font-italic font-weight-light">You don't have any shout.</h5></center></div>
                    <?php  } ?>
                <nav aria-label="Page navigation example">
                    <p><?= $links;?></p>
                </nav>
            </div>
        </div>
        <div class="col-3 bg-dark border-left sidebar-right" style="z-index:2 ;" >
            <?php $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
<?php
$this->load->view('modals/edit_profile');
