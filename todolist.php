<!DOCTYPE html>
<html>
<head>
	<title>To do list</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
	<script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
	<?php require 'index.php'; ?>
  <!-- <?php require 'todolist_php.php'; ?> -->
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
   <div class="container-fluid">
	<div class="navbar-header">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="todolist.php">Index</a></li>
			<li class="nav-item"><a class="nav-link" href="todolist_create.php">Create</a></li>
		</ul>
	</div>
	</div>
</nav>
<h1 class="display-3" style="text-align: center">To Do List</h1>
<?php if(!empty($_GET['message'])) {
        $message = $_GET['message'];
        switch ($message) {
          case 'nothing_added':
          echo '<h1 style="text-align: center">Please add something to do!</h1>';
        }
      };
?>
<div style="padding: 5px 500px 5px 500px">
  <div class="jumbotron" style="text-align: center; padding: 5px 20px 5px 20px">
    <?php $row = $index->fetch(PDO::FETCH_ASSOC);

    if(empty($index)){
            echo '<h2>You have nothing no to. You might want to add something.</h2>';
          }; ?>
    <ul class="list-group">
      <?php while($row = $index->fetch(PDO::FETCH_ASSOC)){ ?>
	      <li class="list-group-item d-flex justify-content-between align-items-center">
          <?php 
          if($row['done'] == 1){ 
            echo '<h2><del>'.$row['title'].'</del></h2>';
            } else {
	          echo '<h2>'.$row['title'].'</h2>';
          }; var_dump($row); ?>
          <div style="display: inline-table; text-align: right;">
              <form action="done.php" method="post" style="display: table-cell;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <input type="hidden" name="done_id" value="<?php echo $row['done']; ?>" />
                <button type="submit" class="btn btn-primary btn-lg"><?php if($row['done'] == 1) { echo "Mark as Undone"; } else { echo "Mark as Done"; }; ?></button>
              </form>
              <form action="delete.php" method="post" style="display: table-cell;">
                <input type="hidden" name="todo_id" value="<?php echo $row['id']; ?>" />
                <button type="submit" class="btn btn-primary btn-lg">Delete</button>
              </form>
          </div>
        </li>
      <?php }; ?>
    </ul>
    <form action="insert.php" style="display: inline-flex;" method="post">          
            <label  for="inputLarge" style="display: flex;padding-right: 30px; padding-top: 15px"><h2>Add</h2></label>
            <input class="form-control form-control-lg" style="display: flex; padding-right: 80px" type="text" name="title" placeholder="Add something to do">
          <button type="submit" class="btn btn-primary btn-lg" style="display: flex; text-align: right">Submit</button>
    </form>
  </div>
</div>





