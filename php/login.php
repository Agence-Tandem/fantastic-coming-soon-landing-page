	<div class="loginpanel">
		<div class="logo">
			<img src="../<?php echo $conf['logo_file']; ?>" width="<?php echo $conf['logo_width']; ?>" height="<?php echo $conf['logo_height']; ?>" alt="<?php echo $conf['logo_alt_text']; ?>" class="img-rounded" />
		</div>
		<div class="login">
			<form role="form" action="" method="post">
				<div class="form-group">
					<label for="InputAdminUsername"><?php echo $lang['username']; ?></label>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="text" name="username" class="form-control" id="InputAdminUsername" placeholder="<?php echo $lang['username']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="InputAdminPassword"><?php echo $lang['password']; ?></label>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-key"></i></span>
						<input type="password" name="password" class="form-control" id="InputAdminPassword" placeholder="<?php echo $lang['password']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="rememberme" value="1" /> <?php echo $lang['remember_me']; ?></label>
					<input class="btn btn-primary btn-sm pull-right" type="submit" value="<?php echo $lang['login'] ?>" /></div>
				</div>
			</form>
		</div>
	</div>