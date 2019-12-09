if($pcategory != $check2){
			$dataincategory = array(
						'cat_name' => $check11,
						'hold_id' => $holdid
					);

	  		$query2 = $this->db->insert('tbl_lookup_category', $dataincategory);

	  		if($psubcategory != '-'){
		  		$datainsubcategory = array(
		  					'subCat_name' => $psubcategory,
		  					'hold_id' => $holdid
						);
		  		$query3 = $this->db->insert('tbl_lookup_subcategory', $datainsubcategory);

			}else{
				$this->db->select('*');
				$this->db->where('hold_id', $pcategory);
				$query11 =  $this->db->get('tbl_lookup_category')->result();
				foreach ($query11 as $data2) 
				{
					$check11 = $data2->cat_name;
				}
			}



			// $dataincategory = array(
				// 		'cat_name' => $pcategory,
				// 		'hold_id' => $holdid
				// 	);

		  // 		$query2 = $this->db->insert('tbl_lookup_category');

		  // 		if($psubcategory != '-'){
		  // 		$datainsubcategory = array(
		  // 					'subCat_name' => $psubcategory,
		  // 					'hold_id' => $holdid
				// 		);
		  // 		$query3 = $this->db->insert('tbl_lookup_subcategory');