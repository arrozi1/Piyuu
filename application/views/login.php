<body>
    
        <main>

                
                <div class="col-lg-5" style="float:none;margin:auto;">
                <div class="card bg-secondary" >
                    <form action="" method="POST">
                        <div class="card-body card-main login-container">
                                <div class="mt-6 form-group text-center">
                                    <a href="<?= base_url();?>"><img src="<?= base_url();?>images/logoa.png" class="logo mb-2" width="50" height="40"></a>
                                    <h3 class="text-primary font-weight-bolder">Login Piyuu</h3>                        
                                </div>
                                <div class="form-group mt-5">
                                    <label class="col-form-label" for="inputDefault">Username</label>
                                    <input type="text" class="form-control username" name="username" placeholder="Enter Username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Password</label>
                                    <input type="password" title="8 or more characters" class="form-control password" name="password" placeholder="Enter Password" id="password"  required>
                                </div>
                               
                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary rounded-pill btn-lg w-75 login-btn mt-5">Sign in</button>
                                    
                                </div>
                                <div class="text-center mt-3">
                                    <small class="mt-5 text-muted font-italic">Need an Account?<a href="<?= base_url();?>signup" class="btn-link">Create here</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </main>
</body>
