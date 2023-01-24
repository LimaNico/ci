<div class="col ">

    <div class="container-fluid w-50">
        <?php
        helper('form');
        echo form_open('login/index', array('role'=>'form')) ?>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email-Adresse:</label>
                <input type="email" name="email" id="email" class="form-control <?php echo (isset($error['agb'])) ? 'is-invalid' : ''?>" placeholder="Email-Adresse eingeben">
                <div class="invalid-feedback">
                    <?php echo (isset($error['email'])) ? $error['email'] : ''?>
                </div>
            </div>

            <div class="form-outline mb-4">
                <label for="password" class="form-label">Passwort:</label>
                <input type="password" name="password" id="password" class="form-control <?php echo (isset($error['agb'])) ? 'is-invalid' : ''?>" placeholder="Passwort">
                <div class="invalid-feedback">
                    <?php echo (isset($error['password'])) ? $error['password'] : ''?>
                </div>
            </div>

            <div class="form-outline mb-4">
                <input type="checkbox" class="form-check-input <?php echo (isset($error['agb'])) ? 'is-invalid' : ''?>" value="1" id="agb" name="agb">
                <label for="agb" class="form-check-label">AGBs und Datenschutzerklärung akzeptieren</label>
                <div class="invalid-feedback">
                    <?php echo (isset($error['agb'])) ? $error['agb'] : ''?>
                </div>
            </div>
            <button name="btnsubmit" id="btnsubmit" type="submit" class="btn btn-primary">Einloggen</button>
        <?php echo (isset($wrongLogin) ? "<p class='text-danger'>".$wrongLogin."</p>" : '') ?>
        </form>
        <p>Noch nicht registriert? <a href="registrierung.html" class="link-primary text-decoration-none">Registrierung</a></p>
        <p>Da der Login Vorgang technisch noch nicht realisiert wurde: <a href= <?php echo site_url('/aktuellesProjekt') ?> class="link-primary text-decoration-none">Überspringen</a></p>
    </div>
</div>
