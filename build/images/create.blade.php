@extends('layouts.app')

@section('content')


 <form enctype="multipart/form-data" id="header-upload_form" role="form" method="POST" action="">
                    <input type="file" name="header" class="d-none" id="topimage-input">
                    
                    @if (Auth::user()->header)
                        <div class="cv-fon" style="overflow: hidden; background-image: url('{{ Auth::user()->header }}');background-size: cover; background-position: center center; cursor: pointer" onclick="$('#topimage-input').trigger('click');"></div>
                    @else
                        <div class="cv-fon" style="overflow: hidden; background-image: url('/images/cover.svg');background-size: cover; background-position: center center; cursor: pointer" onclick="$('#topimage-input').trigger('click');"></div>
                    @endif
                    
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 cv-left">
                <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="/add-avatar" style='max-width: 300px;'>
                    <input type="file" name="photo" class="d-none" id="avatar-input">
                    @if (Auth::user()->photo)
                        <img class="cv-avatar" src="{{ asset(Auth::user()->photo) }}" alt="" style="background: #fff; cursor: pointer;" onclick="$('#avatar-input').trigger('click');">
                    @else
                        <img class="cv-avatar" src="/images/ava.svg" alt="" style="background: #fff; cursor: pointer;" onclick="$('#avatar-input').trigger('click');">
                    @endif
                    
                    
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </form>
                <div class="cv-exp col-12">
                    <h2 class="h2">Опыт</h2>
                    <div id="experience">
                        <div id="experience-place">
                            <div class="cv-content experience-item">
                                <div class="cv-input">
                                    <label>Место работы №1</label>
                                    <input type="text" class="companies" name="experience[company][]"
                                           placeholder="Google...">
                                </div>
                                <div class="cv-input">
                                    <label>Должность</label>
                                    <input type="text" name="experience[position][]" placeholder="Accountant...">
                                </div>
                                <div class="cv-input">
                                    <label>Краткое описание направлений работы, решений и достижений</label>
                                    <textarea type="text" name="experience[context][]"
                                              placeholder="Design websites and mobile applications…"></textarea>
                                </div>
                                <div class="cv-periods flex flex-wrap">
                                    <div class="cv-period flex flex-wrap">
                                        <p>Период работы. От</p>
                                        <div class="js-filter">
                                            <select name="experience[month_start][]" class="simple-select">
                                                <option value="1">{{ __('web.month.1') }}</option>
                                                <option value="2">{{ __('web.month.2') }}</option>
                                                <option value="3">{{ __('web.month.3') }}</option>
                                                <option value="4">{{ __('web.month.4') }}</option>
                                                <option value="5">{{ __('web.month.5') }}</option>
                                                <option value="6">{{ __('web.month.6') }}</option>
                                                <option value="7">{{ __('web.month.7') }}</option>
                                                <option value="8">{{ __('web.month.8') }}</option>
                                                <option value="9">{{ __('web.month.9') }}</option>
                                                <option value="10">{{ __('web.month.10') }}</option>
                                                <option value="11">{{ __('web.month.11') }}</option>
                                                <option value="12">{{ __('web.month.12') }}</option>
                                            </select>
                                        </div>
                                        <div class="js-filter">
                                            <select name="experience[year_start][]" class="simple-select">
                                                @for($i=2018;$i>=1960;$i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cv-period flex flex-wrap end-date">
                                        <p>Период работы. От</p>
                                        <div class="js-filter">
                                            <select name="experience[month_end][]" class="simple-select">
                                                <option value="1">{{ __('web.month.1') }}</option>
                                                <option value="2">{{ __('web.month.2') }}</option>
                                                <option value="3">{{ __('web.month.3') }}</option>
                                                <option value="4">{{ __('web.month.4') }}</option>
                                                <option value="5">{{ __('web.month.5') }}</option>
                                                <option value="6">{{ __('web.month.6') }}</option>
                                                <option value="7">{{ __('web.month.7') }}</option>
                                                <option value="8">{{ __('web.month.8') }}</option>
                                                <option value="9">{{ __('web.month.9') }}</option>
                                                <option value="10">{{ __('web.month.10') }}</option>
                                                <option value="11">{{ __('web.month.11') }}</option>
                                                <option value="12">{{ __('web.month.12') }}</option>
                                            </select>
                                        </div>
                                        <div class="js-filter">
                                            <select name="experience[year_end][]" class="simple-select">
                                                @for($i=2018;$i>=1960;$i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cv-radio flex flex-column">
                                        <p>Продолжаю работать</p>
                                        <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                            <div class="filter-by--type">
                                                <input class="filter-by--input" type="checkbox"
                                                       name="experience[working]"><span
                                                        class="filter-by--mask"></span>
                                            </div>
                                            <span class="filter-by--title">Да</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cv-content--line">
                            <button class="btn btn--cv add-experience">Добавить место работы</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-xl-6 cv-right">
                <div class="cv--item">
                    <h2 class="h2"><span class="h-title">Гражданство<span class="h-qty"
                                                                          title="some title some title some title"><i
                                        class="fas fa-question-circle"></i></span></span></h2>
                    <div class="cv-content m-24">
                        <p>В Европейских компаниях документы обязательны. Вы сможете работать только удаленно, но тогда
                            вы получаете меньше.</p>
                        <div class="cv-input">
                            <input type="text" class="citizenship" name="citizenship" placeholder="Гражданство...">
                        </div>
                        <div class="cv-radio flex flex-wrap">
                            <p>Есть документы для работы в Евросоюзе</p>
                            <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                <div class="filter-by--type">
                                    <input class="filter-by--input" type="checkbox" name="documents"><span
                                            class="filter-by--mask"></span>
                                </div>
                                <span class="filter-by--title">Да</span>
                            </div>
                            <!-- <button class="btn btn--cv align-self-end">Оформить €123</button> -->
                        </div>
                    </div>
                </div>
                <div class="cv--item d-none">
                    <h2 class="h2"><span class="h-title">Уровень резюме<span class="h-qty"
                                                                             title="some title some title some title"><i
                                        class="fas fa-question-circle"></i></span></span></h2>
                    <div class="cv-content single">
                        <div class="flex justify-content-between align-items-center"><span>Обычное</span>
                            <!-- <button class="btn btn--cv align-self-end">Оформить €123</button> -->
                        </div>
                    </div>
                </div>
                <div class="cv--item">
                    <h2 class="h2">Основные навыки</h2>
                    <div class="cv-content"><span>Экспертные навыки</span>
                        <div class="cv-input">
                            <input type="text" name="fskills[]" placeholder="Введите навыки через запятую...">
                        </div>
                    </div>
                </div>
                <div class="cv--item">
                    <h2 class="h2"> Основные данные</h2>
                    <div class="cv-content">
                        <div class="cv-input">
                            <label>Полное имя</label>
                            <input type="text" name="ru[name]" placeholder="Иван Иванов...">
                        </div>
                        <div class="cv-input">
                            <label>Краткое описание направлений работы, решений и достижений</label>
                            <textarea name="ru[context]" type="text"
                                      placeholder="Consultant UI/UX Architect, Designer who Codes, Product Designer…"></textarea>
                        </div>
                        <div class="cv-input">
                            <p>Месторасположение</p>
                            <div class="flex flex-wrap location">
                                <div class="flex flex-wrap">
                                    <input type="text" class="country" name="country" placeholder="Страна...">
                                </div>
                                <div class="flex flex-wrap">
                                    <input type="text" name="location" placeholder="Город...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cv--item prorities">
                    <h2 class="h2">Приоритеты в типе работы</h2>
                    <div class="cv-content">
                        <div class="row">
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Удаленная работа</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="remote"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Сменная работа</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="shift"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Частичная занятость</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="flexible"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Офис</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="office"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Полный рабочий день</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="full_day"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                            <div class="cv-radio flex col-12 col-sm-6 flex-column">
                                <p>Готовность к переезду</p>
                                <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                    <div class="filter-by--type">
                                        <input class="filter-by--input" type="checkbox" name="relocation"><span
                                                class="filter-by--mask"></span>
                                    </div>
                                    <span class="filter-by--title">Да</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cv--item">
                    <h2 class="h2">Должность</h2>
                    <div class="cv-content single">
                        <input type="text" class="positions" name="positions[]" placeholder="Веб-дизайнер...">
                    </div>
                </div>
                <div class="cv--item m-24">
                    <h2 class="h2">Зарплатные ожидания</h2>
                    <div class="cv-content flex justify-content-between align-items-end salary">
                        <div class="cv-input cv-input--small">
                            <label>От</label>
                            <input type="text" placeholder="100,000" name="salary_from">
                        </div>
                        <div class="cv-input cv-input--small">
                            <label>До</label>
                            <input type="text" placeholder="110,000..." name="salary_to">
                        </div>
                        <div class="cv-input cv-input--small">
                            <div class="cv-period flex flex-wrap">
                                <div class="filter-select js-filter">
                                    <select name="salary_period">
                                        <option value="year" selected>Год</option>
                                        <option value="month">Месяц</option>
                                        <option value="day">День</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cv--item m-24">
                    <h2 class="h2">Навыки</h2>
                    <div class="cv-content">
                        <input type="text" name="skills[]" placeholder="PHP...">
                    </div>
                </div>
                <div class="cv--item m-24">
                    <h2 class="h2"><span class="h-title">Знание языков<span class="h-qty"
                                                                            title="some title some title some title"><i
                                        class="fas fa-question-circle"></i></span></span></h2>
                    <div class="cv-content flex flex-column">
                        <p>В Европе знание языков обязательно. Вы не сможете работать если не знаете язык. Повысьте свой
                            уровень с помощью наших партнеров.</p>
                        <div id="languages" class="cv-content--line">
                            <div class="language flex flex-wrap justify-content-between">
                                <div class="cv-input cv--part left">
                                     <p>Язык</p>
                                    <input type="text" required name="languages[]" placeholder="English...">
                                </div>

                                <div class="cv-input cv--part right">
                                    <p>Уровень</p>
                                    <div class="cv-period">
                                        <div class="js-filter">
                                            <select class="simple-select" name="languagesLevel[]">
                                                <option value="0">Родной</option>
                                                <option value="1">Начальный</option>
                                                <option value="2">Средний</option>
                                                <option value="3">Продвинутый</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="language flex flex-wrap justify-content-between">
                                <div class="cv-input cv--part left">
                                    <input type="text" name="languages[name][]" placeholder="Russian...">
                                    <div class="cv--btn flex"><i class="fas fa-plus"> </i></div>
                                </div>
                                <div class="cv-input cv--part right">
                                    <div class="cv-period">
                                        <div class="js-filter">
                                            <select class="simple-select" name="languages[level][]">
                                                <option value="1">Начальный</option>
                                                <option value="2">Средний</option>
                                                <option value="3">Продвинутый</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="flex bd-line lang-learn flex justify-content-between"><img
                                    src="https://via.placeholder.com/82x32" alt="">
                            <button class="btn btn--cv">Изучать английский</button>
                        </div>
                        <div class="flex bd-line lang-learn flex justify-content-between"><img
                                    src="https://via.placeholder.com/82x32" alt="">
                            <button class="btn btn--cv">Изучать немецкий</button>
                        </div> -->
                    </div>
                </div>
                <div id="educations" class="cv--item">
                    <h2 class="h2"><span class="h-title">Образование<span class="h-qty"
                                                                          title="some title some title some title"><i
                                        class="fas fa-question-circle"></i></span></span></h2>
                    <div class="cv-content flex flex-column">
                        <p>Большинство работодателей требует разрешение на работу в Европе. Его невозможно получить без
                            высшего образования.</p>
                        <div id="education-place">
                            <div class="education-item">
                                <div class="cv-content--line flex justify-content-between align-items-end">
                                    <div class="cv-input cv--part left">
                                        <label>Название вуза</label>
                                        <input type="text" name="education[name][]"
                                               placeholder="Harvard...">
                                        <div class="cv--btn flex"><i class="fas fa-plus"> </i></div>
                                    </div>
                                    <div class="cv-input cv--part right">
                                        <p>Тип</p>
                                        <div class="cv-period">
                                            <div class="js-filter">
                                                <select name="education[type][]" class="simple-select">
                                                    <option value="1">Высшее</option>
                                                    <option value="2">Неполное</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cv-content--line flex justify-content-between align-items-end">
                                    <div class="cv-input cv--part">
                                        <p>Время обучения. От</p>
                                        <div class="cv-period">
                                            <div class="js-filter">
                                                <select name="education[from][]" class="simple-select">
                                                    @for($i=2018;$i>=1960;$i--)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cv-input cv--part end-date">
                                        <p>До</p>
                                        <div class="cv-period">
                                            <div class=" js-filter">
                                                <select name="education[to][]" class="simple-select">
                                                    @for($i=2018;$i>=1960;$i--)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cv-input cv--part">
                                        <div class="file-wrapper">
                                            <input type="file" class="d-none" name="education[file][]"/>
                                            <button class="btn btn--cv" onclick="$(this).closest('.file-wrapper').find('input[type=file]').click();">Загрузить диплом</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cv-radio flex flex-wrap">
                                    <p>Еще учусь</p>
                                    <div class="filter-by flex filter-career"><span class="filter-by--title">Нет</span>
                                        <div class="filter-by--type">
                                            <input class="filter-by--input" type="checkbox"
                                                   name="education[studying][]"><span
                                                    class="filter-by--mask"></span>
                                        </div>
                                        <span class="filter-by--title">Да</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="cv--item" id="certificates">
                    <h2 class="h2"><span class="h-title">Сертификаты<span class="h-qty"
                                                                          title="some title some title some title"><i
                                        class="fas fa-question-circle"></i></span></span></h2>
                    <div class="cv-content">
                        <div id="certificate-place">
                            <div class="certificate-item">
                                <div class="cv-input">
                                    <label>Название</label>
                                    <input type="text" name="certificate[name][]" placeholder="Certified Accountan...">
                                    <div class="cv--btn flex"><i class="fas fa-plus"> </i></div>
                                </div>
                                <div class="flex justify-content-between">
                                    <div class="cv-input cv-input--half">
                                        <label>Кем выдан</label>
                                        <input type="text" name="certificate[organization][]" placeholder="Ciursea...">
                                    </div>
                                    <div class="cv-input cv-input--half">
                                        <label>Тип организации</label>
                                        <select name="certificate[type][]" class="simple-select">
                                            <option value="online">Онлайн</option>
                                            <option value="intramural">Очная</option>
                                            <option value="extramural">Заочная</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="certificate-file-wrapper">
                                    <button class="btn btn--cv btn--cv-right" onclick="$(this).closest('.certificate-file-wrapper').find('input[type=file]').click();">Загрузить сертификат</button>
                                    <input type="file" class="d-none" name="certificate[file][]"/>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="#" id="testpost" class="btn btn--cv">Отправить резюме</a>
    </div>
    <div class="popup-result-request pupup flex flex-column popup-main popup-hide">
        <p class="popup--title">Вход или регистрация</p>
        <div class="popup-content">

        </div>
        <p><a href="#" class="close-popup btn btn--cv">Ok</a></p>
    </div>
@endsection