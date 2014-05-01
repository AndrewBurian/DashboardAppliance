/**
 * The main js that runs the updating, xml parsing, etc
 */

var updateInterval = 10 * 60 * 1000;	//Update time in milliseconds
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
	
	//then start the timer.
	setInterval(getUpdate, updateInterval);
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
		
		if (httpUpdate.status == 200 && httpUpdate.readyState == 4) {
			
			//get the response node and the type of update
			var rootNode = httpUpdate.responseXML.getElementsByTagName("response")[0];
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
	
	httpUpdate.open("GET", "index.php?id=" + piID + "&version=" + version, true);
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
	
	document.getElementById("dashboard").innerHTML = xml.innerHTML;
	
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
initialize();
