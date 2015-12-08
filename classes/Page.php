<?php
class Page {
	public $objLanguage;

	private $table = 'pages';
	private $table_2 = 'pages_content';
	
	private $Db;
	public $language = 1;
	public $error_page_id = 2;
	
	public $not_removable = array(3);

	public function __construct($objLanguage = null){
		$this->Db = new Dbase();
		$this->objLanguage = is_object($objLanguage) ? $objLanguage : new Language();

	}

	public function getAll($search = null){
		$fields = array();
		$values = array($this->objLanguage->language);
		$sql = "SELECT 'p','id','p'.'identity', 'c'.'name',
				'c'.'content','c'.'meta_title',
				'c'.'meta_description', 'c'.'meta_keywords'
				FROM '{$this->table}' 'p'
				LEFT JOIN '{$this->table_2}' 'c'
					ON 'c'.'page' = 'p'.'id'
				WHERE 'c'.'language' = ?";
		if (!empty($search) && is_array($search)) {
			$sql .= " AND (";
				foreach ($search as $key => $value) {
					$fields[] = "'c'.'{$key}' LIKE ?";
					$values[] = "%{$values}%"
				}
				$sql .= implode(" OR ", $fields);
				$sql .= ")";
		}
		return $this->Db->getAll($sql, $values);
	}
}