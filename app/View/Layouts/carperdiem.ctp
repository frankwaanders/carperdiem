<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html lang="nl" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>
<html lang="nl" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>
<html lang="nl" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="nl" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="nl" dir="ltr" class="no-js" prefix="og: http://ogp.me/ns# dc: http://purl.org/dc/elements/1.1/#">
<!--<![endif]-->
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('carperdiem.css');
    echo $this->Html->css('bootstrap/css/bootstrap.min.css');
    echo $this->Html->css('font-awesome/css/font-awesome.min.css');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body data-ng-app="carperdiemApp">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if (AuthComponent::user('id')): ?>
                    <li>
                        <a href="#/FishRegistration/add/"><span class="fa fa-pencil"></span> Nieuwe vangstregistratie</a>
                    </li>
                    <li><?php echo $this->Html->link('Vangstregistraties', '#/fishRegistration'); ?></li>
                    <li><?php echo $this->Html->link('Uitzetbeheer', '#/releaseManagement'); ?></li>
                    <li><?php echo $this->Html->link('Administratie', '#/admin'); ?></li>
                    <li><?php echo $this->Html->link('Uitloggen', '/Users/Logout'); ?></li>
                <?php endif; ?>
            </ul>
            <div class="navbar-brand navbar-right" href="#">
                <?php echo $this->Html->image('logo.png', array("width" => '150px ')) ?>
            </div>
        </div>
    </div>
</nav>

<div class="container">

    <?php echo $this->fetch('content'); ?>
    <p><?php echo $this->Session->flash(); ?></p>

    <p class="has-error"><?php echo $this->Session->flash('auth'); ?></p>
</div>

<!--<div id="footer">-->
<!--</div>-->
<?php echo $this->element('sql_dump'); ?>

<?php if (AuthComponent::user('id')) {
    echo $this->Html->script('/scripts/vendors/jquery.min.js');
    echo $this->Html->script('/scripts/vendors/angular.min.js');
    echo $this->Html->script('/scripts/vendors/angular-route.min.js');
    echo $this->Html->script('/scripts/vendors/angular-animate.min.js');
    echo $this->Html->script('/scripts/vendors/ui-bootstrap.min.js');
    echo $this->Html->script('/scripts/vendors/bootstrap.min.js');
    echo $this->Html->script('/scripts/vendors/jquery.ui.widget.js');
    echo $this->Html->script('/scripts/vendors/jquery.fileupload/jquery.fileupload.js');
    echo $this->Html->script('/scripts/vendors/jquery.fileupload/jquery.iframe-transport.js');
    echo $this->Html->script('/scripts/app.js');
    echo $this->Html->script('/scripts/controllers/fish-registration-modal-controller.js');
    echo $this->Html->script('/scripts/controllers/fishregistration-controller.js');
    echo $this->Html->script('/scripts/controllers/create-edit-fishregistration-controller.js');
    echo $this->Html->script('/scripts/services/registration-service.js');
    echo $this->Html->script('/scripts/services/alert-service.js');
    echo $this->Html->script('/scripts/services/fishtype-service.js');
    echo $this->Html->script('/scripts/services/pond-service.js');

}
?>
</body>
</html>
