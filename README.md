# aws-glacier-backup

Note: PHP 7 is required!

1) Download aws-glacier-backup.phar from Releases page
2) Download aws-glacier-backup.sample.ini and rename it .aws-glacier-backup.ini and put it in your home directory
3) Populate .ini file with correct values
5) Run cat file_to_backup > php aws-glacier-backup.phar
6) The command above outputs the archive ID. Make sure to save it, you'll need it to retrieve the file