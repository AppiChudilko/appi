<?php

namespace Appi\Core;

/**
* Constant class
*/
class EnumConst
{	

	const VERSION = '0.2.2';
	/*
	* ERRORS
	*/
	const ERROR_EMAIL_IS_CREATE = 'This email is create';
	const ERROR_SQL_ARRAY = 'Error params';

	/*
	* DATA BASE CONNECT PARAMS
	*/
	const DB_HOST = 'password';
	const DB_NAME = 'db_name';
	const DB_USER = 'user_name';
	const DB_PASS = 'password';

	/*
	* DATA BASE TABLE
	*/
	const NEWS = 'fw_news';
	const STATS = 'fw_statistic';
	const STATS_DAY = 'fw_stats_day';

	/*
	* DATA BASE COLUMN NAME
	*/
	const ID = 'id';

	const U_NAME = 'name';
	const U_SURNAME = 'surname';
	const U_LASTNAME = 'lastname';
	const U_EMAIL = 'email';
	const U_LOGIN = 'login';
	const U_PASSWORD = 'password';
	const U_TOKEN = 'token';

	const ST_IP = 'ip';
	const ST_COUNT = 'count';
	const ST_LAST_CONNECT = 'last_connect';
	const ST_REFERER = 'http_referer';

	const ST_D_ALL_COUNT = 'all_count';
	const ST_D_COUNT = 'count';
	const ST_D_DAY = 'day';
	const ST_D_MONTH = 'month';
	const ST_D_YEAR = 'year';
}