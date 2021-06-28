<?php

namespace App\Http\Controllers\Backend\Utility;

use DB;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Utilities\PHPMySQLBackup;
use App\Http\Controllers\Controller;

class UtilityController extends Controller
{
    /**
     * Show the Settings Page.
     *
     * @return Response
     */

	public function __construct(){
		header('Cache-Control: no-cache');
		header('Pragma: no-cache');
	}

	public function change_session($session_id){
		 if($session_id !="" ){
			\App\Models\Setting::where('name', 'academic_years')->update(['value' => $session_id]);
		 }
		return redirect($_SERVER['HTTP_REFERER'])->with('success','Session Changed Sucessfully.');
	}

    public function backup_database(){
		@ini_set('max_execution_time', 0);
		@set_time_limit(0);

		$return = "";
		$database = 'Tables_in_'.DB::getDatabaseName();
		$tables = array();
		$result = DB::select("SHOW TABLES");

		foreach($result as $table){
			$tables[] = $table->$database;
		}

		//loop through the tables
		foreach($tables as $table){
			$return .= "DROP TABLE IF EXISTS $table;";

			$result2 = DB::select("SHOW CREATE TABLE $table");
			$row2 = $result2[0]->{'Create Table'};

			$return .= "\n\n".$row2.";\n\n";

			$result = DB::select("SELECT * FROM $table");

			foreach($result as $row){
				$return .= "INSERT INTO $table VALUES(";
				foreach($row as $key=>$val){
					$return .= "'".addslashes($val)."'," ;
				}
				$return = substr_replace($return, "", -1);
				$return .= ");\n";
			}

			$return .= "\n\n\n";
		}

		//save file
		$file = 'backup/DB-BACKUP-'.time().'.sql';
		$handle = fopen($file,'w+');
		fwrite($handle,$return);
		fclose($handle);
        // dd($handle);

		return response()->download($file);
		return redirect()->back()->with('success', 'Backup Created Sucessfully');
	}
}
