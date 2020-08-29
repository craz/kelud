<?

/**
 * @var $arResult
 * @var $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>

<div class="content__block content__block_wrapped">
    <?= $arResult["HEADER"] ?>

    <div class="form__wrapper">
        <? foreach ($arResult['QUESTIONS'] as $question): ?>
            <? if ($question['ACTIVE'] = 'Y'): ?>
                <? if ($question['TYPE_F'] !== 'dropdown'): ?>
                    <?
                    // HARD CODE! because field type tel not supported in bitrix forms
                    if ($question['SID'] == 'SIMPLE_QUESTION_745'): ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input class="form__input input"
                                   type="tel"
                                   name="<?= $question['VARNAME'] ?>"
                                   value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                    <? else: ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input class="form__input input"
                                   type="<?= $question['TYPE_F'] ?>"
                                   name="<?= $question['VARNAME'] ?>"
                                   value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                    <? endif; ?>
                <? else: ?>
                    <label class="form__item">
                        <span class="form__label"><?= $question['TITLE'] ?></span>
                        <select class="form__input input" name="<?= $question['VARNAME'] ?>">
                            <? foreach ($question['LIST_VALUES'] as $id => $optionValue): ?>
                                <option value="<?= $id ?>"><?= $optionValue ?></option>
                            <? endforeach; ?>
                        </select>
                    </label>
                <? endif; ?>
            <? endif; ?>
        <? endforeach; ?>

        <button class="form__button button" type="submit"><?= GetMessage('SUBMIT_TITLE'); ?></button>

        <? if (strlen($arParams['CAPTCHA_SITE_KEY']) > 0 && strlen($arParams['CAPTCHA_SECRET_KEY']) > 0): ?>
            <div class="g-recaptcha"
                 data-sitekey="<?= $arParams["CAPTCHA_SITE_KEY"] ?>"
                 data-callback="onSubmit"
                 data-size="invisible">
            </div>
        <? endif; ?>

        <label class="form__item">
            <input type="checkbox" required>
            <div>
                <?= $arParams['POLICY_TEXT'] ?>
                <a href="<?= $arParams['POLICY_LINK'] ?>" class="link">
                    <?= $arParams['POLICY_LINK_TEXT'] ?>
                </a>
            </div>
        </label>
    </div>
    </form>
</div>