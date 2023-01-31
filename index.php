<?php
	include "src/header.php";
?>
<?php
	$path = "C:\\xampp\\htdocs\\Lab02_PHP\\Account.txt";
	$myfile = fopen($path, "r") or die ("unable to open file");
	$AccountList = array();
	$Account = array();
	for($i = 0; !feof($myfile); $i++){
		$data = fgets($myfile);
		list($id,$pass)=explode("|",$data);
		if($id!=""){
			$Account = ["ID" => $id, "Pass" => $pass];
			$AccountList[$i] = $Account;
		}
	}
	fclose($myfile);
	
	$user_login = '';
	$user_pass = '';
	
	if (isset($_POST['login']))
	{
		$user_login = $_POST['name'];
		$user_pass = $_POST['password'];
	}
?>

<div class="fb-header">
	<div id="img1" class="fb-header"><img src="img/facebook.png" /></div>
	<?php
		if(empty($user_login)&&!isset($_POST['Confirm']))			
			include "form_login.php";
	?>
</div>

<div class="fb-body">
<?php
	if(empty($user_login) && !isset($_POST['register'])&& !isset($_POST['Confirm']))
		include "form_register.php";
	elseif(!empty($user_login))
	{
		$check = false;
		foreach($AccountList as $acc){
			if($acc['ID'] == $user_login && $acc['Pass'] == $user_pass){
				echo "<p align = 'center'> <b> Welcome ". $user_login." to my facebook"."<br>";
				echo "click <a href='index.php'> here </a> to logout </p>";
				$check = true;
				break;
			}
		}
		if($check == false){
			echo "<p align = 'center'> <b> Sorry your login information is wrong"."<br>";
			echo "click <a href='index.php'> here </a> to login again </p>";
		}
	}
	if(isset($_POST['Confirm'])){
		$myfile=fopen($path,"a") or die ("unable to open file");
		fwrite($myfile,"\n".$_POST['mail_1']."|".$_POST['pass']);
		fclose($myfile);
		echo "<p align = 'center'> <b> Welcome " . $_POST['mail_1'] ." to my facebook"."<br>";
		echo "click <a href='index.php'> here </a> to logout </p>";
	}
?>
<?php 
$flag = false;
if(isset($_POST['register']) &&  (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['mail_1'])
|| empty($_POST['mail_2']) || empty($_POST['pass']) || empty($_POST['date']) || empty($_POST['sex']))):?>
	<div id="intro1" class="fb-body">Facebook helps you connect and share with the <br> people in your life.</div>
	<div id="intro2" class="fb-body">Create an account</div>
	<div id="img2" class="fb-body"><img src="img/world.png" /></div>
	<div id="intro3" class="fb-body">It's free and always will be.</div>
	<div id="form3" class="fb-body"><form  method="POST" action="">
		<?php if(empty($_POST['fname'])||empty($_POST['lname'])):?>
			<input placeholder="First Name" type="text" id="namebox" name="fname" />
			<input placeholder="Last Name" type="text" id="namebox" name="lname"/><p id="intro4">*requied</p>
		<?php 
		$flag = true;
		else:?>
			<input placeholder="First Name" type="text" id="namebox" name="fname" value="<?php echo $_POST['fname'];?>" />
			<input placeholder="Last Name" type="text" id="namebox" name="lname" value="<?php echo $_POST['lname'];?>"/> <br>
		<?php endif; ?>
		
		<?php if(empty($_POST['mail_1'])):?>
			<input placeholder="Email" type="text" id="mailbox" name="mail_1"/><br>
			<?php if($flag == false):?>
				<P id="intro4">*requied</p>
			<?php endif;?>
		<?php 
		$flag = true;
		elseif(!empty($_POST['mail_1'])):?>
			<input placeholder="Email" type="text" id="mailbox" name="mail_1" value="<?php echo $_POST['mail_1'];?>"/><br>
		<?php endif; ?>
		
		<?php if(empty($_POST['mail_2'])):?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" /><br>
			<?php if($flag == false):?>
				<P id="intro4">*requied</p>
			<?php endif;?>
		<?php 
		$flag = true;
		elseif(!empty($_POST['mail_2'])):?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" value="<?php echo $_POST['mail_2'];?>"/><br>
		<?php endif; ?>
		
		<?php if(empty($_POST['pass'])):?>
			<input placeholder="Password" type="password" id="mailbox" name="pass"/><br>
			<?php if($flag == false):?>
				<P id="intro4">*requied</p>
			<?php endif;?>
		<?php 
		$flag = true;
		elseif(!empty($_POST['pass'])):?>
			<input placeholder="Password" type="password" id="mailbox" name="pass" value="<?php echo $_POST['pass'];?>" /><br>
		<?php endif; ?>
		
		<?php if(empty($_POST['date'])):?>
			<input type="date" id="namebox" name="date"/><br><br>
			<?php if($flag == false):?>
				<P id="intro4">*requied</p>
			<?php endif;?>
		<?php 
		$flag = true;
		elseif(!empty($_POST['date'])):?>
			<input type="date" id="namebox" name="date" value="<?php echo $_POST['date']; ?>" /><br><br>
		<?php endif; ?>
		
		<?php if(empty($_POST['sex'])):?>
			<input type="radio" id="r-b" name="sex" value="male" />Male
			<input type="radio" id="r-b" name="sex" value="female"/>Female
			<P id="intro4">*requied</p><br>
		<?php elseif(!empty($_POST['sex'])):?>
			<?php if($_POST['sex']== "male"):?>
				<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
				<input type="radio" id="r-b" name="sex" value="female"/>Female<br>
			<?php elseif($_POST['sex']== "female"):?>
				<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
				<input type="radio" id="r-b" name="sex" value="female" checked="checked"/>Female<br>
			<?php endif; ?>
		<?php endif; ?>
		
		<p id="intro4">You have filled in the missing information.<br> Please check your information again!</p>
		<input type="submit" class="button2"  name="register" value="Create an account" /></form>
		<br><hr>
		<p id="intro5">Create a Page for a celebrity, band or business.</p>
	</div>
<?php elseif(isset($_POST['register']) &&  (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['mail_1'])
&& !empty($_POST['mail_2']) && !empty($_POST['pass']) && !empty($_POST['date']) && !empty($_POST['sex']))): ?>
	<div id="intro1" class="fb-body">Facebook helps you connect and share with the <br> people in your life.</div>
	<div id="intro2" class="fb-body">Create an account</div>
	<div id="img2" class="fb-body"><img src="img/world.png" /></div>
	<div id="intro3" class="fb-body">It's free and always will be.</div>
	<div id="form3" class="fb-body"><form  method="POST" action="">
		<input placeholder="First Name" type="text" id="namebox" name="fname" value="<?php echo $_POST['fname'];?>" />
		<input placeholder="Last Name" type="text" id="namebox" name="lname" value="<?php echo $_POST['lname'];?>"/> <br>
		<input placeholder="Email" type="text" id="mailbox" name="mail_1" value="<?php echo $_POST['mail_1'];?>"/><br>
		
		<?php if($_POST['mail_2'] != $_POST['mail_1']):?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" value=""/><P id="intro4">*please re-input email!</p>
		<?php else:?>
			<input placeholder="Re-enter email" type="text" id="mailbox" name="mail_2" value="<?php echo $_POST['mail_2'];?>"/><br>
		<?php endif;?>
		
		<input placeholder="Password" type="password" id="mailbox" name="pass" value="<?php echo $_POST['pass'];?>" /><br>
		<input type="date" id="namebox" name="date" value="<?php echo $_POST['date']; ?>" /><br><br>
		
		<?php if($_POST['sex']== "male"):?>
			<input type="radio" id="r-b" name="sex" value="male" checked="checked"/>Male
			<input type="radio" id="r-b" name="sex" value="female"/>Female<br><br>
		<?php elseif($_POST['sex']== "female"):?>
			<input type="radio" id="r-b" name="sex" value="male"/>male
			<input type="radio" id="r-b" name="sex" value="female" checked="checked"/>Female<br><br>
		<?php endif; ?>
		
		<?php if($_POST['mail_2'] != $_POST['mail_1']):?>
			<p id="intro4">You have filled in the wrong information.<br> Please check your information again!</p>
			<input type="submit" class="button2"  name="register" value="Create an account" /></form>
		<?php else: ?>
			<p id="intro4">Please see your information again above!<br>If you make sure, please press Confirm</p>
			<input type="submit" class="button2"  name="Confirm" value="Confirm" /></form>
		<?php endif; ?>
		<br><hr>
		<p id="intro5">Create a Page for a celebrity, band or business.</p>
	</div>
<?php endif;?>
</div>
<?php
	include "src/footer.php";
?>