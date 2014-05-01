/*
-
-   Database for the widgets/dashboard and the control panel
-
-
-
*/

DROP TABLE IF EXISTS piDashboards;
DROP TABLE IF EXISTS dashboardWidgets;
DROP TABLE IF EXISTS widget;
DROP TABLE IF EXISTS dashboard;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS pi;
/*
-
- Table for the pi`s
-
*/
CREATE TABLE IF NOT EXISTS `pi`(
    `id` int(5) NOT NULL AUTO_INCREMENT,
    `city` varchar(256) NOT NULL,
    `department` varchar(256),
    `desc` TEXT,
  PRIMARY KEY (`id`)
); 

/*
-
- Table for the widgets
-
*/
CREATE TABLE IF NOT EXISTS `dashboard`(
        `id` int(5) NOT NULL AUTO_INCREMENT,
        `name` varchar(256),
        `TTL` int(5),
        `gridFormat` TEXT,     
    PRIMARY KEY (`id`)
);

/*
-
- Table for the widgets used on the dashboard
-
*/
CREATE TABLE IF NOT EXISTS `widget`(
    `id` int(5) NOT NULL AUTO_INCREMENT,
    `type` varchar(256),
    `desc` TEXT,
    `modelName` varchar(256),
    `style` TEXT,
    `TTL` int(5),
    PRIMARY KEY (`id`)
);

/*
-
- Table for the pi-dashboard relation
-
*/
CREATE TABLE IF NOT EXISTS `piDashboards`(
    `piNumber` int(5) NOT NULL,
    `dashboardID` int(5) NOT NULL,
    PRIMARY KEY (`piNumber`, `dashboardID`),
        FOREIGN KEY (`piNumber`) REFERENCES pi(`id`),
        FOREIGN KEY (`dashboardID`) REFERENCES dashboard(`id`)
);

/*
-
- Table for the dashboard - widget relation
-
*/
CREATE TABLE IF NOT EXISTS `dashboardWidgets`(
    `dashboardID` int(5) NOT NULL,
    `widgetID` int(5) NOT NULL,
    PRIMARY KEY (`dashboardID`, `widgetID`),
        FOREIGN KEY (`dashboardID`) REFERENCES dashboard(`id`),
        FOREIGN KEY (`widgetID`) REFERENCES widget(`id`)
);
