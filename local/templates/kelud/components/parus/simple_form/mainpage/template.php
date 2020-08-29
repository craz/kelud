<?

/**
 * @var $arResult
 * @var $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>

<div id="custom" class="overlay" hidden>
    <div class="overlay__wrapper">
        <button class="overlay__close">
            <svg>
                <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-close"/>
            </svg>
        </button>
        <div class="overlay__content wrapper">
            <h3 class="overlay__title">Заказать стол</h3>
            <?= $arResult["HEADER"] ?>
            <? foreach ($arResult['QUESTIONS'] as $question): ?>
                <? if ($question['ACTIVE'] = 'Y'): ?>
                    <? if ($question["COMMENTS"] == "hidden-legs"): ?>
                        <input type="hidden" data-type="legs" name="<?= $question['VARNAME'] ?>">
                    <? elseif ($question["COMMENTS"] == "hidden-top"): ?>
                        <input type="hidden" data-type="top" name="<?= $question['VARNAME'] ?>">
                    <? elseif ($question["COMMENTS"] == "tel"): ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input type="tel" class="form__input input"
                                   name="<?= $question['VARNAME'] ?>" <? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                    <? else: ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input type="text" class="form__input input" name="<?= $question['VARNAME'] ?>" <? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                    <? endif; ?>
                <? endif; ?>
            <? endforeach; ?>
            <div class="form__item">
                <div class="form__submit">
                    <button class="button button_gold">Отправить</button>
                    <div class="form__legal">
                        Нажимая кнопку &laquo;Отправить&raquo;, вы&nbsp;соглашаетесь с&nbsp;<a target="_blank" href="<?= $arParams['POLICY_LINK'] ?>" class="link">политикой
                            обработки персональных данных</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
