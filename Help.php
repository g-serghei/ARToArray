<?php
class Help {
	public static function arToArray($models) {
		if(is_array($models)) {
			$result = array();
			foreach($models as $model) array_push($result, self::arToArray($model));
		} else {
			$result = $models->attributes;	
			foreach($models->relations() as $relationName=>$_) {
				if($models->hasRelated($relationName)) {
					array_push($result, self::arToArray($models->getRelated($relationName)));
				}
			}
		}

		return $result;
	}
}
?>
