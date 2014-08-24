<!-- File: /app/View/Posts/index.ctp -->


<table>
    <tr>
        <th>Id</th>
        <th>Image_Url</th>
        <th>Movie_ID</th>s
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php $this->log($featuredimages, 'debug');?>
    <?php foreach ($featuredimages as $featuredimage): ?>
    <tr>
        <td><?php echo $featuredimage['FeaturedImage']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($featuredimage['FeaturedImage']['img_url'],
array('controller' => 'featuredimages', 'action' => 'view', $featured_image['FeaturedImage']['movie_id'])); ?>
        </td>
        <td><?php echo $featuredimage['FeaturedImage']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($featuredimage); ?>
</table>