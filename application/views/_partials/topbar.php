<body class="bg-grey" id="body">
    <div class="top-bar" id="top-bar">
        <div class="col-4">
            <input type="text" name="search_text" id="search_text" class="search" placeholder="Search Course ...">
        </div>
        <div style="position: fixed; right:20px">
            <div class="popup" onclick="popUp()">
                <span class="text-profile"><?= $user['username'] ?></span>
                <img class="img-profile" src="<?= base_url('assets/profile/') . $user['pic'] ?>" alt="">

                <span class="popuptext" id="myPopup">
                    <a href="<?= base_url('EditProfile') ?>"><i class="fa fa-cog" aria-hidden="true"></i><span style="margin-left: 10px;">Settings</span></a> <br>
                    <a href="<?= base_url('Auth/logout') ?>"><i class="fas fa-sign-out-alt"></i><span style="margin-left: 10px;">Logout</span></a>
                </span>
            </div>
        </div>
    </div>
    
   