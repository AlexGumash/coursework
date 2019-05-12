<div class="fetched_item">
  <?php
    foreach ($fetched_item as $field_name => $value) {
  ?>
    <div class="fetched_item_item">
      <span style="width: 50%; font-weight: bold"><?php echo $field_name ?></span>
      <span style="width: 50%"><?php echo $value?></span>
    </div>
  <?php
    }
  ?>
</div>
