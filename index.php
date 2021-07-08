<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	</head>
	
	
	<body>
	
	<h2>Банкомат</h2>
	<form id="myForm">
		<label>Номинал в наличии</label>
		<input type="text" name="nominals" placeholder="5, 10, 20, 50...">
		<br>
		<label>Ваша сумма</label>
		<input type="text" name="amount" placeholder="125">
		<br>
		<input type="submit" name="send">
		
		
	</form>
	<div id="result">
	</div>
	
	<script>
		$('#myForm').submit(function(e){  
			e.preventDefault();
			$("#result").html("");
			
			let amount = parseInt($('input[name="amount"]').val());
			let nominals = $('input[name="nominals"]').val();
			let error = '';
			//alert(nominals);
			//let regexp = /[0-9]{1,*}\x20\,/i;
			let regexp = /^[\d]{1,}(,\s\d+){0,}$/;
			if(!regexp.test(nominals) ||!nominals) error = error+'Некоректный ввод номиналов<br>';
			if(!Number.isInteger(amount) || !amount) error = error+"Введите целое число<br>";
			
			
			
			if(error){
				$("#result").html(error);
				return false;
			}
			$.ajax({  
				type: "POST",  
				url: "engine.php",  
				data: $(this).serialize(),  
				success: function(html){ 
				
					let resp = JSON.parse(html);
					if(resp['error'] == true){ 
						$("#result").html("Неверная сумма. Выберите "+resp['error']['min']+" или "+resp['error']['max']);
					} else {
						$("#result").html("<table id='result-table'><thead><th>Номинал</th><th>Количество</th></thead></table>");
						for (var prop in resp['res']) {
							$("#result-table").append("<tr><td>"+prop+"</td><td>"+resp['res'][prop]+"</td></tr>");
						}
					}
				}  
			});  
			return false;  
		}); 
	</script>
	</body>
</html>