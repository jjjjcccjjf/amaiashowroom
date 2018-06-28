<style>
.meta-info span {
  font-weight: bold;
}
</style>
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Feedbacks <br>
            <p>
              <a href="<?php echo base_url('cms/feedbacks?from_page=') . $this->input->get('from_page') ?>">
                &laquo; Back to list of feedbacks
              </a>
            </p>
            <hr>
            <h4>
              Meta Information
            </h4>
            <p class='meta-info'>
              <span>Showroom</span>: <?php echo $res->meta->showroom ?> <br>
              <span>Date submitted</span>: <?php echo $res->meta->timestamp_f ?> <br>
              <!-- <span>Date synced</span>: <?php echo $res->meta->created_at_f ?> -->
            </p>
          </header>
          <div class="panel-body">
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">

              <div class="col-lg-12">
                <!--widget start-->
                <section class="panel">
                  <header class="panel-heading tab-bg-dark-navy-blue">
                    <ul class="nav nav-tabs nav-justified ">
                      <li class="active">
                        <a href="#personal_information" data-toggle="tab">
                          Personal information
                        </a>
                      </li>
                      <li>
                        <a href="#other_information" data-toggle="tab">
                          Other information
                        </a>
                      </li>
                      <?php if (@$res->survey): ?>
                        <li class="">
                          <a href="#survey" data-toggle="tab">
                            Survey
                          </a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content tasi-tab">
                      <div class="tab-pane active" id="personal_information">

                        <?php foreach ($res->personal_information as $key => $value): ?>
                          <article class="media">
                            <div class="media-body">
                              <a class=" p-head" href="#"><?php echo $questions[$key] ?></a>
                              <p><?php echo $value ?></p>
                            </div>
                          </article>
                        <?php endforeach; ?>


                      </div>
                      <div class="tab-pane" id="other_information">

                        <?php foreach ($res->other_information as $key => $value): ?>
                          <article class="media">
                            <div class="media-body">
                              <a class=" p-head" href="#"><?php echo $questions[$key] ?></a>
                              <p>
                                <?php if (is_array($value)){
                                  echo implode(', ', $value);
                                } else {
                                  echo $value;
                                } ?>
                              </p>
                            </div>
                          </article>
                        <?php endforeach; ?>


                      </div>
                      <?php if (@$res->survey): ?>

                        <div class="tab-pane " id="survey">
                          <?php foreach ($res->survey as $skey => $svalue): ?>
                            <h4>
                              <?php echo $questions[$skey] ?>
                            </h4>

                            <article class="media">
                              <div class="media-body">
                                <?php foreach ($svalue as $key => $value): ?>
                                  <a class=" p-head" href="#"><?php echo $questions[$key] ?></a>
                                  <p>
                                    <?php if (is_array($value)){
                                      echo implode(', ', $value);
                                    } else {
                                      echo $value;
                                    } ?>
                                  </p>
                                <?php endforeach; ?>
                              </div>
                            </article>
                          <?php endforeach; ?>

                        </div>
                      <?php endif; ?>

                    </div>
                  </div>
                </section>
                <!--widget end-->

              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
