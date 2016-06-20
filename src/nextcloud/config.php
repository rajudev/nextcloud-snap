<?php

$snap_name = getenv('SNAP_NAME');

$CONFIG = array(
/**
 * Use the ``apps_paths`` parameter to set the location of the Apps directory,
 * which should be scanned for available apps, and where user-specific apps
 * should be installed from the Apps store. The ``path`` defines the absolute
 * file system path to the app folder. The key ``url`` defines the HTTP web path
 * to that folder, starting from the Nextcloud web root. The key ``writable``
 * indicates if a web server can write files to that folder.
 */
'apps_paths' => array(
	/**
	 * These are the default apps shipped with Nextcloud. They are read-only.
	 */
	array(
		'path'=> '/snap/'.$snap_name.'/current/htdocs/apps',
		'url' => '/apps',
		'writable' => false,
	),

	/**
	 * This directory is writable, meant for apps installed by the user.
	 */
	array(
		'path'=> '/var/snap/'.$snap_name.'/current/nextcloud/extra-apps',
		'url' => '/extra-apps',
		'writable' => true,
	),
),

/**
 * Database types that are supported for installation.
 *
 * Available:
 * 	- sqlite (SQLite3 - Not in Enterprise Edition)
 * 	- mysql (MySQL)
 * 	- pgsql (PostgreSQL)
 * 	- oci (Oracle - Enterprise Edition Only)
 */
'supportedDatabases' => array(
	'mysql',
),

'memcache.locking' => '\OC\Memcache\Redis',
'memcache.local' => '\OC\Memcache\Redis',
'redis' => array(
    'host' => '/var/snap/'.$snap_name.'/current/redis/redis.sock',
    'port' => 0,
),

/**
 * Nextcloud doesn't support hosting the config file out of the application, so
 * this version of Nextclout has been patched slightly to allow for it. As a
 * result, we fail the integrity check, so we'll just disable it.
 */
'integrity.check.disabled' => true,
);
