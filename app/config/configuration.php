<?php
const BASEURL= "http://localhost/rentCar/public";

const SQLSERVER_CONFIG = [
	"host"=> "(local)",
	"user"=> "lukman28",
	"password"=> "2809",
	"database"=> "project_basdat"
];
const SQLSERVER_DSN = "sqlsrv:Server=" . SQLSERVER_CONFIG["host"] . ";Database=" . SQLSERVER_CONFIG["database"];