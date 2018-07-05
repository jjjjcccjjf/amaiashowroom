<style media="screen">
  .active_lg {
    font-weight: bold
  }
</style>
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Feedbacks
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <form class="form-inline" role="form" method="get">
              <div class="form-group">
                <label for="">Showroom</label>
                <select class="form-control" name="showroom">
                  <option value="">Choose Showroom</option>
                  <?php foreach ($unique_showrooms as $key => $value): ?>
                    <option <?php echo ($value->showroom == $showroom) ? 'selected="selected"' : '';?>><?php echo $value->showroom ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">From</label>
                <input type="month" class="form-control" name="from_date" value="<?php echo @$from_date ?>">
              </div>
              <div class="form-group">
                <label for="">to</label>
              </div>
              <div class="form-group">
                <input type="month" class="form-control" name="to_date" value="<?php echo @$to_date ?>">
              </div>
              <button type="submit" class="btn btn-success">Filter</button>
            </form>

          </div>
          <div class="panel-body">
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Showroom</th>
                    <th>Submit date/time</th>
                    <th>Synced to server</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $counter--; ?></th>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->showroom ?></td>
                        <td><?php echo $value->timestamp_f ?></td>
                        <td><?php echo $value->created_at_f ?></td>
                        <td>
                          <a href="<?php echo base_url("cms/feedbacks/{$value->id}?from_page={$page}&per_page={$per_page}&showroom={$showroom}&from_date={$from_date}&to_date={$to_date}") ?>">
                            <button type="button" class="btn btn-success btn-xs">View</button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6" style="text-align:center">Empty table data</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <ul class="pagination">
                <ul class='pagination'>
                  <?php
                  for ($i=1; $i <= $total_pages; $i++) { ?>
                    <li><a
                      class="<?php echo ($i == $page) ? 'active_lg' : '' ?>"
                      href="<?php echo base_url("cms/feedbacks?page={$i}&per_page={$per_page}&showroom={$showroom}&from_date={$from_date}&to_date={$to_date}"); ?>">
                      <?php echo $i ?></a></li>
                    <?php } ?>
                  </ul>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
