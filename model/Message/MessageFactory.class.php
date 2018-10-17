<?php 
	/**
	 * 
	 */
	class MessageFactory
	{

		public static function createMessage ($type){

			switch ($type) {
				case 'SuccessMessage':
					return new SuccessMessage();
					break;
				case 'WarningMessage':
					return new WarningMessage();
					break;
				default:
					return false;
					break;
			}
		}
	}
 ?>