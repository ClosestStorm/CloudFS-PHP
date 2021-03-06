<?php
/**
 * Bitcasa Client PHP SDK
 * Copyright (C) 2014 Bitcasa, Inc.
 *
 * This file contains an SDK in PHP for accessing the Bitcasa infinite drive.
 *
 * For support, please send email to support@bitcasa.com.
 */

/**
 * Constants used in REST api requests
 *
 */

abstract class BitcasaConstants {
	
	const HTTPS = "https://";
	const API_VERSION_2 = "/v2";
	const FORESLASH = "/";
	
	const UTF_8_ENCODING = "UTF-8";	
	
	const HEADER_CONTENT_TYPE = "Content-Type";
	const HEADER_CONTENT_TYPE_APP_URLENCODED = "application/x-www-form-urlencoded; charset=\"utf-8\"";
	const HEADER_ACCEPT_CHARSET = "Accept-Charset";
	const HEADER_XAUTH = "XAuth";
	const HEADER_RANGE = "Range";
	const HEADER_CONNECTION = "Connection";
	const HEADER_CONNECTION_KEEP_ALIVE = "Keep-Alive";
	const HEADER_ENCTYPE = "ENCTYPE";
	const HEADER_ENCTYPE_MULTIPART = "multipart/form-data";
	const HEADER_CONTENT_TYPE_MULTIPART_BOUNDARY = "multipart/form-data;boundary=";
	const HEADER_FILE = "file";
	const HEADER_AUTORIZATION = "Authorization";
	const HEADER_DATE = "Date";
		
	const REQUEST_METHOD_GET = "GET";
	const REQUEST_METHOD_POST = "POST";
	const REQUEST_METHOD_PUT = "PUT";
	const REQUEST_METHOD_DELETE = "DELETE";
	const REQUEST_METHOD_HEAD = "HEAD";
	
	const METHOD_AUTHENTICATE = "/authenticate";
	const METHOD_OAUTH2 = "/oauth2";
	const METHOD_ACCESS_TOKEN = "/access_token";
	const METHOD_AUTHORIZE = "/authorize";
	const METHOD_TOKEN = "/token";
	const METHOD_FOLDERS = "/folders";
	const METHOD_FILES = "/files";
	const METHOD_USER = "/user";
	const METHOD_PROFILE = "/profile/";
	const METHOD_META = "/meta";
	const METHOD_PING = "/ping";
	const METHOD_SHARES = "/shares/";
	const METHOD_UNLOCK = "/unlock";
	const METHOD_INFO = "/info";
	const METHOD_HISTORY = "/history";
	const METHOD_TRASH = "/trash";
	
	const PARAM_CLIENT_ID = "client_id";
	const PARAM_REDIRECT = "redirect";
	const PARAM_USER = "user";
	const PARAM_PASSWORD = "password";
	const PARAM_CURRENT_PASSWORD = "current_password";
	const PARAM_SECRET = "secret";
	const PARAM_CODE = "code";
	const PARAM_RESPONSE_TYPE = "response_type";
	const PARAM_REDIRECT_URI = "redirect_uri";
	const PARAM_GRANT_TYPE = "grant_type";
	const PARAM_PATH = "path";
	const PARAM_FOLDER_NAME = "folder_name";	
	const PARAM_ACCESS_TOKEN = "access_token";
	const PARAM_DEPTH = "depth";
	const PARAM_FILTER = "filter";
	const PARAM_LATEST = "latest";
	const PARAM_CATEGORY = "category";
	const PARAM_ID = "id";
	const PARAM_INDIRECT = "indirect";
	const PARAM_FILENAME = "filename";
	const PARAM_EXISTS = "exists";
	const PARAM_OPERATION = "operation";
	const PARAM_USERNAME = "username";
	const PARAM_VERSION = "version";
	const PARAM_VERSIONS = "versions";
	const PARAM_VERSION_CONFLICT = "version-conflict";
	const PARAM_COMMIT = "commit";
	const PARAM_FORCE = "force";
	const PARAM_TRUE = "true";
	const PARAM_FALSE = "false";
	const PARAM_START = "start";
	const PARAM_STOP = "stop";
	const PARAM_EMAIL = "email";
	const PARAM_FIRSTNAME = "first_name";
	const PARAM_LASTNAME = "last_name";
	
	const BODY_FOLDERNAME = "folder_name";
	const BODY_FILE = "file";
	const BODY_FROM = "from";
	const BODY_TO = "to";
	const BODY_EXISTS = "exists";
	const BODY_NAME = "name";
	const BODY_PATH = "path";
	const BODY_RESTORE = "restore";
	const BODY_RESCUE_PATH = "rescue-path";
	const BODY_RECREATE_PATH = "recreate-path";
	
	const OPERATION_COPY = "copy";
	const OPERATION_MOVE = "move";
	const OPERATION_CREATE = "create";
	const OPERATION_PROMOTE = "promote";
	
	const EXISTS_FAIL = "fail";
	const EXISTS_OVERWRITE = "overwrite";
	const EXISTS_RENAME = "rename";
	
	const VERSION_FAIL = "fail";
	const VERSION_IGNORE = "ignore";
	
	const RESTORE_FAIL = "fail";
	const RESTORE_RESCUE = "rescue";
	const RESTORE_RECREATE = "recreate";
	
	const START_VERSION = "start-version";
	const STOP_VERSION = "stop-version";
	const LIMIT = "limit";
	
	// update progress interval
	const PROGRESS_UPDATE_INTERVAL			= 2000;
	
	const DATE_FORMAT = "%a, %e %b %Y %H:%M:%S %Z";
	const FORM_URLENCODED = "application/x-www-form-urlencoded; charset=\"utf-8\"";
	const OAUTH_TOKEN = "/oauth2/token";
}

abstract class FileOperation {
	const DELETE = 1;
	const COPY = 2;
	const MOVE = 3;
	const ADDFOLDER = 4;
	const ALTERMETA = 5;
	const META = 6;
}
	
abstract class Exists {
	const FAIL = "fail";
	const OVERWRITE = "overwrite";
	const RENAME = "rename";
	const REUSE = "reuse";
}
	
abstract class ApiMethod {
	const GENERAL = 1;
	const ACCOUNT = 2;
	const GETLIST = 3;
	const ADD_FOLDER = 4;
	const DELETE = 5;
	const COPY = 6;
	const MOVE = 7;
	const META = 8;
 	const LISTSHARE = 9;
	const SHARE = 10;
	const BROWSE_SHARE = 11;
	const LISTHISTORY = 12;
	const LIST_FILE_VERSIONS = 13;
 	const LIST_SINGLE_FILE_VERSION = 14;
	const PROMOTE_FILE_VERSION = 15;
	const UPLOAD = 16;
	const CREATE_TEST_USER_ACCOUNT = 17;
	const RECEIVE_SHARE = 18;
}
	

abstract class VersionExists {
	const FAIL = 1;
	const IGNORE = 2;
}
	

abstract class RestoreOptions {
	const FAIL = 1;
	const RESCUE = 2;
	const RECREATE = 3;
}
	

class HistoryActions {
	const SHARE_RECEIVE = 1;
	const SHARE_CREATE = 2;
	const DEVICE_UPDATE = 3;
	const DEVICE_CREATE = 4;
	const DEVICE_DELETE = 5;
	const ALTER_META = 6;
	const COPY = 7;
	const MOVE = 8;
	const CREATE = 9;
	const DELETE = 10;
	const TRASH = 11;
		
	private $historyAction;

	private function HistoryActions($result) {
		$this->historyAction = $result;
	}
		
	public static function getResult($result) {
		if ($result == "share_receive")
			return SHARE_RECEIVE;
		else if ($result == "share_create")
			return SHARE_CREATE;
		else if ($result == "device_update")
			return DEVICE_UPDATE;
		else if ($result == "device_create")
			return DEVICE_CREATE;
		else if ($result == "device_delete")
			return DEVICE_DELETE;
		else if ($result == "alter_meta")
			return ALTER_META;
		else if ($result == "copy")
			return COPY;
		else if ($result == "move")
			return MOVE;
		else if ($result == "create")
			return CREATE;
		else if ($result == "delete")
			return DELETE;
		else if ($result == "trash")
			return TRASH;
		else
			return null;
	}
}


abstract class FileType {
	const FILE = "file";
	const FOLDER = "folder";
	const MIRROR_FOLDER = "mirror_folder";
	const ROOT = "root";
	const METAFOLDER = "metafolder";
}
	

?>
