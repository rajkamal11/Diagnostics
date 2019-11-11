<html>
<head>
	<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 70%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
	<script src="Scripts/br.js"></script>
	<script src="Scripts/down.js"></script>
	<script src="Scripts/upload.js"></script>
	<script src="Scripts/DetectRTC.js"> </script>
	<!-- <script src="Scripts/DetectRTC.js"></script> -->
</head>
<body>	
	<table>
		<tr>
		    <th>Name/Type</th>
		    <th>Value</th>
  		</tr>
		<tr>
			<td>
				OS
			</td>
			<td>
				<p id='os'>VERSION</p>
				<script>
    				configure(this);
    				document.getElementById('os').innerHTML = jscd.os + ' ' + jscd.osVersion;
    				//document.write(jscd.os + ' ' + jscd.osVersion);
    			</script>
			</td>
		</tr>
		<tr>
			<td>
				Browser
			</td>
			<td>
				<p id='br'></p>
				<script>
    				// document.write(jscd.browser +' '+ jscd.browserMajorVersion +
      		// 						' (' + jscd.browserVersion + ')');
    				document.getElementById('br').innerHTML = jscd.browser +' '+ jscd.browserMajorVersion +' (' + jscd.browserVersion + ')';
    			</script>
			</td>
		</tr>
		<tr>
			<td>
				Screen Resolution
			</td>
			<td>
				<p id = 'res'></p>
				<script>
					document.getElementById('res').innerHTML = jscd.screen;
    				//document.write(jscd.screen);
    			</script>
			</td>
		</tr>
		<tr>
			<td>
				Flash Player
			</td>
			<td>
				<p id='flash'>VERSION</p>
			</td>
		</tr>
		<tr>
			<td>
				Sound Output Device
			</td>
			<td>
				<p id="sp"></p>
			</td>
		</tr>
		<tr>
			<td>
				Sound Input Device
			</td>
			<td>
				<p id="mc"></p>
			</td>
		</tr>
		<tr>
			<td>
				Upload Speed
			</td>
			<td>
				<p id = "average"><b>Calculating...Wait!</b></p>
			</td>
		</tr>
		<tr>
			<td>
				Download Speed
			</td>
			<td>
				<p id="Dspeed"><b>Calculating...Wait!</b></p>
			</td>
		</tr>
		<tr>
			<td>
				Processor
			</td>
			<td>
				<p id='proc'></p>
				<script type="text/javascript">
					//document.write("Core : " + window.navigator.hardwareConcurrency + "<br>");//No. of Core
					var _speedconstant = 5.9997e-9; //if speed=(c*a)/t, then constant=(s*t)/a and time=(a*c)/s
					var d = new Date();
					var amount = 150000000;
					var estprocessor = 1.7; //average processor speed, in GHZ
					console.log("Running loop "+amount+" times.     Estimated time (for "+estprocessor+"ghz processor) is "+(Math.round(((_speedconstant*amount)/estprocessor)*100)/100)+"s");
					for (var i = amount; i>0; i--) {} 
					var newd = new Date();
					var accnewd = Number(String(newd.getSeconds())+"."+String(newd.getMilliseconds()));
					var accd = Number(String(d.getSeconds())+"."+String(d.getMilliseconds())); 
					var di = accnewd-accd;
					//console.log(accnewd,accd,di);
					if (d.getMinutes() != newd.getMinutes()) {
					di = (60*(newd.getMinutes()-d.getMinutes()))+di}
					spd = ((_speedconstant*amount)/di);
					//document.write("Estimated speed: "+Math.round(spd*1000)/1000+"GHZ");//"Time: "+Math.round(di*1000)/1000+"s, e
					document.getElementById('proc').innerHTML = "Core : " + window.navigator.hardwareConcurrency + "<br>" + "Estimated speed: "+Math.round(spd*1000)/1000+"GHZ";
				</script>
			</td>
		</tr>
	</table>
	<script>
                DetectRTC.load(function() {
                    document.getElementById('sp').innerHTML = DetectRTC.hasMicrophone;
                    document.getElementById('mc').innerHTML = DetectRTC.hasSpeakers;
                });
    </script>
    <script type="text/javascript">
    	function func()
    	{
    	var data = new FormData();
    	var name = "<?php echo $_POST['name']; ?>";
    	console.log("Name : "+name);
    	var d = name+'@@@@@@\nOS:' + document.getElementById('os').innerHTML + '\nBrowser:'+document.getElementById('br').innerHTML+'\nResolution:'+document.getElementById('res').innerHTML+
    	'\nFlash:'+document.getElementById('flash').innetHTML+'\nsoundOut:'+document.getElementById('sp').innerHTML+'\nsoundIn:'+document.getElementById('mc').innerHTML+'\nUpSpeed:'+document.getElementById('average').innerHTML+'\nDownSpeed:'+document.getElementById('Dspeed').innerHTML+'\nProcessor:'+document.getElementById('proc').innerHTML;
    	document.getElementById("done").innerHTML = "Done!";
		data.append("data" , d);
		var xhr = new XMLHttpRequest();
		xhr.open( 'post', 'save.php', true );
		xhr.send(data);
	}
    </script>
    <p style = "font-size: 20px;" id='done'>Wait...</p>
</body>
</html>