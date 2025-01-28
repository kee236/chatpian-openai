<section class="section section_custom">
  <div class="section-header">
    <h1><i class="far fa-credit-card"></i> <?php echo $page_title; ?></h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item">
        <a href="<?php echo base_url('integration'); ?>"><?php echo $this->lang->line("Integration"); ?></a>
      </div>
      <div class="breadcrumb-item"><?php echo $page_title; ?></div>
    </div>
  </div>

  <?php $this->load->view('admin/theme/message'); ?>

  <?php
    // ค่าดั้งเดิมในกรณีไม่มีการตั้งค่า
    if (isset($xvalue['instruction_to_gemini']) && !empty($xvalue['instruction_to_gemini'])) {
        $xvalue['instruction_to_gemini'] = $xvalue['instruction_to_gemini'];
    } else {
        $xvalue['instruction_to_gemini'] = $this->lang->line('This is a configuration page for Gemini API.');
    }
  ?>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <form action="<?php echo base_url("integration/gemini_api_credentials_action"); ?>" method="POST">
          <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $this->session->userdata('csrf_token_session'); ?>">
          <div class="card">
            <div class="card-body">

              <!-- ส่วน API Key -->
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for=""><i class="fas fa-key"></i> <?php echo $this->lang->line("Gemini API Secret Key"); ?></label>
                    <input name="gemini_api_secret_key" value="<?php echo isset($xvalue['gemini_api_secret_key']) ? $xvalue['gemini_api_secret_key'] : ""; ?>" class="form-control" type="text">
                    <span class="red"><?php echo form_error('gemini_api_secret_key'); ?></span>
                  </div>
                </div>
              </div>

              <!-- ส่วน Model -->
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for=""><i class="fas fa-cogs"></i> <?php echo $this->lang->line("Model"); ?></label>
                    <input name="gemini_model" value="<?php echo isset($xvalue['gemini_model']) ? $xvalue['gemini_model'] : "gemini-default"; ?>" class="form-control" type="text">
                    <span class="red"><?php echo form_error('gemini_model'); ?></span>
                  </div>
                </div>
              </div>

              <!-- ส่วน Instruction -->
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for=""><i class="fas fa-quote-right"></i> <?php echo $this->lang->line("Instruction To Gemini"); ?></label>
                    <textarea class="form-control" name="instruction_to_gemini"><?php echo $xvalue['instruction_to_gemini']; ?></textarea>
                    <span class="red"><?php echo form_error('instruction_to_gemini'); ?></span>
                  </div>
                </div>
              </div>

            </div>

            <div class="card-footer bg-whitesmoke">
              <button class="btn btn-primary btn-lg" id="save-btn" type="submit"><i class="fas fa-save"></i> <?php echo $this->lang->line("Save"); ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>