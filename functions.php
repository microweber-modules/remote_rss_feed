<?php
require_once __DIR__ . '/simplepie-master/autoloader.php';

const DEFAULT_LIMIT = 30;

function get_rss_data ($url, $limit) {
    $data = [];

    $limit = empty($limit) ? DEFAULT_LIMIT : $limit;

    $userfiles_folder = userfiles_path();

    try {
        $feed = new \SimplePie();
        $feed->set_feed_url($url);
        $feed->set_cache_location($userfiles_folder . 'cache');
        //$feed->enable_cache(false);
        $feed->init();
    } catch (\Exception $exception) {
        return [];
    }

    $items = $feed->get_items(0, $limit);

    foreach ($items as $item) {
        $date = $item->get_date();
        $res = strpos($date, ',');
        if (FALSE !== $res) {
            $date = substr($date, 0, $res);
        }

        $enclosure = $item->get_enclosure();
        $content = html_entity_decode($item->get_content());

        $description = html_entity_decode($item->get_content());
        $description = strip_tags($description);
        $description = character_limiter($description,150,'...');

        $categories = [];
        $get_categories = $item->get_categories();
        if (!empty($get_categories)) {
            foreach ($get_categories as $category) {
                $categories[] = $category->get_term();
            }
        }

        $data['records'][] = [
            'title' => html_entity_decode($item->get_title()),
            'link' => $item->get_link(),
            'date' => $date,
            'categories' => $categories,
            'content' => $content,
            'description' => $description,
            'image' => (($enclosure) ? $enclosure->get_link() : null)
        ];
    }

    return $data;
}
