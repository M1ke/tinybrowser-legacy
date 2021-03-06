<?php
if(isset($_GET['sessidpass'])) session_id($_GET['sessidpass']);
$dir_step.='../../../';
if (!$l) require_once $dir_step.'_php.php';
/*
TinyBrowser 1.41 - A TinyMCE file browser (C) 2008  Bryn Jones
(author website - http://www.lunarvis.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// switch off error handling, to use custom handler
error_reporting(0); 

// set script time out higher, to help with thumbnail generation
set_time_limit(240);

$tinybrowser = array();

// Session control and security check - to enable please uncomment
 // workaround for Flash session bug
$tinybrowser['sessioncheck'] = 'S_id'; //name of session variable to check

// Random string used to secure Flash upload if session control not enabled - be sure to change!
$tinybrowser['obfuscate'] = 'g5yhwtb54754';

// Set default language (ISO 639-1 code)
$tinybrowser['language'] = 'en';

// Set the integration type (TinyMCE is default)
$tinybrowser['integration'] = 'tinymce'; // Possible values: 'tinymce', 'fckeditor'

// Default is rtrim($_SERVER['DOCUMENT_ROOT'],'/') (suitable when using absolute paths, but can be set to '' if using relative paths)
// $tinybrowser['docroot']=rtrim($_SERVER['DOCUMENT_ROOT'],'/');
// if (empty($s['root'])) {
//     $s['root']=get_root();
// }
// $tinybrowser['docroot'] = $s['root'];
$tinybrowser['docroot'] = DIR;

// Folder permissions for Unix servers only
$tinybrowser['unixpermissions'] = 0777;

// File upload paths (set to absolute by default)
$tinybrowser['path']['image'] = 'content/images/'; // Image files location - also creates a '_thumbs' subdirectory within this path to hold the image thumbnails
$tinybrowser['path']['media'] = 'content/media/'; // Media files location
$tinybrowser['path']['file']  = 'content/files/'; // Other files location

// File link paths - these are the paths that get passed back to TinyMCE or your application (set to equal the upload path by default)
$tinybrowser['link']['image'] = $s['site-abs'].$tinybrowser['path']['image']; // Image links
$tinybrowser['link']['media'] = $s['site-abs'].$tinybrowser['path']['media']; // Media links
$tinybrowser['link']['file']  = $s['site-abs'].$tinybrowser['path']['file']; // Other file links

// File upload size limit (0 is unlimited)
$tinybrowser['maxsize']['image'] = 0; // Image file maximum size
$tinybrowser['maxsize']['media'] = 0; // Media file maximum size
$tinybrowser['maxsize']['file']  = 0; // Other file maximum size

// Image automatic resize on upload (0 is no resize)
$tinybrowser['imageresize']['width']  = 0;
$tinybrowser['imageresize']['height'] = 0;

// Image thumbnail source (set to 'path' by default - shouldn't need changing)
$tinybrowser['thumbsrc'] = 'link'; // Possible values: path, link

// Image thumbnail size in pixels
$tinybrowser['thumbsize'] = 80;

// Image and thumbnail quality, higher is better (1 to 99)
$tinybrowser['imagequality'] = 80; // only used when resizing or rotating
$tinybrowser['thumbquality'] = 80;

// Date format, as per php date function
$tinybrowser['dateformat'] = 'd/m/Y H:i';

// Permitted file extensions
$tinybrowser['filetype']['image'] = '*.jpg, *.jpeg, *.gif, *.png'; // Image file types
$tinybrowser['filetype']['media'] = '*.swf, *.dcr, *.mov, *.qt, *.mpg, *.mp3, *.mp4, *.mpeg, *.avi, *.wmv, *.wm, *.asf, *.asx, *.wmx, *.wvx, *.rm, *.ra, *.ram'; // Media file types
$tinybrowser['filetype']['file']  = '*.*'; // Other file types

// Prohibited file extensions
$tinybrowser['prohibited'] = array('php','php3','php4','php5','phtml','asp','aspx','ascx','js','jsp','cfm','cfc','pl','bat','exe','dll','reg','cgi', 'sh', 'py','asa','asax','config','com','inc');

// Default file sort
$tinybrowser['order']['by']   = 'name'; // Possible values: name, size, type, modified
$tinybrowser['order']['type'] = 'asc'; // Possible values: asc, desc

// Default image view method
$tinybrowser['view']['image'] = 'thumb'; // Possible values: thumb, detail

// File Pagination - split results into pages (0 is none)
$tinybrowser['pagination'] = 0;

// TinyMCE dialog.css file location, relative to tinybrowser.php (can be set to absolute link)
$tinybrowser['tinymcecss'] = '../tinymce/themes/advanced/skins/default/dialog.css';
$tinybrowser['tinymcepopup']='../tinymce/tiny_mce_popup.js';
$tinybrowser['script']='../tinybrowser/';

// TinyBrowser pop-up window size
$tinybrowser['window']['width']  = 770;
$tinybrowser['window']['height'] = 480;

// Assign Permissions for Upload, Edit, Delete & Folders
$tinybrowser['allowupload']  = true;
$tinybrowser['allowedit']    = true;
$tinybrowser['allowdelete']  = true;
$tinybrowser['allowfolders'] = true;

// Clean filenames on upload
$tinybrowser['cleanfilename'] = true;

// Set default action for edit page
$tinybrowser['defaultaction'] = 'delete'; // Possible values: delete, rename, move

// Set delay for file process script, only required if server response is slow
$tinybrowser['delayprocess'] = 0; // Value in seconds

