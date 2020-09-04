<?
class KCCatalogProduct{
    private $catalogId;
    private $productCount = null;
    private $resProducts = null;
    private $products = null;
    function __construct($catalogId){        
        $this->catalogId = $catalogId;
    }
    function getProductCount(){ 
        if ($this->productCount == null){                
            $this->productCount = $this->getResProducts()->SelectedRowsCount();            
        }
        return $this->productCount;
    }
    function getResProducts(){
        if ($this->resProducts == null) {            
            $arSelect = array("ID","NAME");
            $arFilter = array("IBLOCK_ID"=>$this->catalogId);
            $this->resProducts = CIBlockElement::GetList([],$arFilter,false,[],$arSelect);
        }
        return $this->resProducts;
    }
    function getProducts(){      
        if ($this->products == null) {
            while ($ob = $this->getResProducts()->GetNextElement()) {
                $this->products[] = $ob->GetFields();
            }
        }
        return $this->products;
    }
    function getRandomProduct(){ 
        $randomId = rand( 0, $this->getProductCount());
        echo 'random id: '.$randomId."<br/>";   
        $products = $this->getProducts();
        return $products[$randomId];
    }
}