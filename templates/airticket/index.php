<?php
defined('_JEXEC') or die;

$doc             = JFactory::getDocument();


// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/style.css');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <jdoc:include type="head" />
</head>
<body class="site">
    <div class="banner">
        <jdoc:include type="modules" name="vmb-banner1" style="none" />
    </div>
    <div class="clr"></div>
    <div class="bounder">
        <div class="main-menu">
            <jdoc:include type="modules" name="vmb-main-menu" style="none" />
        </div>
        <div class="main-content">

        </div>
        <div class="clr"></div>
        <div class="footer">
            <jdoc:include type="modules" name="vmb-footer" style="none" />
        </div>
    </div>
</body>
</html>
