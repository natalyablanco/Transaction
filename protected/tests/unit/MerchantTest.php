<?php 
require_once("bootstrap.php");
//include "..\..\models\Merchant.php";

class MerchantTest extends CDbTestCase {
	
 	
 	
 	public $fixtures=array( 
		 'merchant'=>'Merchant',
		//you can other elements if it is exists for instance
		//'comments' => 'Comments' 
	 );
	
	public function testSaveMerchant() {
		//preparing variables
		$merchantid = "prueb12";
 		$name = "pruebita";	
		$this->assertTrue(Merchant::model()->saveMerchant($merchantid, $name));
		
	}

	public function testUniqueMerchant(){
		$merchantid = "oi2c3";
 		$name = "juan";
		try {
			//try to register same merchant_id, it should throw exception and should 
			// skip the below assertion and must execute the catch block.			
			$this->assertFalse(Merchant::model()->saveMerchant($merchantid, $name));
		}
		catch (CDbException $exp){
             echo "excep";
		}


	}
	
	public function testMissingParameters() {

		//try to register with missing parameters 
		$this->assertFalse(Merchant::model()->saveMerchant("rg43g", ""));
		$this->assertFalse(Merchant::model()->saveMerchant("", "1232424"));
		$this->assertFalse(Merchant::model()->saveMerchant("", ""));
		
	}


}

?>