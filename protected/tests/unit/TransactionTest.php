<?php 
require_once("bootstrap.php");
//include "..\..\models\Merchant.php";

class TransactionTest extends CDbTestCase {

	
	public $fixtures=array( 
		 'transaction'=>'Transaction',
		//you can other elements if it is exists for instance
		//'comments' => 'Comments' 
	 );
	
	public function testSaveTransaction() {
		$merchant_usn = "19945x921532";
 		$amount = "809";
 		$nit = "4vv3v53v33";
 		$trans_status = "con";
 		$message = "0:Transacao OK!";
 		$payment_type = "C";
 		$orderid = "1232332";

		$this->assertTrue(Transaction::model()->saveTransaction($merchant_usn, $amount,
			$nit,$trans_status,$message,$payment_type,$orderid));

	}

	public function testUniqueTransaction(){
		$merchant_usn = "19945x9215v6";
 		$amount = "809";
 		$nit = "4vv3v53v33";
 		$trans_status = "con";
 		$message = "0:Transacao OK!";
 		$payment_type = "C";
 		$orderid = "34253";
		try {
			//try to register same merchant_id, it should throw exception and should 
			// skip the below assertion and must execute the catch block.			
			$this->assertFalse(Transaction::model()->saveTransaction($merchant_usn, $amount,
			$nit,$trans_status,$message,$payment_type,$orderid));
		}
		catch (CDbException $exp){
             echo "excep";
		}


	}

	/*Probar que los valores de una transaccion se actualiza*/
	public function testUpdateTransaction(){
		$merchant_usn = "19945q13x923";
 		$amount = "2032";
 		$nit = "6ber2323f";
 		$trans_status = "neg";
 		$message = "1:Transacao NO!";
 		$payment_type = "a";
 		$orderid = "34256";
		
		$this->assertTrue(Transaction::model()->updateTransaction($merchant_usn, $amount,
			$nit,$trans_status,$message,$payment_type,$orderid));
		

		$model = Transaction::model()->findByPk($merchant_usn);

		$this->assertEquals($model->amount, $amount);
		$this->assertEquals($model->nit, $nit);
		$this->assertEquals($model->trans_status, $trans_status);
		$this->assertEquals($model->message, $message);
		$this->assertEquals($model->payment_type, $payment_type);
		$this->assertEquals($model->order_id, $orderid);
		

	}
	
	public function testMissingParameters() {
		//try to register with no parameters 
		$this->assertFalse(Transaction::model()->saveTransaction("", "","","","","",""));
		//one paramater missing
		$this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "","","","","",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "809","","","","",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "","4vv3v53v33","","","",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "","","con","","",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "","","","0:Transacao OK!","",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "","","","","C",""));
		$this->assertFalse(Transaction::model()->saveTransaction("", "","","","","","1232332"));
		//letters in amount
		$this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "vw4","4vv3v53v33","con","0:Transacao OK!","C","1232332"));
		//Payment_type longer than 1
		$this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "vw4","4vv3v53v33","con","0:Transacao OK!","C32f","1232332"));
		
	}
}

?>