
<!DOCTYPE html>
<html lang="en">

<head>

<?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    start session and include form class
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

/* =============================================
    validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('fg-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('fg-form');

    // additional validation
    $validator->email()->validate('Emel');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['fg-form'] = $validator->getAllErrors();
    } else {
        // clear the form
        Form::clear('fg-form');
    }
}

/* ==================================================
    The Form
 ================================================== */

$form = new Form('fg-form', 'horizontal', 'novalidate, data-fv-no-icon=true', 'bs4');
// $form->setMode('development');
$form->addHtml('<h2>Pertanyaan Lanjut</h2>');
$form->addInput('text', 'Nama Penuh', '', 'Nama', '');
$form->addInput('tel', 'No. Telefon', '', 'No. Telefon', 'data-intphone=true,data-allow-dropdown=false,data-initial-country=auto');
$form->addPlugin('intl-tel-input', '#No. Telefon', 'default');
$form->addInput('email', 'Emel', '', 'Emel', '');
$form->addInput('text', 'Pertanyaan', '', 'Pertanyaan', '');
$form->setCols(0, 12);
$form->centerButtons(true);
$form->addBtn('submit', 'Submit', '', 'Submit', 'class=btn btn-success');
$form->addPlugin('formvalidation', '#fg-form');
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Php Form Builder - Bootstrap 4 form</title>
    <meta name="description" content="">

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Font awesome icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- fontawesome5 -->
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css">
    
    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Bootstrap 4 form</h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <?php
                $form->render();
                ?>

            </div>
        </div>
    </div>

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>

</body>

</html>