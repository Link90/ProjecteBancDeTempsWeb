<?PHP

class mainfunctions
{

//-------vars ----------------------

var $connection;
var $error_message;
var $host;
var $user;
var $pass;
var $mybd;

//-------Main Operations ----------------------

function Mainfunctions()
    {
    }
	
	function InitDB($host,$uname,$pwd,$database)
    {
        $this->host=$host;
		$this->user=$uname;
		$this->pass=$pwd;
		$this->mybd=$database;
        
    }

	function LogOut()
    {
        session_start();
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');
		session_regenerate_id(true);
    }

function Login()
    {
        if(empty($_POST['username']))
        {
            $this->HandleError("UserName is empty!");
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->HandleError("Password is empty!");
            return false;
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckLoginInDB($username,$password))
        {
            return false;
        }
        
        return true;
    }
	
function crearSolicitud($hores,$oferta_id,$usuari_id)
		{
			if(empty($_POST['submitted']))
        {
            $this->HandleError("Error al inserir hores.");
            return false;
        }
			else
				{
					$phpdate = date("Y-m-d H:i:s");
					if(!isset($_SESSION)){ session_start(); }
					$this->DBLogin();
					$resultado = mysql_query("INSERT INTO Solicitud (`solicitud_id`, `estat`, `dataCreacio`, `dataAcceptacio`, `dataSolicitud`, `valoracio`, `hores`, `oferta_id`, `usuari_id`, `observacions`) 
	         VALUES (NULL, 'PENDENT', '$phpdate', NULL, '$phpdate', NULL,'$hores', '$oferta_id', '$usuari_id', NULL)");
					if (!$resultado)
					{
						$this->HandleError("Error al inserir hores.");
						return false;
					}
					$this->RedirectToURL("solicitudspendents.php");
				}
		}
	
function solicitudAcceptada()
		{
			if(empty($_POST['acceptada']))
        {
            $this->HandleError("Error al acceptar.");
            return false;
        }
			else
				{
					if(!isset($_SESSION)){ session_start(); }
					$this->DBLogin();
					$solicitud_id = $_POST['acceptada'];
					$resultado = mysql_query("UPDATE Solicitud SET estat='ACCEPTAT' WHERE solicitud_id='$solicitud_id';");
					if (!$resultado)
					{
						$this->HandleError("Error al acceptar...");
						return false;
					}
					return true;
				}
		}

function solicitudDenegada()
		{
			if(empty($_POST['denegada']))
        {
            $this->HandleError("Error al denegar.");
            return false;
        }
			else
				{
					if(!isset($_SESSION)){ session_start(); }
					$this->DBLogin();
					$solicitud_id = $_POST['denegada'];
					$resultado = mysql_query("UPDATE Solicitud SET estat='DENEGAT' WHERE solicitud_id='$solicitud_id';");
					if (!$resultado)
					{
						$this->HandleError("Error al denegar...");
						return false;
					}
					return true;
				}
		}
function crearOferta($desc,$tasca_id,$usuari_id)
		{
			if(empty($_POST['confirmar']))
        {
            $this->HandleError("Error al confirmar.");
            return false;
        }
			else
				{
					if(!isset($_SESSION)){ session_start(); }
					$this->DBLogin();
                                        $phpdate = date("Y-m-d H:i:s");
                                        $query1 = mysql_query("SELECT tasca_id from Tasca WHERE nom='$tasca_id'");
					$tasca_id = mysql_result($query1, 0, "tasca_id");
					$resultado = mysql_query("INSERT INTO Oferta(oferta_id,descripcio,dataOferta,tasca_id,usuari_id)
	          VALUES (NULL,'$desc','$phpdate','$tasca_id','$usuari_id')");
					if (!$resultado)
					{
						$this->HandleError("Error al confirmar...");
						return false;
					}
					return true;
				}
		}
	
	function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
	
	function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    } 
	
	 function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
	
	 function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
    }
	
	function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        //$username = $this->SanitizeForSQL($username);
        $pwdmd5 = $password;
        $qry = "Select * from Usuari where username='$username' and password='$pwdmd5'";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['username']  = $row['username'];
		$_SESSION['usuari_id']  = $row['usuari_id'];
        
        return true;
    }
	
	function DBLogin()
    {
        $this->connection = mysql_connect($this->host,$this->user,$this->pass);

        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysql_select_db($this->mybd,$this->connection))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        return true;
    }
	
	    function SanitizeForSQL($str)
	{
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
	}
?>
