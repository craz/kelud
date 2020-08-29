<?

/**
 * @var $arResult
 * @var $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>
<div class="content__block wrapper wrapper_small">
    <header class="c-header">
        <h2 class="c-header__title">Быстрая заявка</h2>
    </header>
    <?= $arResult["HEADER"] ?>
    <label class="form__item">
        <? foreach ($arResult['QUESTIONS'] as $question): ?>
            <? if ($question['ACTIVE'] = 'Y'): ?>
                <? if ($question['COMMENTS'] == 'phone'): ?>
                    <span class="form__label"><?= $question['TITLE'] ?></span>
                    <input type="text" class="form__input input" name="<?= $question['VARNAME'] ?>"
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