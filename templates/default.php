<?php
/*

  type: layout

  name: Default

  description: Default

 */
?>
<div class="row">
    <?php if (!empty($rss_data)): ?>
        <?php foreach ($rss_data['records'] as $key => $item): ?>

            <div class="col-12">

                <div class="card flex-md-row mb-4">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary"><?php echo $item['title']; ?></strong>
                        <?php if (isset($item['categories'][0])): ?>
                        <h5 class="mb-0">
                            <a class="text-dark" href="#"><?php echo $item['categories'][0]; ?></a>
                        </h5>
                        <?php endif; ?>
                        <div class="mb-1 text-muted"><?php echo $item['date']; ?></div>

                        <?php if (isset($item['content'])): ?>
                        <p class="card-text mb-auto">
                            <?php echo $item['content']; ?>
                        </p>
                        <?php endif; ?>

                        <a href="<?php echo $item['link']; ?>" target="_blank"><?php _e('Read more');?></a>
                    </div>
                    <?php if (isset($item['image'])): ?>
                    <img class="card-img-right flex-auto d-none d-md-block"
                         alt="<?php echo $item['title']; ?>" style="width: 200px;"
                         src="<?php echo $item['image']; ?>" data-holder-rendered="true">
                    <?php endif; ?>
                </div>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
