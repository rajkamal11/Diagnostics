function checkUploadSpeed( iterations, update ) {
		    var average = 0,
	        index = 0,
	        timer = window.setInterval( check, 5000 ); //check every 5 seconds
		    check();
		    
		    function check() {
		        var xhr = new XMLHttpRequest(),
		            url = '?cache=' + Math.floor( Math.random() * 10000 ), //prevent url cache
		            data = getRandomString( 1 ), //1 meg POST size handled by all servers
		            startTime,
		            speed = 0;
		        xhr.onreadystatechange = function ( event ) {
		            if( xhr.readyState == 4 ) {
		                speed = Math.round( 1024 / ( ( new Date() - startTime ) / 1000 ) );
		                average == 0 
		                    ? average = speed 
		                    : average = Math.round( ( average + speed ) / 2 );
		                update( speed, average );
		                index++;
		                if( index == iterations ) {
		                	//document.getElementById( 'speed' ).textContent = 'speed: ' + speed + 'kbs';
		                	document.getElementById( 'average' ).textContent = average + ' kBbs';
		                	func();
		                    window.clearInterval( timer );
		                };
		            };
		        };
		        xhr.open( 'POST', url, true );
		        startTime = new Date();
		        xhr.send( data );
		    };
		    
		    function getRandomString( sizeInMb ) {
		        var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789~!@#$%^&*()_+`-=[]\{}|;':,./<>?", //random data prevents gzip effect
		            iterations = sizeInMb * 1024 * 1024, //get byte count
		            result = '';
		        for( var index = 0; index < iterations; index++ ) {
		            result += chars.charAt( Math.floor( Math.random() * chars.length ) );
		        };     
		        return result;
		    };
		};

	checkUploadSpeed( 3, function ( speed, average ) {
	    //document.getElementById( 'speed' ).textContent = 'speed: ' + speed + 'kbs';
	    //document.getElementById( 'average' ).textContent = 'average: ' + average + 'kbs';
	} );