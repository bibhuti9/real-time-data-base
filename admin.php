<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>
</head>
<body>


	<table>
		<tr>
			<input type="text" id="match_id"  name="" placeholder="Enter Match Id">
			<input type="text" id="match_name" name="" placeholder="Enter Match name ">
			<input type="text" id="run" name="" placeholder="Entet run">
			<input type="text" id="wicket" name="" placeholder="Wicket"> 
			<input type="text" id="over" name="" placeholder="over"> 
			<button id="btnadd">Add Match</button>
		</tr>
	</table><br><br><br>


	<table border="1px solid black" cellpadding="2" cellspacing="5">
		<tr>
			<th>Match Name</th>
			<th>Match Run</th>
			<th>Match Wicket</th>
			<th>Match Over</th>
		</tr>
		<tr>
			<td><input type="text" id="get_match_name"></td>
			<td><input type="text" id="get_match_run"></td>
			<td><input type="text" id="get_match_wicket"></td>
			<td><input type="text" id="get_match_over"></td>
			<td><button id="update_score">Update</button></td>
		</tr>
	</table>


	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>
	
	<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase.js"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->


<!--  ENTER YOUR FIREBASE SCRIPT HERE -->


<script type="text/javascript">



	const database =firebase.database();
	const firstmatch=database.ref('1');
	var add_match=document.getElementById("btnadd");
	var match_id=document.getElementById("match_id");
	var match_name=document.getElementById("match_name");
	var match_run=document.getElementById("run");
	var wicket=document.getElementById("wicket");
	var over=document.getElementById("over");
  	add_match.addEventListener('click',(e)=>{
	  	e.preventDefault();
	  	database.ref(match_id.value).set({
	  		match_name:match_name.value,
	  		match_run:match_run.value,
	  		match_wicket:wicket.value,
	  		match_over:over.value
	  	});
  	});

  	update_score.addEventListener('click',(e)=>{
  		e.preventDefault();
  		firstmatch.update({
	  		match_run:document.getElementById("get_match_run").value,
	  		match_wicket:document.getElementById("get_match_wicket").value,
	  		match_over:document.getElementById("get_match_over").value
  		});
  	});
  	firstmatch.child('match_name').on('value',snapshot => {
  		document.getElementById("get_match_name").value=snapshot.val();
  	});
  	firstmatch.child('match_run').on('value',snapshot => {
  		document.getElementById("get_match_run").value=snapshot.val();
  	});
  	firstmatch.child('match_wicket').on('value',snapshot => {
  		document.getElementById("get_match_wicket").value=snapshot.val();
  	});
  	firstmatch.child('match_over').on('value',snapshot => {
  		document.getElementById("get_match_over").value=snapshot.val();
  	});
</script>


</body>
</html>
