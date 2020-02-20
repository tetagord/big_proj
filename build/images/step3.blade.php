<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form>
    <input type="hidden" name="step" value="step-3">
    <div class="flex justify-content-between">
        <h2 class='h2' style='font-weight: 700;'>Шаг 3/3</h2>
        <a class="btn btn-success btn-lg" href="#" id="step-3-submit">Сохранить<i class="fa fa-diamond"></i></a>
    </div>

    <div class='row'>
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="cv--item">
                    <h2 class="h2"><i class="fas fa-user-plus"></i> Должность </h2>
                    <div class="cv-content single">
                        <?php
                        $positions = '';
                        foreach ($model->positions as $pos) {
                            $positions .= $pos->translated()->title . ',';
                        }
                        $positions = rtrim($positions, ',');
                        ?>
                        <input type="text" class="positions" name="positions[]" placeholder="Веб-дизайнер..." value="<?= $positions ?>">
                    </div>
                </div>
                <div class="cv--item m-24">
                    <h2 class="h2"><i class="fas fa-hand-holding-usd"></i> Зарплатные ожидания </h2>
                    <div class="cv-content flex justify-content-between align-items-end salary">
                        <div class="cv-input cv-input--small">
                            <label>От</label>
                            <input type="text" placeholder="100,000" name="salary_from" value="<?= $model->salary_from ?>">
                        </div>
                        <div class="cv-input cv-input--small">
                            <label>До</label>
                            <input type="text" placeholder="110,000..." name="salary_to" value="<?= $model->salary_to ?>">
                        </div>
                        <div class="cv-input cv-input--small">
                            <div class="cv-period flex flex-wrap">
                                <div class="filter-select js-filter select-last">
                                    <select name="salary_period">
                                        <?php foreach (['year', 'month', 'day'] as $period): ?>
                                            <?php $selected = $model->salary_period == $period ? 'selected' : ''; ?>
                                            <option value="<?= $period ?>" <?= $selected ?>><?= __("fields.options.periods.$period") ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='col-md-12'>
                <div class="cv--item prorities">
                    <h2 class="h2"><i class="fas fa-tasks"></i> Приоритеты в типе работы </h2>
                    <div class="cv-content">
                        <div class="row">
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Удаленная работа</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="remote" <?= $model->remote ? 'checked' : '' ?> ><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Сменная работа</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="shift" <?= $model->shift ? 'checked' : '' ?>><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Частичная занятость</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="flexible" <?= $model->flexible ? 'checked' : '' ?>><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Офис</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="office" <?= $model->office ? 'checked' : '' ?>><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Полный рабочий день</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="full_day" <?= $model->full_day ? 'checked' : '' ?>><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Готовность к переезду</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="relocation" <?= $model->relocation ? 'checked' : '' ?>><span class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</form>