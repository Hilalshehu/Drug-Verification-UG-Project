<?php
class drugs
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'drug_name' => 'Drug Name',
            'drug_number' =>'Drug Number',
            'manufacturer' => 'Manufacturer',
            'status' => 'Status'
          //  'updated_at' => 'Updated at'
        ];

        return $ordering;
    }
}
?>
