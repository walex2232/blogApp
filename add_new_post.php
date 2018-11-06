<?php
	$submit = filter_input(INPUT_POST, "submit");
	if (isset($submit)) {
		# code...
		$title = filter_input(INPUT_POST, "title");
		$category = filter_input(INPUT_POST, "category");
		$post_content = filter_input(INPUT_POST,"post_content");
		$image_res = "dead";//$FILES["image"]["name"];
		$t = time();
		$time = strftime("%B-%d-%Y %H:%M:%S",$t);
		$admin = "root";
		$con = mysqli_connect("localhost","root","","trisfam");

		$sql = "INSERT INTO posts(title,date_time,image,category,post_content,creator) VALUES('$title','$time',".
		"'$image_res','$category','$post_content','$admin')";
			$execute = mysqli_query($con,$sql);
			if ($execute) {
				echo "Success";
		}else{
			echo "Failed";
			echo mysqli_error($con);
		}			
	}
?>
<!DOCTYPE html>
<html>
	<title>Add new Post</title>
<head>
</head>
<body>
	<div>
		<form action="add_new_post.php" method="post">
			<div>
				<label for="title">Post Title</label>
				<input type="text" placeholder="Post Title" name="title" id="title">
			</div>
			<div>
				<label for="image">Select Post Picture</label> 
				<input type="file" name="image">
			</div>
			<div>
				<label for="category">Select Category</label>
				<select name="category" id="category">
					<option disabled="disabled">select a category</option>
					<option value="css"> CSS</option>
					<option value="Javascript"> Javascript</option>
					<option value="html"> H.T.M.L</option>
					<option value="php">PHP</option>
				</select>
			</div>
			<div>
				<textarea cols="30" rows="10" placeholder="post_content" name="post_content"></textarea>
			</div>
			<input type="submit" value="Add Post" name="submit">
		</form>
	</div>
	<div>
		<table border="1">
			<tr>
				<th>ID</th>
				<th>title</th>
				<th>created on</th>
				<th>image</th>
				<th>category</th>
				<th>post_content</th>
				<th>created by</th>
			</tr>
			<?php
				$con = mysqli_connect("localhost","root","","trisfam");
				$cat_query = "SELECT * FROM posts";
				$query = mysqli_query ($con, $cat_query );
				if ($query) {

				} 
			while ($rows = mysqli_fetch_assoc($query)) {
				# code...
				$id = $rows["id"];
				$title = $rows["title"];
				$date_time = $rows["date_time"];
				$image_res = $rows["image"];
				$category = $rows["category"];
				$post_content = $rows["post_content"];
				$creator = $rows ["creator"] ?>


				<tr>
					<td><?php echo $id;?></td>
					<td><?php echo $title;?></td>
					<td><?php echo $date_time;?></td>
					<td><?php echo $image_res;?></td>
					<td><?php echo $category;?></td>
					<td><?php echo $post_content;?></td>
					<td><?php echo $creator;?></td>
				</tr>

				<?php

			}
			?>
		</table>
	</div>
</body>
</html>