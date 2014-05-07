/**
 * The main js that runs the updating, xml parsing, etc
 */

var updateInterval = 0.1;					//Update time in minutes
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
	setInterval(getUpdate, updateInterval * 60 * 1000);
	
	$(".gridster ul").gridster({
		widget_margins: [10, 10],
		widget_base_dimensions: [140, 140]
	});
	
	//$(".gridster ul").gridster().data('gridster').add_widget('<li data-row="1" data-col="1" data-sizex="1" data-sizey="1"><div style="background-color: #F00;width: 100%;height: 100%;margin-left: auto;margin-right: auto;"><span id="loading">Loading...</span></div></li>');
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
			
			if (httpUpdate.responseText.length == 0) {
				console.log("Error loading data.");
				return;
			}
			
			var parser = new DOMParser();
			var xml = parser.parseFromString(httpUpdate.responseText, "application/xml");
			
			console.log(xml);
			
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
	
	var element = $(".gridster ul");
	var gridster = element.gridster().data('gridster');
	
	var widgets = xml.getElementsByTagName("li");
	
	gridster.remove_all_widgets();
	
	for(var i = 0; i < widgets.length; i++) {
		
		gridster.add_widget(widgets[i].outerHTML, 4, 3);
		
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
