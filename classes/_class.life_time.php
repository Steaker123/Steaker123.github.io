<?PHP

class life_time
{


	function __construct($db)
	{
		$this->db = $db;
	}


	private function GetTimeLife($name)
	{
		switch ($name) 
		{
			case 'a_t':
				return 60*60*24*120;
			break;

			case 'b_t':
				return 60*60*24*120;
			break;
			
			case 'c_t':
				return 60*60*24*120;
			break;

			case 'd_t':
				return 60*60*24*120;
			break;
			
			case 'e_t':
				return 60*60*24*120;
			break;

			case 'f_t':
				return 60*60*24*120;
			break;

			default:
				return 60*60*24;
			break;
		}
	}


	private function GetNameItem($name)
	{
		switch ($name) 
		{
			case 'a_t':
				return "Hyundai Solaris";
			break;

			case 'b_t':
				return "Volkswagen Beetle";
			break;

			case 'c_t':
				return "Toyota Camry";
			break;
			
			case 'd_t':
				return "BMW 530i";
			break;

			case 'e_t':
				return "Audi Q7";
			break;

			case 'f_t':
				return "Mercedes-Benz SLS AMG";
			break;

			default:
				return $name;
			break;
		}
	}


	public function AddItem($user_id, $name, $time=0)
	{
		$db = $this->db;
		$now = time();
		if ($time==0) $del = $now + $this->GetTimeLife($name);
		else
			$del = $now + $time;
		$sql = "insert into `db_product_time` 
				(`id_user`, `name`, `date_add`, `date_del`, `status`)
				values
				($user_id, '$name', $now, $del, 1)";
		$db->Query($sql);
		return ($db->LastInsert()>0);
	}


	public function CheckTime()
	{
		$db = $this->db;
		$now = time();
		$sql = "select * from `db_product_time` where `status`=1 and `date_del`<=$now";
		$db->Query($sql);
		$arr = array();
		if ($db->NumRows()>0)
		{
			while($row = $db->FetchArray()) 
			{
				$arr[] = $row;
			}
		}
		if (count($arr)>0)
		{
			foreach ($arr as $row) 
			{
				$id = $row['id'];
				$par = $row['name'];
				$user = $row['id_user'];
				$sql = "update `db_users_b` set `$par`=`$par`-1 where `id`=$user";
				$db->Query($sql);
				$sql = "update `db_product_time` set  `status`=0 where `id`=$id";
				$db->Query($sql);
			}
		}
	}

	private function ConvertTime($val)
	{
		$time = (int)$val;
		$m = floor($time / 60);
		$h = floor($m / 60);
		$m = $m - $h*60;
		$s = $time - $m*60 - $h*60*60;
	   if($h != 0) return "$h час.";
	   if($m != 0) return "$m мин.";
	   if($s != 0) return "$s сек.";
	}


	public function GetTable($user_id)
	{
		$db = $this->db;
		echo $style;
		$sql = "select * from `db_product_time` where `status`=1 and `id_user`=$user_id";
		$db->Query($sql);
		while($row = $db->FetchArray()) 
		{
		$time = (int)$val;
		$m = floor($time / 60);
		$h = floor($m / 60);
		$m = $m - $h*60;
		$s = $time - $m*60 - $h*60*60;
			$tim = (int)$row['date_del']-time();
			$tim = $this->ConvertTime($tim);
			echo "<tr>";
				echo "<td>";
				echo $this->GetNameItem($row['name'])." </td><td> ".sprintf("%.0f",$tim/24);
				echo "</td>";
			echo "</tr>";
		}
	}

}