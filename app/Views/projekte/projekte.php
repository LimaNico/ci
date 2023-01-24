<div class="col-10">
    <div class="row w-75">
        <h2>Projekte Auswählen:</h2>
        <?php
        helper('form');
        echo form_open('projekte/ced_Projekte');
        ?>
        <select name="id" id="projekt-select" class="form-select" >
            <?php
            foreach ($projekte as $item){
                echo "<option value='".$item['projektID']."'>".$item['projektName']."</option>";
            }
            ?>
        </select>
        <div class="row mt-4">
            <button type="submit" name="btnselect" class="btn btn-primary col-2 m-1">Auswählen</button>
            <button type="submit" name="btnedit" class="btn btn-primary col-2 m-1">Bearbeiten</button>
            <button type="submit" name="btndelete" class="btn btn-danger col-2 m-1">Löschen</button>
        </div>
        <?php
        echo form_close();
        ?>
        <h2 class="mt-3">Projekte bearbeiten/ erstellen:</h2>
        <div>
            <?php
            echo form_open('projekte/submit_ced',[],['todo' => $todo]);
            if ($todo > 0)
            {
                echo form_hidden('projektID',$selectedProjekt['projektID']);
            }
            if (!isset($selectedProjekt)) {
                $selectedProjekt['projektName'] = '';
                $selectedProjekt['projektBeschreibung'] = '';
                $selectedProjekt['projektID'] = null;
            }
            if ($todo == 2){
                echo form_hidden(['projektName'=>$selectedProjekt['projektName'],'projektBeschreibung'=>$selectedProjekt['projektBeschreibung']]);
            }
            ?>
                <label class="form-label" for="projektname">Projektname:</label>
                <input class="form-control" type="text" name="projektname" id="projektname" placeholder="Projekt" <?php echo "value='".(($todo>0)? $selectedProjekt['projektName'] : '' )."' ";echo ($todo >= 2) ? 'disabled' : ''?>>
                <label class="mt-3" for="projektbeschreibung">Projektbeschreibung:</label>
                <textarea class="form-control" name="projektbeschreibung" placeholder="Projektbeschreibung" id="projektbeschreibung" rows="3" <?php echo ($todo >= 2) ? 'disabled' : '' ?>><?php echo (($todo > 0) ? $selectedProjekt['projektBeschreibung'] : '') ?></textarea>
            <div class="mt-3">
                <button type="submit" name="<?php echo ($todo==2)? 'btndelete' : 'btnsave' ?>" class="btn <?php echo ($todo==2)? 'btn-danger' : 'btn-primary' ; echo ($todo==3)? ' disabled': ''?>"><?php echo ($todo==2)? 'Löschen' : 'Speichern'?></button>
                <button type="submit" name="btnreset" class="btn btn-info">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
