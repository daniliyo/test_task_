<?php
require "engine.php";
?>
<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.item{
			font-weight: bold;
			font-size:36px;
			padding: 10px;
		}
	</style>
	</head>
	<body style="background-color:#d9ebfa;">
		<div class="container-fluid">
			<div class="row">
				<div class="col col-3">
				</div>
				<div class="col col-6">
					<?foreach($data as $line):?>
						<?foreach($line as $v):?>
						
							<span class="item" style="color:<?=$v['color'];?>"><?=$v['word'];?></span>
						
						<?endforeach;?>
						<br>
					<?endforeach;?>
				</div>
				<div class="col col-3">
				</div>
			</div>
		</div>
	</body>
</html>