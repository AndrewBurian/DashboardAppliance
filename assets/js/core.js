/**
 * The main js that runs the updating, xml parsing, etc
 */

var updateInterval = 20;					//Update time in seconds
var piID = "1";							//The identifier of the raspberry pi
var version = "0.1";					//The current version of the dashboard

/**
 * Initializes the javascript.
 * This starts the timer to get the updates for the dashboard.
 * 
 * @Designer: Jordan Marling
 * @Programmer: Jordan Marling
 * 
 * @param: 
 * 
 * @return:
 * 
 */
function initialize() {
	
	//get the first update.
	getUpdate();
	
	//start the update timer.
	setInterval(getUpdate, updateInterval * 1000);
}

/**
 * Gets an update from the server.
 * If it is a dashboard update, it is handled inside the updateDashboard function
 * If it is a widget update, it is handled inside the updateWidget funtion
 * 
 * @Designer: Jordan Marling
 * @Programmer: Jordan Marling
 * 
 * @param: 
 * 
 * @return:
 * 
 */
function getUpdate() {
	
	var httpUpdate = new XMLHttpRequest();
	
	httpUpdate.onreadystatechange = function() {
		
		if (httpUpdate.readyState == 4 && httpUpdate.status == 200) {
			
			if (httpUpdate.responseText.length == 0) {
				console.log("No data to load.");
				return;
			}

            console.log(httpUpdate.responseText);
                 
			var parser = new DOMParser();
			var xml = parser.parseFromString(httpUpdate.responseText, "application/xml");
			
			//get the response node and the type of update
			var rootNode = xml.getElementsByTagName("response")[0];
			var type = rootNode.getAttribute("type");
			
			switch(type) {
				
				case "dashboard": //Update dashboard
					updateDashboard(rootNode);
					break;
				
				case "widget": //Update widgets
					updateWidget(rootNode);
					break;
				
				case "reload": //Update Webpage
					updateWebpage();
					break;
				
			}
			
		}
		
	}
	
	httpUpdate.open("GET", "update.php?id=" + piID + "&version=" + version, true);
	httpUpdate.send();
}

/**
 * Updates the entire dashboards html code.
 * 
 * @Designer: Jordan Marling
 * @Programmer: Jordan Marling
 * 
 * @param: The xml returned by the server.
 * 
 * @return:
 * 
 */
function updateDashboard(xml) {
	
	var widgets = xml.getElementsByTagName("widget");
	
	document.getElementById("dashboard").innerHTML = "";
	
	for(var i = 0; i < widgets.length; i++) {


		document.getElementById("dashboard").innerHTML += widgets[i].innerHTML;


        var js = widgets[i].getAttribute("script");
        if (js != null) {
            var script = document.createElement("script");
            script.src = js;
            script.type = "text/javascript";
            document.body.appendChild(script);
        }
	}
	
}

/**
 * Updates the widget html code.
 * 
 * @Designer: Jordan Marling
 * @Programmer: Jordan Marling
 * 
 * @param: The xml returned by the server.
 * 
 * @return:
 * 
 */
function updateWidget(xml) {
	
	var widgets = xml.getElementsByTagName("widget");
	
	var widgetContent;
	
	for(var i = 0; i < widgets.length; i++) {
		
		widgetContent = widgets[i].getElementsByTagName("div")[0];
		
		document.getElementById(widgetContent.id).innerHTML = widgetContent.innerHTML;
		
	}
	
}

/**
 * Refreshes the webpage to get the latest source files.
 * 
 * @Designer: Jordan Marling
 * @Programmer: Jordan Marling
 * 
 * @param:
 * 
 * @return:
 * 
 */
function updateWebpage(xml) {
	
	//Forces the client to reload all the data on the webpage.
	location.reload(true);
	
}

//run the initialize function to start the javascript.
window.onload = function() {
	initialize();
}
