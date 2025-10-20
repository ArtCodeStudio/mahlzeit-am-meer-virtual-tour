"use strict";

var glob_infospot = { };


/**
 * Execute ajax url get request, call func(result). 
 * @param string url
 * @param function func
 * @return string|null
 */
function ajax_get(url, func)  {
  if (!url) {
		throw('Empty url');
  }

  var req = false

  if (window.XMLHttpRequest) {
		req = new XMLHttpRequest()
  }
  else if (window.ActiveXObject) {
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP")
    }
    catch (e) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP")
      }
      catch (e) { 
				throw("Couldn't create AJAX Request");
			}
    }
  }
  else {
    throw("Couldn't create AJAX Request");
  }

	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			if (typeof func == 'function') {
				func(req.responseText);
			}
		}
	};

	req.open('GET', url, true);
	req.send(null);
}


/**
 *
 */
function showlayer(id) {

	if (!glob_infospot[id]) {
		ajax_get('infospot/' + id + '.html', function(html) { glob_infospot[id] = html; showlayer(id); });
		return;
	}

	var krpano = document.getElementById("krpanoSWFObject");
	krpano.call('looktohotspot(get(' + id + '_btn), get(view.fov))');
	krpano.set("hotspot[" + id + "_btn].visible", "false");

	var isp = document.getElementById('infospot_preview');
	isp.innerHTML = glob_infospot[id];
	isp.setAttribute('class', document.getElementById(id).getAttribute('data-art'));
	isp.setAttribute('data-id', id);
	isp.style.display = "block";

	// FF Timing Bug: avoid fail of getBoundingClientRect() ...
	setTimeout(function () {
		var ispbox = document.getElementById('infospot_preview').getBoundingClientRect();
		var isc = document.getElementById('infospot_close');
		isc.style.top = (ispbox.top - 16) + 'px';
		isc.style.left = (ispbox.left + ispbox.width - 16) + 'px';
		isc.style.display = "block";
		}, 300);
}


/**
 *
 */
function hidelayer() {
	var isp = document.getElementById('infospot_preview'), id = isp.getAttribute('data-id'), krpano = document.getElementById("krpanoSWFObject");
	krpano.set("hotspot[" + id + "_btn].visible", "true");
	document.getElementById('infospot_close').style.display = "none";
	isp.style.display = "none";
}
