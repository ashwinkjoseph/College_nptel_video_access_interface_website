The files will be uploaded to the directory ./uploads/FILES/
this directory has to be created before uplaoding any files.

To Upload files, currently use the upload.php

While uploading, you can select multiple files of multiple formats (videos, pdfs, ppts etc)

if you are uploading a webpage, upload only if its a single file, folders cannot be uploaded as folders
otherwise, convert it into pdfs

the title of the file will be chosen as the topic itself.

if you are uploading a link to a website, you can do that by choosing type as website.

And you would also require a mysql database
the database should be named nptel
the database should contain the table files
the structure of the table is given below:

CREATE TABLE `nptel`.`files` (
  `id` int(11) NOT NULL,
  `Discipline` varchar(40) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Format` varchar(40) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

