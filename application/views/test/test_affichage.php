<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Selectize.js Demo</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/css/stylesheet.css">
		<!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
		<script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/js/jquery.js"></script>
		<script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b'); ?>/dist/js/standalone/selectize.js"></script>
		<script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/js/index.js"></script>
                <link rel="stylesheet" href="<?php echo base_url('assets/selectize-selectize.js-f293d8b/dist'); ?>/css/selectize.default.css">
		<style type="text/css">
		.demo-animals .scientific {
			font-weight: normal;
			opacity: 0.3;
			margin: 0 0 0 2px;
		}
		.demo-animals .scientific::before {
			content: '(';
		}
		.demo-animals .scientific::after {
			content: ')';
		}
		</style>
	</head>
    <body>
		<div id="wrapper">
			<h1>Selectize.js</h1>

			<div class="demo">
				<h2>Optgroups (basic)</h2>
				<div class="control-group">
					<label for="select-gear">Gear:</label>
					<select id="select-gear" class="demo-default" multiple placeholder="Select gear...">
						<option value="">Select gear...</option>
						<optgroup label="Climbing">
							<option value="pitons">Pitons</option>
							<option value="cams">Cams</option>
							<option value="nuts">Nuts</option>
							<option value="bolts">Bolts</option>
							<option value="stoppers">Stoppers</option>
							<option value="sling">Sling</option>
						</optgroup>
						<optgroup label="Skiing">
							<option value="skis">Skis</option>
							<option value="skins">Skins</option>
							<option value="poles">Poles</option>
						</optgroup>
					</select>
				</div>
				<script>
				$('#select-gear').selectize({
					sortField: 'text'
				});
				</script>
			</div>

			<div class="demo">
				<h2>Optgroups (repeated options)</h2>
				<div class="control-group">
					<label for="select-repeated-options">Options:</label>
					<select id="select-repeated-options" class="demo-default" multiple>
						<option value="">Select...</option>
						<optgroup label="Group 1">
							<option value="a">Item A</option>
							<option value="b">Item B</option>
						</optgroup>
						<optgroup label="Group 2">
							<option value="a">Item A</option>
							<option value="b">Item B</option>
						</optgroup>
					</select>
				</div>
				<script>
				$('#select-repeated-options').selectize({
					sortField: 'text'
				});
				</script>
			</div>

			<div class="demo">
				<h2>Optgroups (programmatic)</h2>
				<div class="control-group">
					<label for="select-animal">Animal:</label>
					<select id="select-animal" class="demo-animals" placeholder="Select animal..."></select>
				</div>
				<script>
				$('#select-animal').selectize({
					options: [
						{class: 'mammal', value: "dog", name: "Dog" },
						{class: 'mammal', value: "cat", name: "Cat" },
						{class: 'mammal', value: "horse", name: "Horse" },
						{class: 'mammal', value: "kangaroo", name: "Kangaroo" },
						{class: 'bird', value: 'duck', name: 'Duck'},
						{class: 'bird', value: 'chicken', name: 'Chicken'},
						{class: 'bird', value: 'ostrich', name: 'Ostrich'},
						{class: 'bird', value: 'seagull', name: 'Seagull'},
						{class: 'reptile', value: 'snake', name: 'Snake'},
						{class: 'reptile', value: 'lizard', name: 'Lizard'},
						{class: 'reptile', value: 'alligator', name: 'Alligator'},
						{class: 'reptile', value: 'turtle', name: 'Turtle'}
					],
					optgroups: [
						{value: 'mammal', label: 'Mammal', label_scientific: 'Mammalia'},
						{value: 'bird', label: 'Bird', label_scientific: 'Aves'},
						{value: 'reptile', label: 'Reptile', label_scientific: 'Reptilia'}
					],
					optgroupField: 'class',
					labelField: 'name',
					searchField: ['name'],
					render: {
						optgroup_header: function(data, escape) {
							return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
						}
					}
				});
				</script>
			</div>

			<div class="demo">
				<h2>Plugin: "optgroup_columns"</h2>
				<div class="control-group" id="select-car-group">
					<input type="text" id="select-car" placeholder="Select cars...">
				</div>
				<script>
					$("#select-car").selectize({
						options: [
							{id: 'avenger', make: 'dodge', model: 'Avenger'},
							{id: 'caliber', make: 'dodge', model: 'Caliber'},
							{id: 'caravan-grand-passenger', make: 'dodge', model: 'Caravan Grand Passenger'},
							{id: 'challenger', make: 'dodge', model: 'Challenger'},
							{id: 'ram-1500', make: 'dodge', model: 'Ram 1500'},
							{id: 'viper', make: 'dodge', model: 'Viper'},
							{id: 'a3', make: 'audi', model: 'A3'},
							{id: 'a6', make: 'audi', model: 'A6'},
							{id: 'r8', make: 'audi', model: 'R8'},
							{id: 'rs-4', make: 'audi', model: 'RS 4'},
							{id: 's4', make: 'audi', model: 'S4'},
							{id: 's8', make: 'audi', model: 'S8'},
							{id: 'tt', make: 'audi', model: 'TT'},
							{id: 'avalanche', make: 'chevrolet', model: 'Avalanche'},
							{id: 'aveo', make: 'chevrolet', model: 'Aveo'},
							{id: 'cobalt', make: 'chevrolet', model: 'Cobalt'},
							{id: 'silverado', make: 'chevrolet', model: 'Silverado'},
							{id: 'suburban', make: 'chevrolet', model: 'Suburban'},
							{id: 'tahoe', make: 'chevrolet', model: 'Tahoe'},
							{id: 'trail-blazer', make: 'chevrolet', model: 'TrailBlazer'},
						],
						optgroups: [
							{id: 'dodge', name: 'Dodge'},
							{id: 'audi', name: 'Audi'},
							{id: 'chevrolet', name: 'Chevrolet'}
						],
						labelField: 'model',
						valueField: 'id',
						optgroupField: 'make',
						optgroupLabelField: 'name',
						optgroupValueField: 'id',
						optgroupOrder: ['chevrolet', 'dodge', 'audi'],
						searchField: ['model'],
						plugins: ['optgroup_columns'],
						openOnFocus: false
					});
				</script>
			</div>
		</div>
	</body>
</html>