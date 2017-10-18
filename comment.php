<?php

require_once '../PDO/PDO.php';

 echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		    <html xmlns="http://www.w3.org/1999/xhtml">
		    <head>
		    
		    <link href="style.css" rel="stylesheet" type="text/css" />           <!-- <<<<<<<<<<<<<<<<< exact location of the file -->
		   

		    <!-- link for comment  -->

		    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
			<link rel="stylesheet" href="http://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
			<style type="text/css">@import url("https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");</style>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<script type="text/javascript" src="jquery-1.4.2.min.js"></script>    <!-- <<<<<<<<<<<<<<<<< exact location of the file -->

			<!-- End link for comment  -->

			</head>';

function getComment ($row) {
					echo '	<div class="media-block pad-all">
							<a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя" src="http://bootstraptema.ru/snippets/icons/2016/mia/4.png"></a>
							<div class="media-body">
								<div class="mar-btm">
									<a href="#" class="btn-link text-semibold media-heading box-inline">'.$row['author'].'</a>
									<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - 20-06-2016</p>
								</div>
								<p class="form-control">'.$row['text'].'</p>
								<div class="pad-ver">
									<span class="tag tag-sm"><i class="fa fa-heart text-danger"></i> '.($row['rating+'] - $row['rating-']).'/ 250 Лайков</span>
									<div class="btn-group">
										<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
										<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
									</div>
									<button class="btn btn-sm btn-default btn-hover-primary reaply" id="'.$row['comment_id'].'">Ответить</button>
								</div>
								<hr>

								<!-- Комментарий -->
								<div class="add_coment">';

								$db = new PDO_conect();
								$result = $db->getRows("SELECT * FROM comments where parent_id=".$row['comment_id']);

									
									if($result) {
										foreach($result as $row){  getComment ($row); }
									}
								
						echo '</div>
						</div></div>';
}

?>

	<script type="text/javascript">
		$(document).ready(function () {

				$("#button_save").click(function () {
					var date =  '2017-10-07';    
					var author = $("#author").val();  
					var text = $("#text").val();       
					var parent_id = 0;   

					if($('.panel-body.coment1').length){  	 $('.panel-body.coment1').remove();}

					$.ajax ({
						url: "new_comment.php",           //<<<<<<<<<<<<<<<<< exact location of the file 
						type: "POST",
						data: {author: author, text: text, parent_id: parent_id, date: date},
					
						success: function (new_id) {

							$("#panel").append(' <hr> <div class="media-block pad-all">							<a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя" src="http://bootstraptema.ru/snippets/icons/2016/mia/4.png"></a>							<div class="media-body">								<div class="mar-btm">									<a href="#" class="btn-link text-semibold media-heading box-inline">'+author+'</a>									<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - 20-06-2016</p>			</div>	<p class="form-control">'+text+'</p>	<div class="pad-ver">	<span class="tag tag-sm"><i class="fa fa-heart text-danger"></i>  250 Лайков</span>			<div class="btn-group">		<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>	<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>	</div>		<button class="btn btn-sm btn-default btn-hover-primary reaply" id="'+new_id+'">Ответить</button>		</div>		<hr>		<!-- Комментарий -->	<div class="add_coment">');  $("#author").val('');  $("#text").val('');
						} 
					});    
				});


			$("button.reaply").click(function () {
			
				var id = $(this).attr("id");
			
				if($('.panel-body.coment1').length){
					  
					$('.panel-body.coment1').remove();
				}

				$(this).parent().append("<div class='panel com1' > <div class='panel-body coment1'> <input class='form-control' id='author1' type='text' placeholder='имя'><p></p> <textarea class='form-control' id='text1' rows='2' placeholder='Добавьте Ваш комментарий'></textarea>	<input type='hidden' name='parent_id' id='parent_id1' value="+id+" /><div class='mar-top clearfix'><button id='button_save_1' class='btn btn-sm btn-primary pull-right' type='submit'><i class='fa fa-pencil fa-fw'></i> Добавить</button>	<a class='btn btn-trans btn-icon fa fa-video-camera add-tooltip' href='#'></a>	<a class='btn btn-trans btn-icon fa fa-camera add-tooltip'  href='#'></a> <a class='btn btn-trans btn-icon fa fa-file add-tooltip' href='#''></a></div>	</div>	</div>");
				
			
				
				$("#button_save_1").click(function () {
					var date =  '2017-10-07';   
					var author = $("#author1").val();  
					var text = $("#text1").val();       
					var parent_id = $("#parent_id1").val();   

					if($('.panel-body.coment1').length){  	 $('.panel-body.coment1').remove();}

					$.ajax ({
						url: "new_comment.php",     //<<<<<<<<<<<<<<<<< exact location of the file 
						type: "POST",
						data: {author: author, text: text, parent_id: parent_id, date: date},
					
						success: function (new_id) {

							$(".panel.com1").parent().append(' <hr> <div class="media-block pad-all">							<a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя" src="http://bootstraptema.ru/snippets/icons/2016/mia/4.png"></a>							<div class="media-body">								<div class="mar-btm">									<a href="#" class="btn-link text-semibold media-heading box-inline">'+author+'</a>									<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - 20-06-2016</p>			</div>	<p class="form-control">'+text+'</p>	<div class="pad-ver">	<span class="tag tag-sm"><i class="fa fa-heart text-danger"></i>  250 Лайков</span>			<div class="btn-group">		<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>	<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>	</div>		<button class="btn btn-sm btn-default btn-hover-primary reaply" id="'+new_id+'">Ответить</button>		</div>		<hr>		<!-- Комментарий -->	<div class="add_coment">');$(".panel.com1").remove();
						}
					});
				});
			});

		});
	</script>
	
</head>

<body>

	<section class="container">
		<div class="row">
			<div class="col-md-6">

				<div class="panel">
					<div class="panel-body coment">
					    <input class="form-control" id="author" type="text" placeholder="имя"><p></p>
						<textarea class="form-control" id="text" rows="2" placeholder="Добавьте Ваш комментарий"></textarea>
						<input type='hidden' name='parent_id' id='parent_id' value="+id+" />
						<div class="mar-top clearfix">
							<button id='button_save' class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Добавить</button>
							<a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
							<a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
							<a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
						</div>
					</div>
				
				</div>
				<div class="panel">
					<div class="panel-body" id="panel">
						<!-- Содержание Новостей -->
						<!--===================================================-->
						<?php
					
							$db = new PDO_conect();
							$result = $db->getRows("SELECT * FROM comments WHERE parent_id=0");

							if($result) {
								foreach($result as $row){  getComment ($row); }
							}
						?>
					</div>
				</div>

			</div>
		</div>
	</section>

</body>
</html>