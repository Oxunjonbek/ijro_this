<?php

namespace common\widgets\robust;

use yii\base\InvalidConfigException;
use yii\bootstrap4\Html;
use yii\bootstrap4\Widget;
use yii\helpers\ArrayHelper;

/**
 * MenuContent renders a Modern Admin submenu component.
 *
 * For example,
 *
 * ```php
 * <ul class="menu-content">
 *     <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a>
 *     <?php
 *         echo Dropdown::widget([
 *             'items' => [
 *                 ['label' => 'DropdownA', 'url' => '/'],
 *                 ['label' => 'DropdownB', 'url' => '#'],
 *             ],
 *         ]);
 *     ?>
 * </div>
 * ```
 * @author Muhammad Samadov <sam.muhammadali@gmail.com>
 */
class MenuContent extends Widget
{
    /**
     * @var array list of menu items in the dropdown. Each array element can be either an HTML string,
     * or an array representing a single menu with the following structure:
     *
     * - label: string, required, the label of the item link.
     * - icon: string, optional
     * - encode: bool, optional, whether to HTML-encode item label.
     * - url: string|array, optional, the URL of the item link. This will be processed by [[\yii\helpers\Url::to()]].
     *   If not set, the item will be treated as a menu header when the item has no sub-menu.
     * - visible: bool, optional, whether this menu item is visible. Defaults to true.
     * - disabled: bool, optional, whether this menu item is disabled. Defaults to false.
     * - linkOptions: array, optional, the HTML attributes of the item link.
     * - options: array, optional, the HTML attributes of the item.
     * - items: array, optional, the submenu items. The structure is the same as this property.
     *   Note that Bootstrap doesn't support dropdown submenu. You have to add your own CSS styles to support it.
     * - submenuOptions: array, optional, the HTML attributes for sub-menu container tag. If specified it will be
     *   merged with [[submenuOptions]].
     *
     * To insert divider use `-`.
     */
    public $items = [];
    /**
     * @var bool whether the labels for header items should be HTML-encoded.
     */
    public $encodeLabels = false;
    /**
     * @var array|null the HTML attributes for sub-menu container tags.
     */
    public $submenuOptions = [];


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'menu-content']);
    }

    /**
     * Renders the widget.
     * @throws InvalidConfigException
     */
    public function run()
    {
        /*$this->registerClientEvents();*/
        return $this->renderItems($this->items, $this->options);
    }

    /**
     * Renders menu items.
     * @param array $items the menu items to be rendered
     * @param array $options the container HTML attributes
     * @return string the rendering result.
     * @throws InvalidConfigException if the label option is not specified in one of the items.
     * @throws \Exception
     */
    protected function renderItems($items, $options = [])
    {
        $lines = [];
        foreach ($items as $item) {
            if (is_string($item)) {
                $lines[] = ($item === '-')
                    ? Html::tag('div', '', ['class' => 'dropdown-divider'])
                    : $item;
                continue;
            }
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            if (!array_key_exists('label', $item)) {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $disabled = ArrayHelper::getValue($item, 'disabled', false);

            Html::addCssClass($linkOptions, 'menu-item');
            if ($disabled) {
                ArrayHelper::setValue($linkOptions, 'tabindex', '-1');
                ArrayHelper::setValue($linkOptions, 'aria-disabled', 'true');
                Html::addCssClass($linkOptions, 'disabled');
            }

            $url = array_key_exists('url', $item) ? $item['url'] : null;

            if (empty($item['items'])) {
                if ($url === null) {
                    $content = Html::tag('h6', $label, ['class' => 'dropdown-header']);
                } else {
                    if (isset($item['icon'])) {
                        $icon = "<i class='la la-{$item["icon"]}'></i>";
                    } else {
                        $icon = "<i></i>";
                    }
                    $content = Html::beginTag('li', $itemOptions);
                    $content .= Html::a($icon . '<span data-i18n="nav.dash.nimadir">' . $label . '</span>', $url, $linkOptions);
                    $content .= Html::endTag('li');
                }
                $lines[] = $content;
            } else {
                $submenuOptions = $this->submenuOptions;
                if (isset($item['submenuOptions'])) {
                    $submenuOptions = array_merge($submenuOptions, $item['submenuOptions']);
                }
                Html::addCssClass($linkOptions, ['menu-item']);

                $lines[] = Html::beginTag('li', $itemOptions);
                if (isset($item['icon'])) {
                    $icon = "<i class='la la-{$item["icon"]}'></i>";
                } else {
                    $icon = "<i></i>";
                }
                $lines[] = Html::a($icon . '<span data-i18n="nav.dash.nimadir">' . $label . '</span>', $url, $linkOptions);
                $lines[] = static::widget([
                    'items' => $item['items'],
                    'options' => $submenuOptions,
                    'submenuOptions' => $submenuOptions,
                    'encodeLabels' => $this->encodeLabels
                ]);

                $lines[] = Html::endTag('li');
            }
        }

        return Html::tag('ul', implode("\n", $lines), $options);
    }
}
