<?php
class Help {
	public static function arToArray($models) {
		if(is_array($models)) {
			$result = array();
			foreach($models as $model) array_push($result, self::arToArray($model));
		} else {
			$result = $models->_attributes;	
			foreach($models->_related as $name=>$model) array_push($result, self::arToArray($model));
		}

		return $result;
	}
}
?>
