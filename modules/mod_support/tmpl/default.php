
<div class="sp-online">
    <p class="text-p">Hỗ trợ đặt vé trực tuyến</p>
    <span class="hotline">Hotline:</span><i class="phone"><?php echo $list['hotline'];?></i>
    <p class="sp-in">Hỗ trợ đặt vé trong nước</p>
    <ul class="list-spin">
        <?php foreach($list['spin'] as $key => $val):?>
            <li>
                <a href="<?php echo 'ymsgr:sendIM?'.$val.'&m=Xin chào '.$val;?>">
                    <img src="<?php echo 'http://opi.yahoo.com/online?u='.$val.'&amp;m=g&amp;t=1&amp;l=us';?>" border="0" alt="<?php echo $val;?>">
                </a>
            </li>
        <?php endforeach;?>
    </ul>
    <div class="clr"></div>
    <p class="sp-out">Hỗ trợ đặt vé quốc tế</p>
    <ul class="list-spout">
        <?php foreach($list['spout'] as $key => $val):?>
            <li>
                <a href="<?php echo 'ymsgr:sendIM?'.$val.'&m=Xin chào'.$val;?>">
                    <img src="<?php echo 'http://opi.yahoo.com/online?u='.$val.'&amp;m=g&amp;t=1&amp;l=us';?>" border="0" alt="<?php echo $val;?>">
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>