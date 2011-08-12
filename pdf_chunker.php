<?php
require_once 'Zend/Pdf.php';

class pdf_chunker{
	private $tempPath;
	
	function __construct(){
		$this->tempPath = "temp/";
	}

	function get_chunk($file_name, $page_start, $pages){
		try{
			
			$pdf_book = Zend_Pdf::load($file_name);
			// echo $file_name; exit;
			$pdf_chunk = new Zend_Pdf();
			for ($i=$page_start-1;$i < $page_start+$pages;$i++){
				if ($i<count($pdf_book->pages)){
					$page = clone $pdf_book->pages[$i];
					$pdf_chunk->pages[]=$page;
				}
			}
			$chunk_name = uniqid().".pdf";
			$pdf_chunk->save(TEMP_PATH.$chunk_name);
			return $chunk_name;
		}
		catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	private function validate_imput($file_name, $page_start, $pages){
		return true;
	}
	// $chunker = new pdf_chunker();
	// echo $chunker->get_chunk("","","");
}

?>