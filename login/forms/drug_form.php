<fieldset>
    <div class="form-group">
        <label for="drug_name">Drug Name *</label>
          <input type="text" name="drug_name" value="<?php echo htmlspecialchars($edit ? $drug['drug_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Drug Name" class="form-control" required="required" id = "drug_name">
    </div> 
    <div class="form-group">
        <label for="drug_number">Drug Number *</label>
        <input type="text" name="drug_number" value="<?php echo htmlspecialchars($edit ? $drug['drug_number'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Drug Number" class="form-control" required="required" id="drug_number">
    </div>
   
    <div class="form-group">
        <label for="manufacturer">Manufacturer *</label>
        <input type="text" name="manufacturer" value="<?php echo htmlspecialchars($edit ? $drug['manufacturer'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Manufacturer" class="form-control" required="required" id="manufacturer">
    </div>

    <div class="form-group">
        <label>Date of registration</label>
        <input name="date_of_registration" value="<?php echo htmlspecialchars($edit ? $drug['date_of_registration'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Birth date" class="form-control" type="date">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
