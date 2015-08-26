<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand"></span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/users/logoff"><span class="glyphicon glyphicon-log-in"> Logoff</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <h3>Hello <?php echo $this->session->userdata('name'); ?></h3>
      <h4>You have been poked <?php echo $poke_count; ?> times!</h4>
      <?php 
      foreach ($poke_history as $p){
        echo "<p>{$p['name']} poked you {$p['poke_count']} times.</p>";
      }
       ?>
      <h3>People you may want to poke:
        <table class='table-striped'>
          <thead>
            <th>Name</th>
            <th>Alias</th>
            <th>Email</th>
            <th>Poke History</th>
            <th>Action</th>
          </thead>
          <tbody>
      <?php 
        foreach($people as $p){
          echo "<tr>";
          echo "<td>{$p['name']}</td>";
          echo "<td>{$p['alias']}</td>";
          echo "<td>{$p['email']}</td>";
          echo "<td>{$p['poke_count']}</td>";
          echo "<td><a href='/users/poke_person/{$this->session->userdata('current_user_id')}/{$p['id']}'>Poke</a></td>";
          echo "</tr>";
        }
      ?>
      </tbody>
    </table>
    </div>
  </div>
</body>
</html>