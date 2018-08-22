<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <header class="panel-heading">
            Thank you page
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
    </header>

    <div class="col-md-10">
    <div class="form-group">
        <form action="<?=base_url('cms/thankyou/save')?>" method="POST">
        <label for="heading">Heading</label>
        <input name="ty_heading" id="heading" class="form-control input-lg m-bot15" type="text" placeholder="" value="<?=$heading?>">
        <label for="ty_content">Body</label>
        <textarea id="ty_content" class="form-control" name="ty_content" id="ty_content" cols="30" rows="10"><?=$body?></textarea>
    </div>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    </form>
    <!-- page end-->
  </section>
</section>
<!--main content end-->
