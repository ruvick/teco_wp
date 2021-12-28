<section id="team" class="team">
    <div class="_container">
        <h2 class="team__title">Наша команда</h2>
        <div class="team__row">
        <? $team = carbon_get_theme_option('complex_team');
            if ($team) {
                $teamIndex = 0;
                foreach ($team as $item) {
                    ?>
                    <div class="team__column">
                        <div class="team__card">
                            <div class="team__card-img">
                                <img src="<?php echo wp_get_attachment_image_src($item['img_team'], 'large')[0]; ?>" alt="">					</div>
                            <div class="team__card-descp">
                                <h4 class="team__card-title"><? echo $item['name_team']; ?></h4>
                                <p class="team__card-position"><? echo $item['special_team']; ?></p>
                            </div>
                            <div class="team__card-nav">
                                <a href="<? echo preg_replace('/[^0-9]/', '', $item['phone_team']); ?>" class="team__card-nav-phone"><? echo $item['phone_team']; ?></a>
                                <a href="mailto:<? echo $item['e-mail_team']; ?>" class="team__card-nav-email"><? echo $item['e-mail_team']; ?></a>
                            </div>
                        </div>
                    </div>
                    <?
                    $teamIndex++; 
                    if ($teamIndex == 4) break;
                }
            }
            ?>
        </div>
    </div>
</section>