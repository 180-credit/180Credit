<aside class="col-md-3 mb-4 mb-md-0">
    <div class="card p-0 border-0 bg-transparent">
        <h3 class="mb-4">Manage my account</h3>
        <div class="card-body p-0 border-0">
            <ul class="list-group">
                <li class="list-group-item my-1 border-0 <?= isset($_SERVER['PATH_INFO']) && ($_SERVER['PATH_INFO'] == '/my-account' || $_SERVER['PATH_INFO'] == '/my-account/edit') ? 'active' : ''  ?>"><a href="<?= base_url().'my-account'; ?>"><i class="fas fa-globe"></i>My Account</a></li>
                <?php
                if(isset($_SESSION['user']['180creditUserType']) && $_SESSION['user']['180creditUserType'] == '1'){
                    ?>
                    <li class="list-group-item my-1 border-0 <?= isset($_SERVER['PATH_INFO']) && ($_SERVER['PATH_INFO'] == '/my-business-profile') ? 'active' : ''  ?>"><a href="<?= base_url()."my-business-profile"; ?>"><i class="fas fa-user"></i>My Business Profile</a></li>
                    <?php
                }
                ?>
                <li class="list-group-item my-1 border-0 <?= isset($_SERVER['PATH_INFO']) && ($_SERVER['PATH_INFO'] == '/password-and-security' || $_SERVER['PATH_INFO'] == '/password-and-security/edit') ? 'active' : ''  ?>"><a href="<?= base_url()."password-and-security"; ?>"><i class="fas fa-lock"></i>Password and Security</a></li>
            </ul>
        </div>
        </div>
</aside>