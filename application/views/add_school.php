<div class="col-12 p text-center bg-warning mb-1 text-white rounded"><?php echo $this->session->flashdata('success'); ?></div>

<?php echo validation_errors(); ?>

<?php echo form_open('add_school'); ?>
<div class="row text-center justify-content-center">
    <div class="form-group col-4">
        <label for="nazev">Název školy</label>
        <input class="form-control" class="mb-1" type="text" name="nazev" required />
    </div>
</div>
<div class="form-group row text-center justify-content-center">
    <div class="col-2">
        <label for="got_lat">Zeměpisná šířka</label>
        <input type="number" class="form-control" id="geo_lat" name="geo_lat">
    </div>
    <div class="col-2">
        <label for="got_lat">Zeměpisná délka</label>
        <input type="number" class="form-control" id="geo_long" name="geo_long">
    </div>
</div>
<div class="row text-center justify-content-center">
    <div class="form-group col-4">
        <label for="mesto">Město</label>
        <select id="mesto" name="mesto" class="form-control">
            <?php foreach ($mesta as $mesto) { ?>
                <option value="<?php echo $mesto->id ?>"><?php echo $mesto->nazev ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="row text-center mt-5">
    <input class="col-4 mx-auto btn btn-success" type="submit" name="submit" value="Přidat školu" />
</div>
</form>