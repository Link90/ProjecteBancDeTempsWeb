<?PHP
require_once("mainfunctions.php");

$mainfunctions = new Mainfunctions();

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$mainfunctions->InitDB(/*hostname*/'mysql.hostinger.es',
                      /*username*/'u762658939_ivan',
                      /*password*/'albertesgay',
                      /*database name*/'u762658939_bdt');


?>