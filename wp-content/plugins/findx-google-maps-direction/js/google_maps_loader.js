var _agmMapIsLoaded = false;


function agmInitialize ()
{
	_agmMapIsLoaded = true;
}


function loadGoogleMaps ()
{
	var protocol = '';
	try { protocol = document.location.protocol; } catch (e) { protocol = 'http:'; }
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = protocol + "//maps.google.com/maps/api/js?v=3&libraries=panoramio&sensor=false&callback=agmInitialize";
	document.body.appendChild(script);
}

jQuery(window).load(loadGoogleMaps);
