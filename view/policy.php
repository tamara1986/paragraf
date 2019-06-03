<div class="container">
	<div class="card text-center" id="singlePage" style="display: none;" onclick="back()">
	  <div class="card-header">
	    <h2>Polisa osiguranja</h2>
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col-md-6" id="glavni"></div>
	    	<div class="col-md-6" id="dodatni"></div>
	  	</div>

	  </div>
	  <div class="card-footer text-muted" id="datum"></div>
	</div>	
<div class="row">
	<div style="width: 100%">
	<h1 style="color: white;" id="naslov1">NOSIOCI POLISA</h1>
   <div class="form-group" id="sortTable">
    <label for="select">Sortiraj po:</label>
    <select class="form-control" id="selectSort" onchange="sortTableByDate()">
      <option value="1" selected >Datumu rastuce</option>
      <option value="2">Datumu opadajuce</option>
    </select>
  </div>
  </div>
 

<table class="table table-hover table-dark" id="tabela">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nosioci polisa</th>
      <th scope="col">Broj pasoša</th>
      <th scope="col">Datum unosa</th>
      <th scope="col">Polisa</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$brojac=0;
  		foreach ($this->data['content'] as $key => $value) {
  			?>
  			<tr onclick="singlePolicy(<?php echo $value['id']; ?>)">
		      <th scope="row"><?php echo ++$brojac; ?></th>
		      <td><?php echo $value['ime_i_prezime']; ?></td>
		      <td><?php echo $value['broj_pasosa']; ?></td>
		      <td><?php echo $value['datum_unosa']; ?></td>
		      <?php 
		      	if ($value['polisa']==0) {
		      		?>
		      			<td><?php echo 'Individualno'; ?></td>
		      		<?php
		      	}else{
		      		?>
		      			 <td><?php echo 'Grupno'; ?></td>
		      		<?php
		      	}
		       ?>
		      
		     
		    </tr>
  			<?php
  		}

  	 ?>
 
  </tbody>
</table>
<table class="table table-hover table-dark" id="tabela2" style="display: none;">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nosioci polisa</th>
      <th scope="col">Broj pasoša</th>
      <th scope="col">Datum unosa</th>
      <th scope="col">Polisa</th>
    </tr>
  </thead>
  <tbody id="tbodyTable">
  	

  	</tbody>
</table>
	</div>

</div>