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
    <div class="checkout-form">
        <?= $arResult["HEADER"] ?>
        <input hidden name="CART" value="Y">
        <? foreach ($arResult['QUESTIONS'] as $question): ?>
            <? if ($question['ACTIVE'] = 'Y'): ?>
                <? if ($question['COMMENTS'] == 'phone'): ?>
                    <label class="form__item">
                        <span class="form__label"><?= $question['TITLE'] ?></span>
                        <input type="tel" class="form__input input"
                               name="<?= $question['VARNAME'] ?>"
                               value=""<? if ($question['REQUIRED'] == 'Y') {
                            echo ' required';
                        } ?>>
                    </label>
                    <?
                    continue;
                endif;
                if ($question["COMMENTS"] == "hidden"):?>
                    <input hidden name="<?= $question['VARNAME'] ?>">

                    <?
                    continue;
                endif;
                switch ($question["TYPE_F"]) {
                    case "text":
                        {
                            ?>
                            <label class="form__item">
                                <span class="form__label"><?= $question['TITLE'] ?></span>
                                <input type="text" class="form__input input" name="<?= $question['VARNAME'] ?>"
                                       value=""<? if ($question['REQUIRED'] == 'Y') {
                                    echo ' required';
                                } ?>>
                            </label>
                            <?
                            break;
                        }
                    case "email":
                        {
                            ?>
                            <label class="form__item">
                                <span class="form__label"><?= $question['TITLE'] ?></span>
                                <input type="email" class="form__input input" name="<?= $question['VARNAME'] ?>"
                                       value=""<? if ($question['REQUIRED'] == 'Y') {
                                    echo ' required';
                                } ?>>
                            </label>
                            <?
                            break;
                        }
                    case "textarea":
                        {

                            if ($question["COMMENTS"] == "comment") {
                                ?>
                                <label class="form__item form__item_textarea">
                                    <span class="form__label"><?= $question['TITLE'] ?></span>
                                    <textarea class="form__input input input_textarea"
                                              placeholder="Тип, цвет, форма, общие пожелания"
                                              name="<?= $question['VARNAME'] ?>"
                                              value=""<? if ($question['REQUIRED'] == 'Y') {
                                        echo ' required';
                                    } ?>></textarea>
                                </label>

                                <?
                            } else {
                                ?>
                                <label class="form__item form__item_textarea">
                                    <span class="form__label"><?= $question['TITLE'] ?></span>
                                    <textarea class="form__input input input_textarea" <?
                                    if ($question['COMMENTS'] != ""){
                                    ?>placeholder="<?= $question['COMMENTS'] ?>"<?
                                    } ?> name="<?= $question['VARNAME'] ?>"
                                              value=""<? if ($question['REQUIRED'] == 'Y') {
                                        echo ' required';
                                    } ?>></textarea>
                                </label>
                                <?
                            }
                            break;
                        }
                }

                ?>

            <? endif; ?>
        <? endforeach; ?>
        <div class="form__item">
            <div class="form__submit">
                <button class="button button_gold">Отправить</button>
                <div class="form__legal">
                    Нажимая кнопку &laquo;Отправить&raquo;, вы&nbsp;соглашаетесь с&nbsp;<a target="_blank"
                                                                                           href="<?= $arParams['POLICY_LINK'] ?>"
                                                                                           class="link">политикой
                        обработки персональных данных</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>