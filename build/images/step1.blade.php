<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form>
    <div class="flex justify-content-between">
        <h2 class='h2' style='font-weight: 700'><?= __('fields.labels.step') ?> 1/3</h2>
        <a class="btn btn-success btn-lg" href="#" data-nextstep="step-2" id="step-1-submit"><?= __('fields.labels.save_go_next') ?> <i class="fa fa-angle-double-right"></i></a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="cv--item">
                    <h2 class="h2"><i class="far fa-address-card"></i> <?= __('fields.titles.General_options') ?></h2>
                    <div class="cv-content"> 
                        <div class="cv-input">
                            <label><?= __('fields.labels.fullname') ?></label>
                            <input type="text" name="name" placeholder="Иван Иванов..." value="<?= $user->name ?>">
                        </div> 
                        <div class="flex mob-column"> 
                            <div class="cv-periods" style="">
                                <span><?= __('fields.labels.birth_date') ?></span>
                                <input type="hidden" name="step" value="step-1">
                                <div class="cv-input">
                                    <input type="date" name="birth_date" placeholder=""  value="<?= $user->birth_date ?>">
                                </div>
                            </div>
                            <div class="cv-input col-lg-4">
                                <span>Пол</span>
                                <select name="gender" class="simple-select">
                                    <option value="1" <?= $user->gender ? 'selected' : '' ?>><?= __('fields.options.gender.mr') ?></option>
                                    <option value="0" <?= $user->gender === 0 ? 'selected' : '' ?>><?= __('fields.options.gender.ms') ?></option>
                                </select>

                            </div>
                        </div>
                        <span><?= __('fields.labels.birth_place') ?></span>
                        <div class="cv-input">
                            <input type="text" name="burn_address" placeholder="<?= __('fields.placeholders.birth_place') ?>" value="<?= $user->burn_address ?>">
                        </div>
                        
                        <span><?= __('fields.labels.citizenship') ?> </span>
                        <div class="cv-input select-last ">
                            <input type="text" name="citizenship" placeholder="<?= __('fields.labels.citizenship') ?>..." value="<?= $model->citizenship ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="cv--item m-24">
                    <h2 class="h2"><i class="fas fa-mail-bulk"></i> <?= __('fields.labels.contacts') ?></h2>
                    <div class="cv-content ">
                        <div class="flex mob-column ">
                            <div class="cv-input--half">
                                <span>Email</span>
                                <div class="cv-input">
                                    <input type="text" name="email" placeholder="Email" value="<?= $user->email ?>" disabled>
                                </div>
                            </div>
                            <div class="cv-input--half">
                                <span><?= __('fields.labels.phone') ?></span>
                                <div class="cv-input">
                                    <input type="text" name="phone" placeholder="<?= __('fields.labels.phone') ?>..." value="<?= $model->phone ?>">
                                </div>
                            </div>
                            </div>
                    
                    <span><?= __('fields.labels.register_place') ?></span>
                        <div class="cv-input">
                            <input type="text" name="register_address" placeholder="<?= __('fields.placeholders.register_place') ?>" value="<?= $user->register_address ?>">
                        </div>
                        <span><?= __('fields.labels.real_place') ?> </span>
                        <div class="cv-input">
                            <input type="text" name="real_address" placeholder="<?= __('fields.placeholders.real_place') ?>" value="<?= $user->real_address ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>