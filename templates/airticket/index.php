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
        <div class="clr"></div>
        <div class="main-content">
            <div class="box-left">
                <div class="support-online same">
                    <jdoc:include type="modules" name="vmb-support-online" style="none" />
                </div>
                <div class="clr"></div>
                <div class="dailyve samme">
                    <jdoc:include type="modules" name="dailyve" style="none" />
                </div>
                <div class="thongtindatve same">
                    <p class="title">Thông tin đặt vé</p>
                    <jdoc:include type="modules" name="thongtindatve" style="none" />
                </div>
                <div class="lienketnoibat same">
                    <p class="title">Liên Kết Nổi Bật</p>
                    <jdoc:include type="modules" name="lienketnoibat" style="none" />
                </div>
                <div class="tinnoibat same">
                    <p class="title">Tin Nổi Bật</p>
                    <jdoc:include type="modules" name="tinnoibat" style="none" />
                </div>
                <div class="lienkethuuich same">
                    <p class="title">Liên Kết Hữu Ích</p>
                    <jdoc:include type="modules" name="lienkethuuich" style="none" />
                </div>
            </div>
            <div class="box-right">
                <jdoc:include type="component" />
            </div>

        </div>
        <div class="clr"></div>
        <div class="footer">
            <jdoc:include type="modules" name="vmb-footer" style="none" />
        </div>
    </div>
</body>
</html>
