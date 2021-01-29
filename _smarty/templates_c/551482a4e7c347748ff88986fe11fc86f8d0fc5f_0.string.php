<?php
/* Smarty version 3.1.33, created on 2020-11-11 21:47:05
  from '551482a4e7c347748ff88986fe11fc86f8d0fc5f' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fac31a9159523_91952149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fac31a9159523_91952149 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- start content_block `fos` --><div id="zakaz_katalog" class="order">
  <form>
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header active">
          <div class="row">
            <div class="col s12">
              <h3>Контактная информация <i class="mdi mdi-chevron-down"></i></h3>
            </div>
          </div>
        </div>
        <div class="collapsible-body">
          <div class="row">
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_name">Имя</label>
                <input name="form_3_name" data-id="form_3_name" placeholder="Имя" data-field="contact">
                <input type="hidden" name="token" data-field="token" value="<?php echo $_smarty_tpl->tpl_vars['controller']->value->mk_csrf('fos');?>
" />
              </div>
            </div>

            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_email">Email</label>
                <input name="form_3_email" data-id="form_3_email" placeholder="Email" data-field="email" >
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="collapsible-header active">
          <div class="row">
            <div class="col s12">
              <h3>Информация о сериале <i class="mdi mdi-chevron-down"></i></h3>
            </div>
          </div>
        </div>
        <div class="collapsible-body">
          <div class="row">
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_or_name">Название (на языке оригинала)</label>
                <input name="form_3_film_or_name" data-id="form_3_film_or_name" placeholder="Название (на языке оригинала)" data-field="common_name">
              </div>
            </div>

            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_name">Название (на английском)</label>
                <input name="form_3_film_name" data-id="form_3_film_name" placeholder="Название (на английском)" data-field="name">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_year">Год выпуска</label>
                <input name="form_3_film_year" data-id="form_3_film_year" placeholder="Год выпуска" data-field="year">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_url">Ссылка на скачивание проекта</label>
                <input name="form_3_film_url" data-id="form_3_film_url" placeholder="mp4, 16:9,  H.264, HD (1920*1080); Аудио: 48 кгц, Stereo" data-field="link">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_count">Количество сезонов и серий</label>
                <input name="form_3_film_count" data-id="form_3_film_count" placeholder="Количество сезонов и серий" data-field="ss_qty">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_chro">Продолжительность серии</label>
                <input name="form_3_film_chro" data-id="form_3_film_chro" placeholder="Продолжительность серии" data-field="series_length">
              </div>
            </div>
            <div class="col s12">
              <div class="one_input_desc">
                <label for="form_3_film_desc">Краткая аннотация</label>
                <textarea name="form_3_film_desc" data-id="form_3_film_desc" placeholder="Краткая аннотация" data-field="annotation"></textarea>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="collapsible-header">
          <div class="row">
            <div class="col s12">
              <h3>Дополнительная информация <i class="mdi mdi-chevron-down"></i></h3>
            </div>
          </div>
        </div>
        <div class="collapsible-body">
          <div class="row">
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_rej">Режиссер</label>
                <input name="form_3_film_rej" data-id="form_3_film_rej" placeholder="Режиссер" data-field="director">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_prod">Продюсер</label>
                <input name="form_3_film_prod" data-id="form_3_film_prod" placeholder="Продюсер" data-field="producer">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_act">Актеры</label>
                <input name="form_3_film_act" data-id="form_3_film_act" placeholder="Актеры" data-field="actor">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <label for="form_3_film_tr">Ссылка на скачивание трейлера</label>
                <input name="form_3_film_tr" data-id="form_3_film_tr" placeholder="Ссылка на скачивание трейлера" data-field="trailer">
              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input">
                <div class="file-field input-field">
                  <div class="btn">
                    <span><i class="mdi mdi-link-variant"></i></span>
                    <input type="file" multiple name="form_3_film_pos" data-id="form_3_film_pos" id="posters">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Постер – 400*520px" name="form_3_film_pos" data-id="form_3_film_pos">
                  </div>

                </div>
              </div>
            </div>

            <div class="col s12 l6">
              <div class="one_input">
                <div class="file-field input-field">

                  <div class="btn">
                    <span><i class="mdi mdi-link-variant"></i></span>
                    <input type="file" multiple name="form_3_film_kad" data-id="form_3_film_kad" id="frames">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Обложки серий – 400*400 и 1280*720px" name="form_3_film_kad" data-id="form_3_film_kad" >
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="collapsible-header">
          <div class="row">
            <div class="col s12">
              <h3>Социальные сети <i class="mdi mdi-chevron-down"></i></h3>
            </div>
          </div>
        </div>
        <div class="collapsible-body">
          <div class="row">

            <div class="col s12 l6">
              <div class="one_input one_input_icon">
                <input name="form_3_film_other_fb" data-id="form_3_film_other_fb" placeholder="https://facebook.com" data-field="facebook">
                <span>
                  <i class="mdi mdi-facebook"></i>
                </span>

              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input one_input_icon">
                <input name="form_3_film_other_vk" data-id="form_3_film_other_vk" placeholder="https://vk.com" data-field="vk">
                <span>
                  <i class="mdi mdi-vk"></i>
                </span>

              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input one_input_icon">
                <input name="form_3_film_other_in" data-id="form_3_film_other_in" placeholder="https://instagram.com" data-field="instagramm">
                <span>
                  <i class="mdi mdi-instagram"></i>
                </span>

              </div>
            </div>
            <div class="col s12 l6">
              <div class="one_input one_input_icon">
                <input name="form_3_film_other_yt" data-id="form_3_film_other_yt" placeholder="https://youtube.com" data-field="youtube">
                <span>
                  <i class="mdi mdi-youtube"></i>
                </span>

              </div>
            </div>
            <div class="col s12">
              <div class="one_input_desc">
                <label for="form_3_film_fest">Информация об участии в фестивалях</label>
                <textarea name="form_3_film_fest" data-id="form_3_film_fest" placeholder="Информация об участии в фестивалях" data-field="festival"></textarea>
              </div>
            </div>

          </div>
        </div>
      </li>
    </ul>
    <div class="row">
      <div class="col s12">
        <div class="one_checkbox">
          <input type="checkbox" id="form_3_checkgvgvgvg" checked="checked" data-filed="commit">
          <label for="form_3_checkgvgvgvg">Я принимаю <a href="/page/usl_raz">условия пользования платформой</a></label>
        </div>
      </div>
      <div class="col s12 l6 offset-l3">
        <div class="one_btn">
          <button class="button_get-catalog" id="hahahahabutton">Отправить</button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
>
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  
  (function () {
    window.Eve = window.Eve || {};
    window.Eve.EFO = window.Eve.EFO || {};
    window.Eve.EFO.Ready = window.Eve.EFO.Ready || [];
    window.Eve.EFO.Ready.push(function () {
      var E = window.Eve, EFO = E.EFO, U = EFO.U, APS = Array.prototype.slice;
      var form = jQuery('#zakaz_katalog form'), button = jQuery('#hahahahabutton');
      form.on('submit', function (e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
      });

      var filters = {
        'contact': ['Strip', 'Trim', 'NEString'],
        'email': ['Strip', 'Trim', 'NEString', 'EmailMatch'],
        'common_name': ['Strip', 'Trim', 'NEString'],
        'name': ['Strip', 'Trim', 'NEString'],
        'year': ['IntMore0'],
        'link': ['Strip', 'Trim', 'NEString'],
        'ss_qty': ['Strip', 'Trim', 'NEString'],
        'series_length': ['Strip', 'Trim', 'NEString'],
        'director': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'producer': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'actor': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'trailer': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'facebook': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'vk': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'instagramm': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'youtube': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'annotation': ['Strip', 'Trim', 'NEString'],
        'festival': ['Strip', 'Trim', 'NEString', 'DefaultEmptyString'],
        'commit': ['Boolean', 'DefaultFalse'],
        'token':['Strip','Trim','NEString','DefaultEmptyString'],
      };
      var error_voc = {
        '.a': '.a',
        "Filter fails on contact: ValueIsInvalid:NEString":"Укажите Ваше имя",
        "Filter fails on email: ValueIsInvalid:NEString": "Укажите Ваш email",
        "Filter fails on email: ValueIsInvalid:InvalidEmail": "Некорректный email",
        "Filter fails on common_name: ValueIsInvalid:NEString": "Укажите наименование произвединия на языке оригинвала",
        "Filter fails on name: ValueIsInvalid:NEString": "Укажите название произведения на английском языке",
        "Filter fails on year: ValueIsInvalid:IntMore0": "Укажите год выхода",
        "Filter fails on link: ValueIsInvalid:NEString": "Укажите ссылку на Ваше произведение",
        "Filter fails on ss_qty: ValueIsInvalid:NEString": "Укажите количество серий и сезонов",
        "Filter fails on series_length: ValueIsInvalid:NEString": "Укажиет продолжительность серии",
        "Filter fails on annotation: ValueIsInvalid:NEString": "Напишите несколько строк о Вашем произведении в поле \"аннотация\"",
        '.dummy': '.dummy'
      };
      function get_data() {
        var d = {};
        form.find('[data-field]').each(function () {
          var t = jQuery(this);
          var N = U.NEString(t.data('field'), null);
          if (N) {
            if (t.is('input[type=checkbox]')) {
              d[N] = t.prop('checked');
            } else if (t.is('input') || t.is('textarea')) {
              d[N] = t.val();
            }
          }
        });
        return d;
      }

      function data_filter() {
        var d = get_data();
        var cd = EFO.Filter.Filter().applyFiltersToHash(d, filters);
        EFO.Filter.Filter().throwValuesErrorFirst(cd, true);
        return cd;
      }

      function show_error(x) {
        alert(U.NEString(error_voc[x], x));
        console.log(x);
      }

      button.on('click', function (e) {
        e.stopPropagation();
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        if (button.hasClass("loading_now")) {
          return;
        }
        try {
          var data = data_filter();
        } catch (e) {
          show_error(e.message);
          return;
        }
        var form_data = new FormData();
        var posters = jQuery('#posters').get(0);
        if (posters.files.length) {
          for (var i = 0; i < posters.files.length; i++) {
            form_data.append('posters[]', posters.files[i]);
          }
        }
        var frames = jQuery('#frames').get(0);
        if (frames.files.length) {
          for (var i = 0; i < frames.files.length; i++) {
            form_data.append('frames[]', frames.files[i]);
          }
        }
        form_data.append('action', 'fos');
        form_data.append('data', JSON.stringify(data));
        button.addClass("loading_now");

        jQuery.ajax({url: "/Info/API", processData: false,
                     contentType: false, data: form_data, dataType: 'json', method: 'POST'})
          .done(function (d) {
          if (d.status === "ok") {
            try{
              window.dataLayer = window.dataLayer||[];
              window.dataLayer.push({event: 'custom_event',event_category: 'for_authors',event_action: 'Success'});
            }catch(e){
            }
            window.Eve.EFO.Alert().set_text("Мы ответим в самое ближайшее время.").set_title("Ваша заявка зарегистрирована.").set_close_btn(true)
              .set_style("green").set_timeout(3000).set_callback(window, function () {
            }).show();
			
            jQuery.post('/Mail.php', {
              to: data.email,
              type_tpl: 'test',
              data: {
                type_mail: 'FOS_LEAD'
              }
            }).done(function () {
              window.location.href = "/";
            });

            return;
          }
          if (d.status === "error") {
            show_error(d.error_info.message);
            return;
          }
          window.Eve.EFO.Alert().set_text("Некорректный отвт сервера").set_title("Ошибка").set_close_btn(true)
            .set_style("red").set_timeout(3000).set_callback(window,function(){
          }).show();
          return;
        })
          .fail(function () {

          window.Eve.EFO.Alert().set_text("Ошибка связи с сервером").set_title("Ошибка").set_close_btn(true)
            .set_style("red").set_timeout(3000).set_callback(window,function(){
          }).show();
          return;
        })
          .always(function () {
          button.removeClass('loading_now');
        });
      });



    });
  })();
  
<?php echo '</script'; ?>
><!-- end of content_block `fos` --><?php }
}
