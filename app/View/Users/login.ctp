<div class="row form-horizontal">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>Geef a.u.b. uw gebruikersnaam en wachtwoord op.</legend>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="username">Gebruikersnaam</label>
            </div>
            <div class="col-sm-3">
                <?php echo $this->Form->input('username', array(
                        'class' => 'form-control',
                        'label' => false,
                        'div' => false)
                ); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <label for="password">Wachtwoord</label>
            </div>
            <div class="col-sm-3">
                <?php echo $this->Form->input('password', array(
                        'class' => 'form-control',
                        'label' => false,
                        'div' => false)
                ); ?>
            </div>
        </div>
    </fieldset>
    <?php echo $this->Form->submit('Inloggen', array('class' => 'btn btn-default', 'title' => 'Inloggen')); ?>
    <?php echo $this->Form->end(); ?>
</div>
