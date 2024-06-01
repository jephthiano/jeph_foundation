<?php
class transaction{
    private $table = 'transaction_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    
    public $id;
    public $name;
    public $email;
    public $phonenumber;
    public $amount;
    public $currency;
    public $ref_id;
    public $payment_method;
    public $bank;
    public $brand;
    public $account_name;
    public $account_number;
    public $ipaddress;
    public $status;
    public $regdatetime;
    
    public function __construct($conn = ''){
        if(!empty($conn)){
            //CREATE CONNECTION
            require_once(file_location('inc_path','connection.inc.php'));
            $this->dbconn = dbconnect($conn,'PDO');
        }
        @$this->current_user = test_input(ssl_decrypt_input($_SESSION['user_id'])); 
    }
    
    public function __destruct(){
    	//CLOSES ALL CONNECTION
        if(is_resource($this->dbconn)){
            closeconnect('db',$this->dbconn);
        }
        if(is_resource($this->dbstmt)){
            closeconnect('stmt',$this->dbstmt);
        }
    }
    public function insert_transation($status='failed'){
        $this->dbsql = "INSERT INTO {$this->table}(t_name,t_email,t_phonenumber,t_amount,t_currency,t_ref_id,t_payment_method,t_bank,t_brand,t_account_name,
            t_account_number,t_ipaddress,t_status)
            VALUES(:name,:email,:phonenumber,:amount,:currency,:ref_id,:payment_method,:bank,:brand,:account_name,:account_number,:ipaddress,:status)";
        $this->dbstmt =  $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':email',$this->email,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':phonenumber',$this->phonenumber,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':amount',$this->amount,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':currency',$this->currency,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':ref_id',$this->ref_id,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':payment_method',$this->payment_method,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':bank',$this->bank,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':brand',$this->brand,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':account_name',$this->account_name,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':account_number',$this->account_number,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':ipaddress',$this->ipaddress,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':status',$status,PDO::PARAM_STR);
        $this->dbstmt->execute();
        $this->dbnumRow = $this->dbstmt->rowCount();
        if($this->dbnumRow > 0){return true;}else{return false;} 
    }//end of insert transation
    
    public function delete_transaction(){
        $this->dbsql = "DELETE FROM {$this->table} WHERE t_id = :id LIMIT 1";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){return true;}else{return false;} 
    }
}
?>