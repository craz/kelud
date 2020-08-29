<?

/**
 * @var $arResult
 * @var $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>

<div id="callback" class="overlay" hidden>
    <div class="overlay__wrapper">
        <button class="overlay__close">
            <svg>
                <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-close"/>
            </svg>
        </button>
        <div class="overlay__content wrapper">

            <h3 class="overlay__title">Мы вам перезвоним!</h3>
            <?= $arResult["HEADER"] ?>
            <label class="form__item">
                <? foreach ($arResult['QUESTIONS'] as $question): ?>
                    <? if ($question['ACTIVE'] = 'Y'): ?>
                        <? if ($question['COMMENTS'] == 'phone'): ?>
                            <span class="form__label"><?= $question['TITLE'] ?></span>
								<input type="text" class="form__input input" placeholder="+79991112233" name="<?= $question['VARNAME'] ?>"
                                   value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        <? endif; ?>
                    <? endif; ?>
                <? endforeach; ?>
            </label>
            <div class="form__item">
                <div class="form__submit">
                    <button class="button button_gold">Отправить</button>
                    <div class="form__legal">
                        Нажимая кнопку &laquo;Отправить&raquo;, вы соглашаетесь с <a target="_blank"
                                href="<?= $arParams['POLICY_LINK'] ?>" class="link">политикой
                            обработки персональных данных</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>