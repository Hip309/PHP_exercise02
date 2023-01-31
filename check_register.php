<div id="img2" class="fb-body"><img src="img/world.png" /></div>
<div id="form3" class="fb-body">
	<input placeholder="First Name" type="text" id="namebox" name="fname" value="<?php echo $_POST['fname'];?>" />
	<input placeholder="Last Name" type="text" id="namebox" name="lname" value="<?php echo $_POST['lname'];?>"/> <br>
	<input placeholder="Email" type="text" id="mailbox" name="mail_1" value="<?php echo $_POST['mail_1'];?>"/><br>
	<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" value="<?php echo $_POST['mail_2'];?>"/><br>
	<input placeholder="Password" type="password" id="mailbox" name="pass" value="<?php echo $_POST['pass'];?>" /><br>
	<input type="date" id="namebox" name="date" value="<?php echo $_POST['date']; ?>" /><br><br>
	<?php if($_POST['sex']== "male"):?>
		<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
	<?php elseif($_POST['sex']== "female"):?>
		<input type="radio" id="r-b" name="sex" value="female" checked="checked"/>Female<br><br>
	<?php endif; ?>
</div>


<?php if(empty($_POST['fname'])||empty($_POST['lname'])):?>
			<input placeholder="First Name" type="text" id="namebox" name="fname" />
			<input placeholder="Last Name" type="text" id="namebox" name="lname"/><p id="intro4">*requied</p>
		<?php 
		$flag = true;
		else:?>
			<input placeholder="First Name" type="text" id="namebox" name="fname" value="<?php echo $_POST['fname'];?>" />
			<input placeholder="Last Name" type="text" id="namebox" name="lname" value="<?php echo $_POST['lname'];?>"/> <br>
		<?php endif; ?>
		
		<?php if($flag == false && empty($_POST['mail_1'])):?>
			<input placeholder="Email" type="text" id="mailbox" name="mail_1"/><p id="intro4"><P id="intro4">*requied</p>
		<?php 
		$flag = true;
		elseif(!empty($_POST['mail_1'])):?>
		<input placeholder="Email" type="text" id="mailbox" name="mail_1" value="<?php echo $_POST['mail_1'];?>"/><br>
		<?php endif; ?>
		
		<?php if($flag == false && empty($_POST['mail_2'])):?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" /><P id="intro4">*requied</p>
		<?php 
		$flag = true;
		elseif(!empty($_POST['mail_2'])):?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" value="<?php echo $_POST['mail_2'];?>"/><br>
		<?php endif; ?>
		
		<?php if($flag == false && empty($_POST['pass'])):?>
			<input placeholder="Password" type="password" id="mailbox" name="pass"/><P id="intro4">*requied</p>
		<?php 
		$flag = true;
		elseif(!empty($_POST['pass'])):?>
			<input placeholder="Password" type="password" id="mailbox" name="pass" value="<?php echo $_POST['pass'];?>" /><br>
		<?php endif; ?>
		
		<?php if($flag == false && empty($_POST['date'])):?>
			<input type="date" id="namebox" name="date"/><P id="intro4">*requied</p>
		<?php 
		$flag = true;
		elseif(!empty($_POST['date'])):?>
			<input type="date" id="namebox" name="date" value="<?php echo $_POST['date']; ?>" /><br><br>
		<?php endif; ?>
		
		<?php if($flag == false && empty($_POST['sex'])):?>
			<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
			<input type="radio" id="r-b" name="sex" value="female" checked="checked"/>Female<P id="intro4">*requied</p><br>
		<?php elseif(!empty($_POST['sex'])):?>
			<?php if($_POST['sex']== "male"):?>
			<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
			<?php elseif($_POST['sex']== "female"):?>
			<input type="radio" id="r-b" name="sex" value="female" checked="checked"/>Female<br><br>
			<?php endif; ?>
		<?php endif; ?>
