
<ul class="nav flex-column w-25 position-fixed" id="left">
    <li class="nav-item">
        <a class=" nav-link navbar-brand" href="<?= base_url();?>home">
            <h3 class="font-weight-bold">
                <img src="<?= base_url();?>images/logoa.png" class="logo mb-1" width="70" height="60" title="Home"> 
                <span class="prof-text text-light font-weight-bold">Piyuu</span>
            </h3>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>profile">
            <img class="rounded-circle border ml-1 mr-2 border-light" src="<?= base_url().'uploads/'.$profile['image'];?>" class="m-2" width="40" height="40" title="Profile">
            <span class="prof-text text-light font-weight-bold">Profile</span>
        </a>
    </li>
    <li class="nav-item dropdown">
 
        <a class="nav-link dropdown-toggle dropdown-light" id="dropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle border ml-1 mr-2 border-light" src="<?= base_url();?>images/setting.png" class="m-2" width="40" height="40" title="Settings">
        <span class="prof-text text-light font-weight-bold">Settings</span></a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index: 3">
            <a class="dropdown-item" href="#change-password" data-target="#change-password" data-toggle="modal" >Change Password</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>logout">
        <img class="rounded-circle border ml-1 mr-2 border-light" src="<?= base_url();?>images/keluar.png" class="m-2" width="40" height="40" title="Logout">
        <span class="prof-text text-light font-weight-bold">Logout</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>keluar">
        <img class="rounded-circle border ml-1 mr-2 border-light" src="<?= base_url();?>images/bantuan.png" class="m-2" width="40" height="40" title="Logout">
        <span class="prof-text text-light font-weight-bold">Bberanda</span></a>
    </li>
    
</ul>

