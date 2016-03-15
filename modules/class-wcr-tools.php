<?php

class WCR_Tools
{
    public static function outputHomepageCallout()
    {
        if (function_exists('get_field') && get_field('cta_text') && get_field('active')) {
            ?>
            <div class="cta-container">
                <div class="homepage-cta">
                    <p><?php the_field('cta_text'); ?></p>
                    <?php if (get_field('link') && get_field('link_button_text')) {
                        $cta_link_url = get_field('external_url');
                        if (!$cta_link_url) {
                            $cta_link_array = get_field('link');
                            $cta_link_obj = $cta_link_array[0];
                            $cta_link_url = get_permalink($cta_link_obj->ID);
                        }
                        ?>
                        <a href="<?php echo $cta_link_url; ?>"
                           class="cta-btn"><?php the_field('link_button_text'); ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php
        }
    }

    /**
     * Gets an array of horses as defined on the horses page via ACF
     *
     * @return bool
     */
    public static function getHorsesArray()
    {
        if (!function_exists('get_field')) {
            return false;
        }

        $horsesArray = get_field('horses', 71); // 71 = horse page

        return $horsesArray;

    }

    public static function outputHorses()
    {
        $horses = self::getHorsesArray();

        if (!$horses) {
            return false;
        }

        foreach ($horses as $horse) {
            $horseName = $horse['name'];
            $horseImageUrl = $horse['image']['sizes']['shareaholic-thumbnail'];
            $horseBreed = $horse['breed'];
            $horseColor = $horse['color'];
            $horseBirthYear = $horse['birth_year'];
            $horseStartedAtWcrYear = $horse['year_started_at_wcr'];
            $horseLocation = $horse['location'];?>

            <div class="staff-member">
                <img class="staff-member-photo" src="<?php echo $horseImageUrl;?>" alt="<?php echo $horseName . " : " . $horseBreed; ?>">
                <div class="staff-member-info-wrap">
                    <h3 class="staff-member-name"><?php echo $horseName;?></h3>
                    <h4 class="staff-member-position"><?php echo $horseBreed; ?></h4>
                    <div class="staff-member-bio">
                        <p><strong>Color:</strong> <?php echo $horseColor;?><br>
                        <strong>Year of Birth:</strong> <?php echo $horseBirthYear; ?><br>
                        <strong>Year Started at WCR:</strong> <?php echo $horseStartedAtWcrYear; ?><br/>
                        <strong>Location:</strong> <?php echo $horseLocation; ?></p>
                        <p><a href="https://www.sagepayments.net/sagenonprofit/shopping_cart/forms/donate.asp?M_id=701617607256">Sponsor <?php echo $horseName; ?></a></p>
                    </div>
                    <a class="staff-member-email" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=" title="Email Bubba" target="_blank"></a>
                </div>
            </div>

        <?php }
    }

    public static function getHorsesList()
    {
        ob_start();
        self::outputHorses();
        $horsesList = ob_get_contents();
        ob_end_clean();
        return $horsesList;
    }

    public static function getEventsArray()
    {
        if (!function_exists('get_field')) {
            return false;
        }

        $eventsArray = get_field('events', 4050); // 4050 = events page

        return $eventsArray;
    }

    public static function outputEvents()
    {
        $events = self::getEventsArray();

        if (!$events) {
            return false;
        }
        $eventCount = count($events);
        $eventCounter = 1;
        ?>
        <div class="eventListing">
            <?php
            foreach ($events as $event) {
                if (!$event['output_event']) {
                    continue;
                }
                ?>
                <h3 <?php if ($event['event_title_color']) { echo 'style="color:' . $event['event_title_color'] . ';"';} ?>>
                    <strong><?php echo $event['event_title'];?></strong>
                </h3>

                <?php
                $eventImage = $event['event_image'];
                if ($eventImage) { ?>
                    <a rel='lightbox' style='float:right;' href='<?php echo $eventImage['url'];?>'>
                        <img src='<?php echo $eventImage['sizes']['medium'];?>'/>
                    </a>
                <?php } ?>

                <?php
                if ($event['is_date_set']) { ?>
                    <strong>When: </strong><?php echo $event['event_date']; ?><br/>
                <?php }
                if ($event['event_location']) { ?>
                    <strong>Where: </strong><?php echo $event['event_location']; ?><br/>
                <?php }

                echo $event['event_description'];

                if ($event['event_links']) { ?>
                    <h4>Links:</h4>
                    <ul>
                    <?php
                    foreach ($event['event_links'] as $link) { ?>
                        <li>
                            <a href="<?php echo $link['link'];?>">
                                <?php echo $link['link_text'];?>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                <?php }

                if ($event['event_downloads']) { ?>
                    <h4>Downloads:</h4>
                    <ul>
                        <?php foreach ($event['event_downloads'] as $download) { ?>
                            <li>
                                <a href="<?php echo $download['download'];?>">
                                    <?php echo $download['download_text'];?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php }

            if ($eventCounter != $eventCount) { ?>
                <hr style="clear:both;"/>
            <?php }
            $eventCounter++;
            } ?>
        </div>
    <?php }

    public static function getEvents()
    {
        ob_start();
        self::outputEvents();
        $events = ob_get_contents();
        ob_end_clean();
        return $events;
    }

}