<div class="container">
	<div class="row pb-2">
		<div class="col-12">
			<div class="h1 text-center pt-5">Mapa škol</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 p text-center" id="mapid" style="height: 400px;">
			<script>
				var map = L.map('mapid').setView([49.072126, 17.382849], 13); // base view je Zlechov

				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
					maxZoom: 18,
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
						'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					id: 'mapbox/streets-v11',
					tileSize: 512,
					zoomOffset: -1
				}).addTo(map);

				<?php
				$js_array = json_encode($skoly);
				echo "var skoly = " . $js_array . ";\n";
				?>

				for (let i = 0; i < skoly.length; i++) {
					L.marker(
							L.latLng(
								parseFloat(skoly[i].geo_lat),
								parseFloat(skoly[i].geo_long)
							)
						).addTo(map)
						.bindPopup(skoly[i].nazev);
				}
			</script>
		</div>
	</div>
	<div class="row pb-2">
		<div class="col-12">
			<div class="h1 text-center pt-5">Tabulka škol</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#filterInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#tableSkoly tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	<div class="row">
		<div class="col-8">
		</div>
		<div class="col-4 input-group">
			<input class="form-control" type="text" id="filterInput" placeholder="Vyhledat školu">
		</div>
	</div>
	<div class="row">
		<div class="col-12 p text-center ">
			<table class="table table-sm" id="tableSkoly">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Škola</th>
						<th scope="col">Město</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($skoly as $skola) { ?>
						<tr>
							<td scope="row"><?php echo $skola->id; ?></th>
							<td><?php echo $skola->nazev; ?></td>
							<td><?php echo $skola->mesto_nazev; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>