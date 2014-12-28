<?php

use mvc\config\configClass;

configClass::setRowGrid(10);

configClass::setDbHost('localhost');
configClass::setDbDriver('pgsql'); // pgsql
configClass::setDbName('teusaquillo');
configClass::setDbPort(5432); // 5432
configClass::setDbUser('postgres');
configClass::setDbPassword('sqlx32');
configClass::setDbDsn(
        configClass::getDbDriver()
        . ':host=' . configClass::getDbHost()
        . ';port=' . configClass::getDbPort()
        . ';dbname=' . configClass::getDbName()
);

configClass::setPathAbsolute('/Applications/MAMP/htdocs/SohoFramework/');
configClass::setUrlBase('http://localhost/SohoFramework/web/');

configClass::setScope('dev'); // prod
configClass::setDefaultCulture('es');
configClass::setIndexFile('index.php');

configClass::setFormatTimestamp('Y-m-d H:i:s');

configClass::setHeaderJson('Content-Type: application/json; charset=utf-8');
configClass::setHeaderXml('Content-Type: application/xml; charset=utf-8');
configClass::setHeaderHtml('Content-Type: text/html; charset=utf-8');
configClass::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
configClass::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
configClass::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
configClass::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

configClass::setCookieNameRememberMe('mvcSiteRememberMe');
configClass::setCookieNameSite('mvcSite');
configClass::setCookiePath('/SohoFramework/web/' . configClass::getIndexFile());
configClass::setCookieDomain('http://localhost/');
configClass::setCookieTime(3600*8); // una hora en segundo 3600 y por 8 serían 8 horas

configClass::setDefaultModule('default');
configClass::setDefaultAction('index');

configClass::setDefaultModuleSecurity('shfSecurity');
configClass::setDefaultActionSecurity('index');