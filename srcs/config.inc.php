<?php

declare(strict_types=1);

/**                                                                                                                              
 * This is needed for cookie based authentication to encrypt password in                                                         
 * cookie. Needs to be 32 chars long.                                                                                            
 */
$cfg['blowfish_secret'] = 'fuTTghGbhj66Gfjn4Gdnkj4bH22YIFff';

/* Servers configuration */
$i = 0;

/* First server */
$i++;

/* Authentication type */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
/* Server parameters */
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;

/* Directories for saving/loading files from server */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

$cfg['TempDir'] = 'tmp';